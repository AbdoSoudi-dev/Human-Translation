@extends("layouts.layout")
@section("title","Orders")

@section("content")
    <div class="container-fluid">

        <h4 class="text-blue-dark mb-3">
            Completed Orders
        </h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <h3>Error Occurred!</h3>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session()->has("message"))
            <div class="text-center alert-success p-2">
                {{ session()->get("message") }}
            </div>
        @endif
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th >No.</th>
                    <th>Project name</th>
                    <th>Email</th>
                    <th>Language</th>
                    <th>Field</th>
                    <th>File</th>
                    <th>Words</th>
                    <th>Amount</th>
                    @if($orderDeliverAt)
                        <th>Deliver at</th>
                    @endif
                    <th>Status</th>
                    @if($isTranslatedFiles)
                        <th>Translated File</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $key => $order)


                    <tr class="text-center">
                        <td rowspan="2" vertical="">{{ $key+1 }}</td>
                        <td>{{ $order->project_name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>
                            From :{{ $order->trans_from }} <br>
                            To :{{ $order->trans_to }}
                        </td>
                        <td>
                            Field :{{ $order->field }} <br>
                            Specialty :{{ $order->specialist }}
                            @if($order->field_type)
                                <br>
                                Discipline  :{{ $order->field_type }}
                            @endif
                        </td>
                        <td>
                            <a href="{{ url("/files orders/$order->file") }}"> {{ $order->file_name }}</a>
                        </td>
                        <td>{{ $order->words }}</td>
                        <td>{{ $order->amount }}</td>

                        @if($orderDeliverAt)
                            <td>
                                @if($order->deliver_at)
                                    {{ $order->deliver_at }}
                                @endif
                            </td>
                        @endif

                        <td>
                            @if($order->status == "unpaid" && $order->user_id == auth()->id())
                                <a class="btn btn-danger" href="{{ url("/checkout/$order->id") }}">Pay now </a>
                            @else
                                <span class="text-capitalize">{{ $order->status }}</span>
                            @endif
                        </td>
                        @if($isTranslatedFiles)
                            <td>
                                @if($order->translated_file)
                                    <a class="text-decoration-none" href="{{ url("/translated files/$order->translated_file") }}">
                                        {{ $order->translated_file_name }}
                                    </a>
                                @endif
                            </td>
                        @endif
                    </tr>
                    <tr  class="text-center">
                        <td colspan="{{ $isTranslatedFiles && $orderDeliverAt ? "10"
                                    : ($isTranslatedFiles || $orderDeliverAt ?"9" : "8") }}"
                            class="text-center text-bold">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: {{ $order->percent }}%;"
                                     aria-valuenow="{{ $order->percent }}" aria-valuemin="0" aria-valuemax="100">{{ $order->percent }}%</div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td
                            colspan="{{ $isTranslatedFiles && $orderDeliverAt ? "10"
                                    : ($isTranslatedFiles || $orderDeliverAt ? "8" : "7") }}"
                            class="text-center text-bold"> No orders for.
                            <a href="{{ route("translate") }}">
                                START NOW
                            </a>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $orders->links() }}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="processOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-capitalize" id="imageTitle">Edit client's order process </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form id="edit_process_form" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row text-center">

                            <div class="form-group mt-2">
                                <label for="percent">Edit percent</label>
                                <input type="number" max="100" name="percent" id="percent"
                                       class="form-control col-md-6 col-12 text-center m-auto" required>
                            </div>

                            <div class="form-group mt-2">
                                <label for="translated_file">Upload translated file</label>
                                <input type="file"  name="translated_file" id="translated_file"
                                       class="form-control col-md-6 col-12 m-auto">

                                <small>Note* If you upload file. order process bar will be automatically 100%</small>
                            </div>

                            <div class="form-group mt-4">
                                <button class="btn btn-primary col-md-3 col-6">Save</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function processOrder(percent, orderId) {
            document.getElementById("percent").value = percent;
            document.getElementById("edit_process_form").action = `orders/${orderId}`;
        }
    </script>
@endsection

