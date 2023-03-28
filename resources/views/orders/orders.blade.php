@extends("layouts.layout")
@section("title","Orders")

@section("content")
    <div class="container-fluid">

        <h4 class="text-blue-dark mb-3">
            Processing your Orders stages
        </h4>

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
                    <th>Language</th>
                    <th>Field</th>
                    <th>File</th>
                    <th>Words</th>
                    <th>Amount</th>
                    @if(!$orderDeliverAt->isEmpty())
                    <th>Deliver at</th>
                    @endif
                    <th>Status</th>
                    <th>Tracking</th>
                    @if(!$isTranslatedFiles->isEmpty())
                    <th>Translated File</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @forelse($orders as $key => $order)
                <tr class="text-center">
                    <td rowspan="2" vertical="">{{ $key+1 }}</td>
                    <td>{{ $order->project_name }}</td>
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

                    @if(!$orderDeliverAt->isEmpty())
                        <td>
                            @if($order->deliver_at)
                                {{ $order->deliver_at }}
                            @endif
                        </td>
                    @endif

                    <td>
                        @if($order->status == "unpaid")
                            <a class="btn btn-danger" href="{{ url("/checkout/$order->id") }}">Pay now </a>
                            <br>
                            <form id="delete_order" class="mt-2" action="{{ route("deleteOrder",$order->id) }}" method="post">
                                @csrf
                                @method("DELETE")
                                <a class="btn-sm btn-danger text-decoration-none p-1 cursor-pointer" href="#"
                                   onclick="submitForm()">Delete order</a>
                            </form>
                        @else
                            <span class="text-capitalize">{{ $order->status }}</span>
                        @endif
                    </td>
                    <td>
                        @if($order->payment && $order->payment->status == "done" && !$order->translated_file)
                            <a class="btn btn-primary" href="{{ route("trackingOrderStages",$order->id) }}">Tracking order</a>
                        @endif
                    </td>
                    @if(!$isTranslatedFiles->isEmpty())
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
                    <td colspan="{{ !$isTranslatedFiles->isEmpty() && !$orderDeliverAt->isEmpty() ? "12"
                                    : (!$isTranslatedFiles->isEmpty() || !$orderDeliverAt->isEmpty() ?"10" : "9") }}"
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
                        colspan="{{ !$isTranslatedFiles->isEmpty() && !$orderDeliverAt->isEmpty() ? "12"
                                    : (!$isTranslatedFiles->isEmpty() || !$orderDeliverAt->isEmpty() ?"10" : "9") }}"
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

    <script>
        function submitForm() {
            if(confirm('Are you sure, you will delete your order data?')){
                document.getElementById("delete_order").submit();
            }
        }
    </script>
@endsection
