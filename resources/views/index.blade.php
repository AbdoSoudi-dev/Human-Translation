@extends("layouts.layout")


@section("content")
    <div class="container">
        <section id="home-section">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-center title-font">
                        Professional Human Translation
                    </h1>
                    <p class="text-center mb-30">
                        <span class="text-bold">
                            To published widely into several languages
                        </span>
                    </p>
                    <p class="text-center mb-30">
                        Do you want a Professional, Manual, Accurate Translation without changing the meaning in many fields and disciplines for your:
                    </p>
                    <div class="row d-flex justify-content-center mb-30">
                        <div class=" col-md-8 col-11">
                            <div class="row d-flex justify-content-center">
                                <div class="col-md-3 col-6 text-center position-relative mb-2 radio-inputs">
                                    <label for="book_radio" class="label-home cursor-pointer text-capitalize">
                                        <input type="radio" name="radio" id="book_radio" class="radio">
                                        Book
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-md-3 col-6 text-center position-relative mb-2 radio-inputs">
                                    <label for="radio_article" class="label-home cursor-pointer text-capitalize ml-2">
                                        <input type="radio" name="radio" id="radio_article" class="radio">
                                        Article
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-md-3 col-6 text-center position-relative radio-inputs">
                                    <label for="radio_patent" class="label-home cursor-pointer text-capitalize ml-2">
                                        <input type="radio" name="radio" id="radio_patent" class="radio">
                                        Patent
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="col-md-3 col-6 text-center position-relative radio-inputs mb-2">
                                    <label for="radio_web_content" class="label-home cursor-pointer text-capitalize ml-5">
                                        <input type="radio" name="radio" id="radio_web_content" class="radio">
                                        <span class="web_content_mobile">Web content</span>
                                        <span class="checkmark checkmark_web_content"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mb-30">
                            <a href="{{ route("translate") }}" class="btn btn-start-now text-bold">
                                Start now
                            </a>
                        </div>
                    </div>
                </div>
                <div class="m-auto">
                    <p class="text-left mb-30 services">
                        We provide accurate human translation without changing and keeping the meaning via expert’s
                        translators in several fields, Scientific, Natural Science, Technical, Artistic, Web content
                        for various documents Books, Articles Patent, other content, Our motto is accuracy,
                        checking, revision, proofreading, examination and on-time delivery 24/7 Thus, quality, speed
                        and service - your satisfaction is guaranteed.
                    </p>
                </div>
            </div>
        </section>

        <section id="translation_service">
            <div class="row d-flex justify-content-center mb-30">
                <div class="col-md-5 col-6">
                    <h4 class="mt-43">Why Our Translation Service is unique?</h4>
                </div>
                <div class="col-md-5 col-6 mb-30">
                    <img src="{{ asset("/images/home page/widely.jpg") }}" alt="widely man" class="mt-3 img-fluid">
                </div>
            </div>
        </section>

        <section id="addition_professional ">
            <div class="row d-flex justify-content-center mb-30">
                <div class="col-12 mb-30">
                    <h4 class="">In addition to the professional translation service, we offer additional free services:</h4>
                </div>
                <div class="col-md-3 col-6 text-center mb-3">
                    <p class="text-bold">Reading and Checking</p>
                    <div class="border-1 border-dark p-2">
                        <img src="{{ asset("/images/home page/open-book.png") }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                        <p class="free-paragraph">
                            Before starting the translation process, your file is carefully read and checked by
                            specialists in order to accurately
                            identify the specialized translators in the field and move on to the next step.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center mb-3">
                    <p class="text-bold">Human Quality Selected</p>
                    <div class="border-1 border-dark p-2">
                        <img src="{{ asset("/images/home page/team.png") }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                        <p class="free-paragraph">
                            After reading and checking the file, it is sent to several translators specialized
                            in the same field for high quality and accuracy and cooperation to ensure speed.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center mb-3">
                    <p class="text-bold">Revision / Proofreading</p>
                    <div class="border-1 border-dark p-2">
                        <img src="{{ asset("/images/home page/read.png") }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                        <p class="free-paragraph">
                            After the translation process is complete, it is fully reviewed for linguistic and
                            grammatical errors, association of ideas and meaning in the first instance.
                        </p>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center mb-3">
                    <p class="text-bold">Multiple Examination</p>
                    <div class="border-1 border-dark p-2">
                        <img src="{{ asset("/images/home page/multiple.png") }}" alt="" class="mb-3 mt-2 img-fluid w-50">
                        <p class="free-paragraph">
                            The translation After revision and Proofreading, it is again examined by multiple expert
                            translators for consistency of ideas and to keep the same meaning unchanged
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section id="order_passing">
            <div class="col-12 mb-30">
                <h4 class="text-center">Your order passing by Five steps</h4>
            </div>
            <div class="row d-flex justify-content-center mb-30">
                <div class="order_pass text-center">
                    <div class="text-bold header order_pass_number">
                        1
                    </div>
                    <p>Upload File</p>
                </div>
                <div class="order_pass text-center">
                    <div class="text-bold header order_pass_number">
                        2
                    </div>
                    <p>Add information</p>
                </div>
                <div class="order_pass text-center">
                    <div class="text-bold header order_pass_number">
                        3
                    </div>
                    <p>Pay online</p>
                </div>
                <div class="order_pass text-center">
                    <div class="text-bold header order_pass_number">
                        4
                    </div>
                    <p>Tracking Order</p>
                </div>
                <div class="order_pass text-center">
                    <div class="text-bold header order_pass_number">
                        5
                    </div>
                    <p>Download Translation</p>
                </div>
            </div>
        </section>

        <section id="features">
            <div class="col-12 mb-30 text-center">
                <h4 class="text-center">Fast Delivery</h4>
                <p class="">Your Deadline, Our Priority</p>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 col-12">
                        <img src="{{ asset("/images/home page/clock.png") }}" alt="" class="mt-2 img-fluid w-50">
                    </div>
                </div>
            </div>
            <div class="col-12 mb-30 text-center">
                <h4 class="text-center">Translation invoice</h4>
                <p class="">We offer an approved invoice that can be submitted
                    to the official authorities to compensate for the translation amount
                </p>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 col-12">
                        <img src="{{ asset("/images/home page/bill.png") }}" alt="" class="mt-2 img-fluid w-50">
                    </div>
                </div>

            </div>
            <div class="col-12 mb-30 text-center">
                <h4 class="text-center">We are available 24h/7 to listen to you via chat</h4>
                <div class="d-flex justify-content-center">
                    <div class="col-md-6 col-12">
                        <img src="{{ asset("/images/home page/24-hours.png") }}" alt="" class="mt-2 img-fluid w-50">
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
