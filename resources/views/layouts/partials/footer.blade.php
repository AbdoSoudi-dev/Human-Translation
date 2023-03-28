<footer class="bg-layout">
    <div class="col-12 mt-3">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4 col-12 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/about_us") }}">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/privacy_policy") }}">Privacy Policy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url("/terms_service") }}">Terms & Conditions</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link cursor-pointer" href="{{ url("/contact_us") }}">
                            Contact us
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-12 mb-4">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("translate") }}">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("languages") }}">Languages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("fields") }}">Our Fields</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route("document") }}">Document</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-12 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-3">
                        <a class="nav-link" href="{{ route("trackingOrder") }}">Track Order</a>
                    </li>
                    <li class="nav-item">
                        <div class="col-8">
                            <div class="row d-flex justify-content-start">
                                <div class="col-md-3">
                                    <a class="nav-link" href="#">
                                        <i class="fa-brands fa-facebook fa-2x"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" href="#">
                                        <i class="fa-brands fa-linkedin fa-2x"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" href="#">
                                        <i class="fa-brands fa-twitter fa-2x"></i>
                                    </a>
                                </div>
                                <div class="col-md-3">
                                    <a class="nav-link" href="#">
                                        <i class="fa-brands fa-instagram fa-2x"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-12">
                <div class="row d-flex justify-content-end">
                    <div class="col-md-4 col-12 mb-3 text-center">
                        <img src="{{ asset("/images/paypal-visa.png") }}" width="300" class="img-fluid">
                    </div>
                    <div class="col-md-3 col-12 mb-3 mt-2 mx-3 text-center">
                        <img src="{{ asset("/images/skrill-logo.png") }}" width="200" class="img-fluid">
                    </div>
                    <div class="col-md-3 col-12 mb-3 mt-3 text-center">
                        <img src="{{ asset("/images/wise-logo.png") }}" width="200" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-12 mt-2 text-center">
                <img src="{{ asset("/images/logo.PNG") }}" width="60" class="img-fluid">
                <div class="mt-3 copyright">
                    © {{ date("Y") }} Widely24. All rights reserved.
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="{{ asset("js/bootstrap.bundle.min.js") }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/js/all.min.js" integrity="sha512-rpLlll167T5LJHwp0waJCh3ZRf7pO6IT1+LZOhAyP6phAirwchClbTZV3iqL3BMrVxIYRbzGTpli4rfxsCK6Vw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type='text/javascript'>
    var onWebChat={ar:[], set: function(a,b){if (typeof onWebChat_==='undefined'){this.ar.
        push([a,b]);}else{onWebChat_.set(a,b);}},get:function(a){return(onWebChat_.get(a));},
        w:(function(){ var ga=document.createElement('script'); ga.type = 'text/javascript';
            ga.async=1;ga.src=('https:'==document.location.protocol?'https:':'http:') +
                '//www.onwebchat.com/clientchat/aa955afe991255b4d0f47222e996cb8d';var s=
                document.getElementsByTagName('script')[0];s.parentNode.insertBefore(ga,s);})()}

    const loading = document.getElementById("loading");
    window.onload = function () {
        loading.classList.add("d-none");
        document.querySelector("body").removeAttribute("disabled")
    }
    window.addEventListener("beforeunload",function () {
        loading.classList.remove("d-none");
        document.querySelector("body").setAttribute("disabled","disabled")
    })

</script>
@stack("scripts")
</body>
</html>
