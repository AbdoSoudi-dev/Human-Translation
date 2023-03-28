@extends("layouts.layout")
@section("title","Payments")

@section("content")
    <div class="container-fluid">

        <h4 class="text-blue-dark mb-3">
            Your payments
        </h4>

        @if(session()->has("message"))
            <div class="text-center mt-2 alert-success p-2">
                {{ session()->get("message") }}
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr class="text-center">
                    <th >No.</th>
                    <th>Project name</th>
                    <th>Language</th>
                    <th>Amount</th>
                    <th>Status</th>
                    @if($ifPayment)
                        <td>Method</td>
                        <td>email</td>
                        <td>Details</td>
                        <td>Invoice No.</td>
                        <td>Invoice</td>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $key => $order)
                    <tr>
                        <td >{{ $key+1 }}</td>
                        <td>{{ $order->project_name }}</td>
                        <td>
                            From :{{ $order->trans_from }} <br>
                            To :{{ $order->trans_to }}
                        </td>
                        <td>{{ $order->payment->amount ?? $order->amount}}</td>

                        <td colspan="{{ $ifPayment && !$order->payment ? "7" : "" }}">
                            @if($order->status == "unpaid")
                                <a class="btn btn-danger" href="{{ url("/checkout/$order->id") }}">
                                    Pay now
                                </a>
                            @else
                                <span class="text-capitalize">{{ $order->payment->status ?? $order->status }}</span>
                            @endif
                        </td>

                        @if($order->payment)
                            <td> {{ $order->payment->method }} </td>
                            <td> {{ $order->payment->email }} </td>
                            <td class="text-center">
                                @if($order->payment->method == "paypal")
                                    Payment ID :{{ $order->payment->payment_id }} <br>
                                    Payer ID :{{ $order->payment->payer_id }}
                                @else
                                    <button type="button" class="btn btn-primary"
                                            onclick="viewImage('{{ $order->payment->image }}')"
                                            data-bs-toggle="modal" data-bs-target="#imageDetails">
                                        View
                                    </button>
                                    @if($order->payment->status !== "done")
                                        <br>
                                        <form id="delete_order" class="mt-2" action="{{ route("deletePayment",$order->payment->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <a class="btn-sm btn-danger text-decoration-none p-1 cursor-pointer" href="#"
                                               onclick="submitForm()">Delete payment</a>
                                        </form>
                                    @endif
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
                        @endif

                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-bold">
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
        function submitForm() {
            if(confirm('Are you sure, you will delete payment data?')){
                document.getElementById("delete_order").submit();
            }
        }
    </script>
@endsection
