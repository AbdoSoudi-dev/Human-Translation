<form method="post" onsubmit="payOrder(event,'{{ strtolower($method) }}')">
    @csrf

    <div class="alert-danger danger-form"></div>

    <div class="form-group mt-2">
        <h4 class="text-center text-bold">{{ $method }} to {{ $method }} transfer</h4>
        <div class="mt-2">
            <strong>
                Send to our email {{ $method }} account {{ $amount }} € : <br>
            </strong>
            <span class="text-primary">services.professional.24h@gmail.com</span>
            and upload  screenshot of transaction statement below
        </div>
    </div>
    <div class="form-group mt-2">
        <label for="">Email</label>
        <input type="email" class="form-control" name="email" placeholder="Write your {{ $method }} email sender" required>
    </div>
    <div class="form-group mt-2">
        <label for="">Upload transaction image</label>
        <input type="file" class="form-control" name="image" required>
    </div>
    <div class="form-group mt-3 text-center">
        <button class="btn btn-outline-primary col-6 pay" type="submit">
            Pay Order
        </button>
    </div>
</form>

<script>
    function payOrder(event,paymentMethod) {
        event.preventDefault();

        let paymentData = new FormData(event.currentTarget);

        paymentData.append("amount","{{ $amount }}");
        paymentData.append("order_id","{{ $orderId }}");
        paymentData.append("payment_method", paymentMethod);

        let alertErr = document.querySelector(".danger-form");
        alertErr.innerHTML = "";
        alertErr.classList.remove("p-2");

        let btnSubmit = document.querySelector(".pay");
        btnSubmit.disabled = true
        btnSubmit.innerHTML = "waiting.."

        fetch("/store_payment",{
            method: 'post',
            headers:{
                'Accept': 'application/json'
            },
            body: paymentData
        })
        .then(Result => Result.json())
        .then(response => {
            btnSubmit.disabled = true
            btnSubmit.innerHTML = "Pay Order"
            if (response.error){
                alertErr.classList.add("p-2");
                alertErr.innerHTML = response.error;
            }else{
                location.href = "/payments";
            }
        })
    }
</script>
