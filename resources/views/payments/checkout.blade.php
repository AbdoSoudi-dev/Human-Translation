@extends("layouts.layout")
@section("title","Checkout")

@section("content")
    <div class="container-fluid">

        <div class="row d-flex justify-content-between">
            <div class="col-md-8 col-12 mt-3">
                <div class="card">
                    <h5 class="card-title text-center text-capitalize text-bold mt-3">
                        Payment Information
                    </h5>
                    <hr>
                    <div class="card-body">
                        <h5 class="text-bold text-capitalize"> Payment method </h5>
                        <ul class="nav nav-tabs d-none d-lg-flex" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                    <img src="{{ asset("/images/paypal-visa.png") }}" class="img-fluid" width="150">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                                    <img src="{{ asset("/images/wise-logo.png") }}" class="img-fluid" width="150">
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                                    <img src="{{ asset("/images/skrill-logo.png") }}" class="img-fluid" width="120">
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content accordion" id="myTabContent">
                            <div class="tab-pane fade show active accordion-item" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">

                                <h2 class="accordion-header d-lg-none" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <img src="{{ asset("/images/paypal-visa.png") }}" class="img-fluid" width="150">
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show  d-lg-block" aria-labelledby="headingOne" data-bs-parent="#myTabContent">
                                    <div class="accordion-body">
                                        <div class="alert-danger mb-2"></div>
                                        <div class="col-md-6 col-12 m-auto">
                                            <div id="paypal-button"></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="tab-pane fade accordion-item" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                                <h2 class="accordion-header d-lg-none" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <img src="{{ asset("/images/wise-logo.png") }}" class="img-fluid" width="150">
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingTwo" data-bs-parent="#myTabContent">
                                    <div class="accordion-body">
                                        <x-form.pay method="Wise" order_id="{{ $order->id }}"
                                                    amount="{{ $order->amount }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade accordion-item" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                                <h2 class="accordion-header d-lg-none" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <img src="{{ asset("/images/skrill-logo.png") }}" class="img-fluid" width="120">
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse d-lg-block" aria-labelledby="headingThree" data-bs-parent="#myTabContent">
                                    <div class="accordion-body">
                                        <x-form.pay method="Skrill" orderId="{{ $order->id }}"
                                                    amount="{{ $order->amount }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-4 col-12 mt-3">
                <div class="card">
                    <h5 class="card-title text-center text-capitalize mt-3"> Order Checkout </h5>
                    <hr>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="translate_from_span">Translate From:</label>
                            <span class="text-gray-900" id="translate_from_span">
                                {{ $order->trans_from }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="translate_to_span">Translate To:</label>
                            <span class="text-gray-900" id="translate_to_span">
                                {{ $order->trans_to }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="field_span">Field:</label>
                            <span class="text-gray-900" id="field_span">
                                {{ $order->field }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="specialist_span">Specialty:</label>
                            <span class="text-gray-900" id="specialist_span">
                                {{ $order->specialist }}
                            </span>
                        </div>
                        @if($order->field_type)
                        <div class="form-group type_summary">
                            <label for="specialist_span">Discipline:</label>
                            <span class="text-gray-900" id="type_span">
                                {{ $order->field_type }}
                            </span>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="estimated_delivery">Deliver at:</label>
                            <span class="text-gray-900" id="estimated_delivery">
                                {{ \Illuminate\Support\Carbon::now()->addDays(3)->format("Y-m-d") }}
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="estimated_delivery">Words:</label>
                            <span class="text-gray-900" id="estimated_delivery">
                                {{ $order->words }}
                            </span>
                        </div>
                        <div class="form-group mb-2">
                            <label for="estimated_delivery">Amount:</label>
                            <span class="text-gray-900" id="estimated_delivery">
                                {{ number_format($order->amount,2) }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function setPayload(){

            paypal.Buttons({
                createOrder: function(data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                currency_code:"EUR",
                                value: "{{ $order->amount }}"
                            }
                        }]
                    });
                },

                onApprove: function(data, actions) {
                    return actions.order.capture().then(function (details) {
                        console.log(details)

                        let paymentData = {
                            "_token": "{{ csrf_token() }}",
                            "email": details.payer.email_address,
                            "payer_id": details.payer.payer_id,
                            "payment_id": details.id,
                            "amount": "{{ $order->amount }}",
                            "order_id": "{{ $order->id }}",
                            "payment_method": "paypal",
                        };

                        let alertErr = document.querySelector(".alert-danger");
                        alertErr.innerHTML = "";
                        alertErr.classList.remove("p-2");


                            fetch("/store_payment",{
                                method: 'post',
                                headers:{
                                    "Accept": "application/json"
                                },
                                body: paymentData
                            })
                            .then(Result => Result.json())
                            .then(response => {
                                if (response.error){
                                    alertErr.classList.add("p-2");
                                    alertErr.innerHTML = response.error;
                                }else{
                                    location.href = "/payments";
                                }
                            })

                        alert('Transaction completed, Thanks ' + details.payer.name.given_name);
                    });
                },
                onError: function (err) {
                    alert("Something went wrong, Please try again Or contact us")
                    console.log(err);
                }

            }).render('#paypal-button');
        }
        document.onload = setPayload();
    </script>

@endsection

