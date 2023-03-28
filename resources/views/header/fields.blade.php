@extends("layouts.layout")
@section("title","Our fields")

@section("content")
    <div class="container">
        <div class="row">
            <h3 class="text-blue-dark">Our fields</h3>
            <p>
                We provide accurate manual translation for 30 languages done by language <strong> translators specialists </strong> in
                more than <strong> 60 specialties </strong> We use accurate terms, technical,
                scientific and technical according to their field and specialization offered  in <strong> 5 main </strong> fields, <strong> Scientific, Natural science, Technical, Literary,
                Artistic, </strong> which are as follows :
            </p>
            <div class="row d-flex justify-content-around" id="fieldsDisplay">

            </div>
        </div>
    </div>
    <script>
        async function getFields(){
            const response = await fetch("{{ asset("js/fields.json") }}");
            let responseFields = await response.json();
            displayFields(responseFields);
        }

        let fieldsDisplay = document.getElementById("fieldsDisplay");
        function displayFields(fields) {
            for(const [key, values] of Object.entries(fields)){

                    if (key !== "Other"){
                        const title = document.createElement("div");
                        title.classList = "col-md-4 col-6 pt-3 text-left";

                        const h5 = document.createElement("h5");
                        h5.classList = "text-blue-dark text-bold";
                        h5.textContent = key;

                        title.appendChild(h5);

                        const specialistOl = document.createElement("ol");
                        title.appendChild(specialistOl);
                        for(const [key, valuesSpecialist] of Object.entries(values)) {
                            const specialistLi = document.createElement("li");
                            specialistLi.textContent = key;
                            specialistOl.appendChild(specialistLi)
                            if (valuesSpecialist){
                                const typeOl = document.createElement("ol");
                                specialistLi.appendChild(typeOl);
                                for (let i = 0; i < valuesSpecialist.length; i++) {
                                    const typeLi = document.createElement("li");
                                    typeLi.textContent = valuesSpecialist[i];
                                    typeOl.appendChild(typeLi);
                                }
                            }
                        }
                        fieldsDisplay.appendChild(title);
                    }
                }
        }
        getFields();
    </script>
@endsection
