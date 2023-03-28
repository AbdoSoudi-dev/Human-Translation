@extends("layouts.layout")
@section("title","Track Your Order")

@section("content")
    <div class="container">
        <div class="row">
            <h3 class="col-12 text-blue-dark">
                Track your order
                <span class="text-capitalize">[{{ $order->project_name }}]</span>
            </h3>

            <div class="row d-flex justify-content-center mt-3">
                <div class="col-md-6 col-12">
                    <p class="text-capitalize">
                        <span class="text-bold"> Project name: </span>
                        {{ $order->project_name }}
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <p>
                        <span class="text-bold"> Project ID: </span>
                        {{ $order->project_id }}
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <p>
                        <span class="text-bold"> From {{ $order->trans_from }} to {{ $order->trans_to }} translation </span>
                    </p>
                </div>
                <div class="col-md-6 col-12">
                    <p>
                        <span class="text-bold"> Field / Specialty : </span>
                        {{ $order->field }} / {{ $order->specialist }}
                    </p>
                </div>
            </div>

            <div class="col-md-12 col-sm-10">
                widely 24 offers a tracking order. for customer requests each user can track the stages
                of the processing file from 5% immediately after the payment process to 100% via their
                personal panel account on the site. The user uploads his file, and the process proceeds
                through the five basic stages. The user receives an updated email at each stage until the
                final stage where the final file is downloaded. These stages are carried out by human translation
                specialists with extensive experience in a variety of fields. They are as follows:
                <div class="my-3 py-4 position-relative track-overflow">
                    <div class="ml-2 row d-flex border-1 border-dark  track_order"
                         style="background: linear-gradient(90deg, #147ce5 {{ $order->percent }}%, #eff5f5 {{ $order->percent-100 }}%);">
                        <div class="w-10 stage-border">
                            <span class="stages_percent">
                                   {{ $order->percent > "7" && $order->percent <= "10" ? "" : "10%" }}
                            </span>
                            <span class="w-10 stages">Reading and Checking</span>
                        </div>
                        <div class="w-10 stage-border ">
                            <span class="stages_percent">
                                   {{ $order->percent <= "20" && $order->percent >= "18" ? "" : "20%" }}
                            </span>
                            <span class="w-10 stages">Distribution Stage</span>
                        </div>
                        <div class="w-50 stage-border ">
                            <span class="stages_percent">
                                   {{ $order->percent <= "70" && $order->percent >= "65" ? "" : "70%" }}
                            </span>
                            <span class="w-50 stages">Translation Stage</span>
                        </div>
                        <div class="w-10 stage-border ">
                            <span class="stages_percent ">
                                {{ $order->percent <= "80" && $order->percent >= "75" ? "" : "80%" }}
                            </span>
                            <span class="w-10 stages">Revision / Proofreading</span>
                        </div>
                        <div class="w-20 stage-border ">
                            <span class="stages_percent ">
                                {{ $order->percent <= "100" && $order->percent >= "95" ? "" : "100%" }}
                            </span>
                            <span class="w-20 stages">Examination Stage</span>
                        </div>
                        <span class="tracking_percent d-md-block d-none w-10" style="left: {{ $order->percent-2 }}%">{{ $order->percent }}%</span>
                        <span class="tracking_percent d-md-none d-block w-10" style="left: {{ 700 * ($order->percent/100) -32 }}px">{{ $order->percent }}%</span>
                    </div>
                </div>

                <p class="mt-5 text-bold">1. Reading and Checking Stage [5% 10%]</p>
                <p class="ml-2">
                    This stage includes reading and checking the files carefully in order to accurately
                    determine the field and expertise translators in same field and selected language,
                    this stage takes less than 24 hours after the payment process.
                </p>
                <p class="text-bold">2. Distribution Stage [10% 20%]</p>
                <p class="ml-2">
                    This stage includes sending the file to selected translators for professional
                    translation and accuracy, as well as using more than one translator for accuracy
                    and speed, and it coincides with the first stage.
                </p>
                <p class="text-bold">3. Translation stage [20% 70%]</p>
                <p class="ml-2">
                    During this stage, files are translated by multiple translators with the same specialty,
                    as well as ideas are exchanged between them to maintain coherence of ideas and collect parts
                    of the translation for greater quality. Depending on the size and
                    number of words in the file, it can take anywhere from two to three days to a week.
                </p>
                <p class="text-bold">4. Revision and Proofreading Stage [70% 80%]</p>
                <p class="ml-2">
                    The proofreading and revision stage includes reviewing the file in search of errors of all kinds,
                    linguistic and grammatical, rephrasing and structuring sentences, and preserving ideas,
                    and it is done by It is carried out by native linguists of the translated language.
                </p>
                <p class="text-bold">5. Examination Stage [80% 100%]</p>
                <p class="ml-2">
                    This is the final step before the translation file is submitted and downloaded by the user,
                    its goal is to fully verify. The entire file is re-examined in order to
                    verify the translation and maintain the same meaning without changing any ideas.
                </p>
                <p >
                    The time required to process files may take less than 24 hours as the shortest period,
                    three days as the average period, and a week to 15 days as the longest period, depending on
                    the number of words and the size of the file,
                    and every period includes passing through all previous stages.
                </p>
            </div>

        </div>
    </div>
@endsection
