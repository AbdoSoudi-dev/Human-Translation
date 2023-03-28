@extends("layouts.layout")
@section("title","File Translate")

@section("content")
    <h3 class="text-center mt-5">
        The World’s Fastest Human Translation Service
    </h3>

    <div class="container-fluid">
        <div class="row">

            <div class="container-fluid">
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
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-12">
                    <div class="wizard-sample-1">

                        <div class="br-wizard" collapsed="collapsed" step="1">
                            <div class="wizard-progress">
                                <button class="wizard-progress-btn" type="button" title="Upload" id="step_1">
                                    {{--                                    <i class="fa-solid fa-check blue-dark text-light border-radius-50 p-1"></i>--}}
                                    <span class="info">File type</span>
                                </button>
                                <button class="wizard-progress-btn" type="button" disabled title="Service" active="active" id="step_2">
                                    <span class="info">Upload</span>
                                </button>
                                <button class="wizard-progress-btn" type="button" disabled title="Delivery" active="active" id="step_3">
                                    <span class="info">Language</span>
                                </button>
                                <button class="wizard-progress-btn" type="button" disabled title="Language" active="active" id="step_4">
                                    <span class="info">Service</span>
                                </button>
                            </div>
                            <form id="wizard_form" enctype="multipart/form-data" action="{{ route("storeOrder") }}" method="post">
                                @csrf
                                <div class="wizard-form">
                                    <div class="wizard-panel" active="active">
                                        <div class="wizard-panel-content">
                                            <div class="h4">File type</div>

                                            <div class="form-group mb-3">
                                                <label for="file_type">File type</label>
                                                <select name="file_type" id="file_type"
                                                        class="form-control step_1 form-upload" step="1">
                                                    <option value="">Choose File Type</option>
                                                    <option value="book">Book </option>
                                                    <option value="article">Article </option>
                                                    <option value="patent">Patent </option>
                                                    <option value="web content">Web content </option>
                                                </select>
                                            </div>


                                        </div>
                                        <div class="wizard-panel-btn">
                                            <button class="br-button primary wizard-btn-next" disabled  id="step_btn_1"
                                                    type="button">
                                                Next
                                            </button>
                                        </div>
                                    </div>
                                    <div class="wizard-panel">
                                        <div class="wizard-panel-content">

                                            <div class="h4">Upload your file</div>

                                            <div class="text" tabindex="0">

                                                <div class="form-group">
                                                    <label for="project_name">Project Name:</label>
                                                    <input name="project_name" id="project_name"
                                                           class="form-control step_2 form-upload" step="2" placeholder="Please enter a project name" required>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <input type="file" class="form-control step_2 form-upload" step="2" onchange="calculateWords()"
                                                           name="uploaded_file" id="uploaded_file">
                                                    <small>Allowed formats: word, pdf, powerpoint & txt</small>
                                                    <p class="text-danger" id="file_error"></p>
                                                    <p class="text-primary" id="file_success"></p>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="wizard-panel-btn">
                                            <button class="br-button primary wizard-btn-next" disabled  id="step_btn_2"
                                                    type="button">
                                                Next
                                            </button>
                                            <button class="br-button secondary wizard-btn-prev" type="button">Previous
                                            </button>
                                        </div>
                                    </div>


                                    <div class="wizard-panel">
                                        <div class="wizard-panel-content">

                                            <div class="h4">Languages</div>
                                            <hr>

                                            <div class="text" tabindex="0">
                                                <div class="form-group mt-3">
                                                    <label for="translate_from">Translate From</label>
                                                    <select name="translate_from" id="translate_from"
                                                            class="form-control step_3 form-upload" step="3" onchange="setLanguages()" required>
                                                        <option value=""></option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="translate_to">Translate To</label>
                                                    <select name="translate_to" id="translate_to"
                                                            class="form-control step_3 form-upload" step="3" onchange="setLanguages()" required>
                                                        <option value=""></option>
                                                    </select>
                                                </div>

                                            </div>

                                        </div>
                                        <div class="wizard-panel-btn">
                                            <button class="br-button primary wizard-btn-next" disabled  id="step_btn_3"
                                                    type="button">
                                                Next
                                            </button>
                                            <button class="br-button secondary wizard-btn-prev" type="button">Previous
                                            </button>
                                        </div>
                                    </div>
                                    <div class="wizard-panel">
                                        <div class="wizard-panel-content">
                                            <div class="h4">Service Options</div>


                                            <div class="text" tabindex="0">

                                                <div class="form-group mt-3 field_parent">
                                                    <label for="subject_field">Field</label>
                                                    <select name="subject_field" id="subject_field"
                                                            class="form-control step_4 form-upload" step="4" onchange="setSpecialist()">
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3">
                                                    <label for="specialist">Specialty</label>
                                                    <select name="specialist" id="specialist"
                                                            class="form-control step_4 form-upload" step="4" onchange="setType()">
                                                        <option value="">select field to show Specialty</option>
                                                    </select>
                                                </div>

                                                <div class="form-group mt-3 type d-none">
                                                    <label for="type">Discipline </label>
                                                    <select name="type" id="type"
                                                            class="form-control step_4 form-upload" step="4" onchange="typeSummaryView()">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="wizard-panel-btn">
                                            <button onclick="submitForm()" disabled class="br-button primary wizard-btn" id="step_btn_4"
                                                    type="button">
                                                Final review
                                            </button>
                                            <button class="br-button secondary wizard-btn-prev" type="button">Previous
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-12 mt-5">
                    <div class="card">
                        <h5 class="card-title text-center text-capitalize  mt-3"> Order Summary </h5>
                        <hr>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="translate_from_span">Translate From:</label>
                                <span class="text-gray-900" id="translate_from_span">  </span>
                            </div>
                            <div class="form-group">
                                <label for="translate_to_span">Translate To:</label>
                                <span class="text-gray-900" id="translate_to_span">  </span>
                            </div>
                            <div class="form-group">
                                <label for="field_span">Field:</label>
                                <span class="text-gray-900" id="field_span">  </span>
                            </div>
                            <div class="form-group">
                                <label for="specialist_span">Specialty:</label>
                                <span class="text-gray-900" id="specialist_span">  </span>
                            </div>
                            <div class="form-group type_summary d-none">
                                <label for="specialist_span">Discipline:</label>
                                <span class="text-gray-900" id="type_span">  </span>
                            </div>
                            <div class="form-group mb-2">
                                <label for="estimated_delivery">Estimated Delivery:</label>
                                <span class="text-gray-900" id="estimated_delivery">
                                    {{ \Illuminate\Support\Carbon::now()->addDays(3)->format("Y-m-d") }}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mb-3 text-primary">
                                <div class="col-md-4 col-6 text-center">
                                    <span id="words_count">0</span> words
                                </div>
                                <div class="col-md-4 col-6 text-center">
                                    <span id="amount"></span> €
                                </div>
                            </div>

                            <div class="card-footer text-center">
                                <button class="btn btn-outline-primary mt-2" onclick="submitForm()">Proceed to final review</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
        function calculateWords() {

            let fileError = document.getElementById("file_error");
            let fileUploaded = document.getElementById("uploaded_file");
            let fileSuccess = document.getElementById("file_success");

            let fileFormId = document.getElementById("wizard_form");
            let fileForm = new FormData(fileFormId);

            fileForm.append("_token","{{ csrf_token() }}")

            fileSuccess.innerText = `Calculating words...`;

            fetch("/calculate_words",{
                method: 'post',
                headers:{
                    'Accept': 'application/json',
                },
                body: fileForm
            })
                .then(Result => Result.json())
                .then(response => {
                    if(response.errors){
                        fileError.innerText = response.errors.uploaded_file[0];
                        fileSuccess.innerText = "";
                        fileUploaded.value = "";
                        document.getElementById("words_count").innerText = 0;
                        document.getElementById("amount").innerText = "";
                    }else{
                        document.getElementById("words_count").innerText = response.count;
                        document.getElementById("amount").innerText = response.amount;

                        fileSuccess.innerText = `${response.count} word`;
                        fileError.innerText = "";
                    }
                })
        }
        let languages = ["English (US)","English (UK)","French","Arabic","German","Spanish","Italian","Russian",
            "Portuguese","Portuguese (Brazilian)","Romanian","Japanese","Chinese (simplified)","Turkish",
            "Bulgarian","Ukrainian","Lithuanian","Polish","Indonesian","Slovak","Romanian","Japanese","Chinese (simplified)",
            "Turkish","Bulgarian","Ukrainian","Lithuanian","Polish","Indonesian","Slovak",];
        function setLanguages() {
            let translateFrom = document.getElementById("translate_from");
            let translateTo = document.getElementById("translate_to");
            let translateFromOptions = "<option value=''>Choose Language</option>";;
            let translateToOptions = "<option value=''>Choose Language</option>";;
            for (let i = 0; i < languages.length; i++) {

                if ( translateFrom.value.trim() != languages[i].trim()){
                    translateToOptions += "<option "+(languages[i].trim() == translateTo.value.trim() ? "selected" : "")+" value='"+languages[i]+"'>"+languages[i]+"</option>";
                }
                if ( translateTo.value.trim() != languages[i].trim()){
                    translateFromOptions += "<option "+(languages[i].trim() == translateFrom.value.trim() ? "selected" : "")+" value='"+languages[i]+"'>"+languages[i]+"</option>";
                }
            }
            translateFrom.innerHTML = translateFromOptions;
            translateTo.innerHTML = translateToOptions;
            document.getElementById("translate_from_span").innerText =
                translateFrom.value.trim() ? translateFrom.value.trim() : "";
            document.getElementById("translate_to_span").innerText =
                translateTo.value.trim() ? translateTo.value.trim() : "";
        }
        setLanguages();

        let globalFields = {};
        async function getFields(){
            const response = await fetch("{{ asset("js/fields.json") }}");
            let responseFields = await response.json();
            setFields(responseFields);
        }
        function setFields(fields) {
            globalFields = fields;
            let subjectField = document.getElementById("subject_field");
            let type = document.querySelector(".type");
            type.classList.add("d-none")
            type.classList.remove("d-block");
            let fieldsOptions = "<option value=''> Choose field </option>";
            for (const [key, values] of Object.entries(fields)) {
                fieldsOptions += "<option value='"+ key +"'>"+ key +"</option>";
            }
            subjectField.innerHTML = fieldsOptions;
        }
        getFields();

        function setSummary() {
            let fieldCustom = document.querySelector(".custom_field");
            let specialistCustom = document.querySelector(".custom_specialist");

            fieldCustom.addEventListener("keyup",function (event) {
                document.getElementById("field_span").innerHTML = event.currentTarget.value
            })
            specialistCustom.addEventListener("keyup",function (event) {
                document.getElementById("specialist_span").innerHTML = event.currentTarget.value
            })
        }

        function setSpecialist(){
            let fieldCustom = document.querySelector(".custom_field")
            let specialistCustom = document.querySelector(".custom_specialist")

            fieldCustom?.remove();
            specialistCustom?.remove();

            let specialist = document.getElementById("specialist");
            specialist.innerHTML = '<option value="">select field to show specialists</option>';
            document.getElementById("specialist_span").innerText = "";
            let field = document.getElementById("subject_field").value;
            let type = document.querySelector(".type");
            type.classList.add("d-none")
            type.classList.remove("d-block");

            specialist.parentNode.classList.remove("d-none");

            if(field == "Other"){
                let fieldInput = document.createElement("input");
                fieldInput.placeholder = "Write your field";
                fieldInput.classList = "mt-3 form-control form-upload step_4 custom_field";
                fieldInput.name = "custom_field";
                fieldInput.step = 4;

                let specialistInput = document.createElement("input");
                specialistInput.placeholder = "Write your specialist";
                specialistInput.classList = "mt-3 form-control form-upload step_4 custom_specialist";
                specialistInput.name = "custom_specialist";
                specialistInput.step = 4;
                document.querySelector(".field_parent").append(fieldInput);
                document.querySelector(".field_parent").append(specialistInput);

                specialist.parentNode.classList.add("d-none");

                setSummary();
                validateInputs();
            }else {
                if (globalFields[field]){
                    let specialistOptions = "<option value=''> Choose Specialist </option>";
                    for (const [key, values] of Object.entries(globalFields[field])) {
                        specialistOptions += "<option value='"+ key +"'>"+ key +"</option>";
                    }
                    specialist.innerHTML = specialistOptions;
                }
            }
            document.getElementById("field_span").innerText = field;
            document.getElementById("type").value = "";
            typeSummaryView();
        }
        function setType(){
            let specialist = document.getElementById("specialist").value;
            let field = document.getElementById("subject_field").value;
            let type = document.querySelector(".type");
            type.classList.add("d-none");
            type.classList.remove("d-block");
            if (globalFields[field][specialist]){
                let typeOptions = "<option value=''> Choose field </option>";
                for (const [key, values] of Object.entries(globalFields[field][specialist])) {
                    typeOptions += "<option value='"+ values +"'>"+ values +"</option>";
                }
                type.classList.remove("d-none")
                type.classList.add("d-block");
                document.getElementById("type").innerHTML = typeOptions;
            }

            document.getElementById("specialist_span").innerText = specialist;
            document.getElementById("type").value = "";
            typeSummaryView();
        }
        function typeSummaryView() {
            let typeSummary = document.querySelector(".type_summary");
            let type = document.getElementById("type");
            typeSummary.classList.add("d-none");
            typeSummary.classList.remove("d-block");
            document.getElementById("type_span").innerText = "";

            if (type.value){
                typeSummary.classList.remove("d-none");
                typeSummary.classList.add("d-block");
                document.getElementById("type_span").innerText = type.value;
            }
        }

        let inputs = Array.from(document.querySelectorAll(".form-upload"));
        function submitForm() {
            let isType = document.querySelector(".type").classList.contains("d-block");
            for (let i = 0; i < inputs.length; i++) {
                let element = inputs[i];
                let stepId = "step_" + element.getAttribute("step");

                let isElmentType = element.id == "type";

                let subjectField = document.querySelector("#subject_field").value;
                let isCustomSpecialist = (!element.value && subjectField === "Other" &&
                    !element.parentNode.classList.contains("d-none"));

                if ((!element.value && ( (isElmentType && isType) || !isElmentType ) && subjectField !== "Other")
                        || isCustomSpecialist){

                    document.getElementById(stepId).click();

                    element.style = "transform: scale(.75);transition: all 1s ease-in-out;";

                    setTimeout(()=>{
                        element.style = "transform: scale(1);transition: all 1s ease-in-out;";
                    },500);
                    break;
                }
                if (i == inputs.length-1){
                    document.querySelector("#wizard_form").submit();
                }
            }
        }

        function validateInputs(){
            let inputs = Array.from(document.querySelectorAll(".form-upload"));
            inputs.forEach((input) => {

                input.addEventListener("change",(event) => {
                    let isType = document.querySelector(".type").classList.contains("d-block");
                    let step = event.currentTarget.getAttribute("step");
                    let stepId = document.querySelector("#step_" + (+step+1));
                    let stepIdNext = document.querySelector("#step_btn_" + step);
                    let stepElements = Array.from(document.querySelectorAll(".step_" + step));

                    let subjectField = document.querySelector("#subject_field").value;

                    stepId?.setAttribute("disabled","disabled")
                    stepIdNext?.setAttribute("disabled","disabled")

                    let isValue = true;
                    stepElements.forEach((element)=>{
                        let isCustomSpecialist = (!element.value && subjectField === "Other" &&
                                                !element.parentNode.classList.contains("d-none"));
                        let isElmentType = element.id == "type";
                        if ((!element.value && ( (isElmentType && isType) || !isElmentType ) && subjectField !== "Other")
                            || isCustomSpecialist){
                            isValue = false;
                        }
                    })
                    if (isValue){
                        stepId?.removeAttribute("disabled")
                        stepIdNext?.removeAttribute("disabled")
                    }
                });

                input.addEventListener("keyup",(event) => {
                    let step = event.currentTarget.getAttribute("step");
                    let stepId = document.querySelector("#step_" + (+step+1));
                    let stepIdNext = document.querySelector("#step_btn_" + step);
                    let stepElements = Array.from(document.querySelectorAll(".step_" + step));

                    let subjectField = document.querySelector("#subject_field").value;

                    stepId?.setAttribute("disabled","disabled")
                    stepIdNext?.setAttribute("disabled","disabled")

                    let isValue = true;
                    stepElements.forEach((element)=>{
                        let isCustomSpecialist = (!element.value && subjectField === "Other" &&
                            !element.parentNode.classList.contains("d-none"));
                        if ((!element.value && subjectField !== "Other") || isCustomSpecialist){
                            isValue = false;
                        }
                    })
                    if (isValue){
                        stepId?.removeAttribute("disabled")
                        stepIdNext?.removeAttribute("disabled")
                    }
                });

            });
        }
        validateInputs();
    </script>
@endsection

@push("scripts")
    <script src="https://www.gov.br/ds/assets/govbr-ds-dev-core/dist/core-init.js"></script>
@endpush

