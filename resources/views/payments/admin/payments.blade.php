@extends("layouts.layout")
@section("title","Payments Review")

@section("content")
    <div class="container-fluid mt-3">

        <h4 class="text-blue-dark mb-3">
            Payments Review
        </h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th >No.</th>
                    <th>Project name</th>
                    <th>Language</th>
                    <th>Amount</th>
                    <th>User</th>
                    <th>Status</th>

                    @if($ifPayment)
                        <td>Method</td>
                        <td>email</td>
                        <td>Details</td>
                        <td>Invoice No.</td>
                        <td>Invoice</td>
                        <td>Actions</td>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $key => $order)
                    <tr class="vertical-center">
                        <td>{{ $key+1 }}</td>
                        <td>{{ $order->project_name }}</td>
                        <td>
                            From :{{ $order->trans_from }} <br>
                            To :{{ $order->trans_to }}
                        </td>
                        <td>{{ $order->payment->amount ?? $order->amount }}</td>

                        <td> {{ $order->user->name }} </td>

                        <td colspan="{{ !$order->payment && $ifPayment ? "7" : "" }}">
                            @if($order->status == "unpaid" && $order->user_id == auth()->id())
                                <a class="btn btn-danger" href="{{ url("/checkout/$order->id") }}">
                                    Pay Now
                                </a>
                            @else
                                <span class="text-capitalize">{{ $order->payment->status ?? $order->status }}</span>
                            @endif
                        </td>

                        @if($order->payment)
                            <td> {{ $order->payment->method }} </td>
                            <td> {{ $order->payment->email }} </td>
                            <td>
                                @if($order->payment->method == "paypal")
                                    Payment ID :{{ $order->payment->payment_id }} <br>
                                    Payer ID :{{ $order->payment->payer_id }}
                                @else
                                    <button type="button" class="btn-sm btn-primary"
                                            onclick="viewImage('{{ $order->payment->image }}')"
                                            data-bs-toggle="modal" data-bs-target="#imageDetails">
                                        View
                                    </button>
                                    <a class="btn-sm btn-outline-primary text-decoration-none"
                                        onclick="removeDisable()" href="{{ "/download/".$order->payment->image }}">
                                        Download
                                    </a>
                                @endif
                            </td>
                            <td> {{ $order->payment->invoice_id }} </td>
                            <td>
                                @if($order->payment->status === "done")
                                    <a class="text-decoration-none btn btn-primary" onclick="removeDisable()" href="{{ route("paymentPdf",$order->payment->id) }}">
                                        Download
                                    </a>
                                @endif
                            </td>
                            <td class="text-center">
                                @if($order->payment->method != "paypal"
                                        && $order->payment->status != "done")
                                    <form action="{{ route("admin.payment.destroy",$order->payment->id) }}" method="post">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                <br>
                                    <form action="{{ route("admin.payment") }}" method="post">
                                        @csrf
                                        <input type="hidden" name="payment_id" value="{{ $order->payment->id }}">
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <button type="submit" class="btn btn-success">Approve</button>
                                    </form>
                                @endif
                            </td>
                        @endif

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-bold">
                            No payments
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="imageDetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="imageTitle"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-auto">
                    <img src=""
                         class="img-fluid img_details" width="600">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function viewImage(src) {
            document.querySelector(".img_details").src = `/transaction images/${src}`;
        }
        function removeDisable() {
            setTimeout(function () {
                document.getElementById("loading").classList.add("d-none");
                document.querySelector('body').removeAttribute('disabled');
            },1000)
        }
    </script>

@endsection
