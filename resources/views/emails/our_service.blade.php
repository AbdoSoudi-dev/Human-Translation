@component('mail::message')
    <h2 class="text-center text-bold"> Professional Human Translation </h2>
    <p> Hello, Dear Caller </p>
    <p> We have just received your request for our <b> professional human
        translation </b> service via our website.
        To published widely into several languages </p>
    <p> Do you want a <b> Professional, Manual, Accurate Translation without changing
        the meaning in many fields and disciplines </b> for your <b> book,
        Article, Patent, web content </b> You can access the service by clicking on the button </p>
    <div class="w-100 text-center">
        <a href="{{ config("app.url")."/translate" }}" class="btn btn-start-now">
            Start now
        </a>
    </div>
    <section id="translation_service">
        <div class="mb-30 grid-container">
            <div class="w-50">
                <h3>Why Our Translation Service is unique?</h3>
            </div>
            <div class="text-center w-50">
                <img src="{{ config("app.url"). "/images/home page/widely.jpg" }}" alt="widely man">
            </div>
        </div>
    </section>
    <section id="addition_professional ">
        <div class="mb-30 text-center">
            <div class="w-100 mb-30">
                <h3 class="">In addition to the professional translation service, we offer additional free services:</h3>
            </div>
            <div class="box text-center ">
                <p class="text-bold">Reading and Checking</p>
                <div class="border-1 p-2">
                    <img src="{{ config("app.url"). "/images/home page/open-book.png" }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                    <p class="free-paragraph">
                        Before starting the translation process, your file is carefully read and checked by
                        specialists in order to accurately
                        identify the specialized translators in the field and move on to the next step.
                    </p>
                </div>
            </div>
            <div class="box text-center ">
                <p class="text-bold">Human Quality Selected</p>
                <div class="border-1 p-2">
                    <img src="{{ config("app.url"). "/images/home page/team.png" }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                    <p class="free-paragraph">
                        After reading and checking the file, it is sent to several translators specialized
                        in the same field for high quality and accuracy and cooperation to ensure speed.
                    </p>
                </div>
            </div>
            <div class="box text-center ">
                <p class="text-bold">Revision / Proofreading</p>
                <div class="border-1 p-2">
                    <img src="{{ config("app.url"). "/images/home page/read.png" }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                    <p class="free-paragraph">
                        After the translation process is complete, it is fully reviewed for linguistic and
                        grammatical errors, association of ideas and meaning in the first instance.
                    </p>
                </div>
            </div>
            <div class="box text-center">
                <p class="text-bold">Multiple Examination</p>
                <div class="border-1 p-2">
                    <img src="{{ config("app.url"). "/images/home page/multiple.png" }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                    <p class="free-paragraph">
                        The translation After revision and Proofreading, it is again examined by multiple expert
                        translators for consistency of ideas and to keep the same meaning unchanged.
                    </p>
                </div>
            </div>
    </div>
    </section>
    <p> If you need assistance with this process, please contact the widely24 Team </p>
    <p> (support@widely24.com) Thank best regards </p>
@endcomponent

{{--    <section id="order_passing">--}}
{{--        <div class="w-100 mb-30">--}}
{{--            <h3 class="text-center">Your order passing by Five steps</h3>--}}
{{--        </div>--}}
{{--        <div class="mb-30 text-center justify-content-center">--}}
{{--            <div class="order_pass text-center">--}}
{{--                <div class="text-bold header order_pass_number">--}}
{{--                    1--}}
{{--                </div>--}}
{{--                <p class="text-center">Upload File</p>--}}
{{--            </div>--}}
{{--            <div class="order_pass text-center">--}}
{{--                <div class="text-bold header order_pass_number">--}}
{{--                    2--}}
{{--                </div>--}}
{{--                <p class="text-center">Add information</p>--}}
{{--            </div>--}}
{{--            <div class="order_pass text-center">--}}
{{--                <div class="text-bold header order_pass_number">--}}
{{--                    3--}}
{{--                </div>--}}
{{--                <p class="text-center">Pay online</p>--}}
{{--            </div>--}}
{{--            <div class="order_pass text-center">--}}
{{--                <div class="text-bold header order_pass_number">--}}
{{--                    4--}}
{{--                </div>--}}
{{--                <p class="text-center">Tracking Order</p>--}}
{{--            </div>--}}
{{--            <div class="order_pass text-center w-100">--}}
{{--                <div class="text-bold header order_pass_number">--}}
{{--                    5--}}
{{--                </div>--}}
{{--                <p class="text-center">Download Translation</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section id="features">--}}
{{--        <div class="w-100 mb-30 text-center">--}}
{{--            <h3 class="text-center">Fast Delivery</h3>--}}
{{--            <p class="text-center">Your Deadline, Our Priority</p>--}}
{{--            <div class="w-100 text-center">--}}
{{--                <img src="{{ config("app.url"). "/images/home page/clock.png" }}" alt="" class="text-center img-fluid w-50">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="w-100 mb-30 text-center">--}}
{{--            <h3 class="text-center">Translation invoice</h3>--}}
{{--            <p class="text-center">We offer an approved invoice that can be submitted--}}
{{--                to the official authorities to compensate for the translation amount--}}
{{--            </p>--}}
{{--            <div class="w-100 text-center">--}}
{{--                <img src="{{ config("app.url"). "/images/home page/bill.png" }}" alt="" class="img-fluid w-50">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="w-100 mb-30 text-center">--}}
{{--            <h3 class="text-center">We are available 24h/7 to listen to you via chat</h3>--}}
{{--            <div class="w-100 text-center">--}}
{{--                <img src="{{ config("app.url"). "/images/home page/24-hours.png" }}" alt="" class="img-fluid w-50">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
