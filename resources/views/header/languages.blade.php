@extends("layouts.layout")
@section("title","Languages")

@section("content")
    <div class="container">
        <div class="row">
            <h3 class="col-12 text-blue-dark">Languages</h3>
            <div class="col-md-12 col-sm-10">
                Through translators specialized in more than <strong>60 disciplines,</strong> we provide accurate and
                manual translation in <strong>30 languages</strong> without changing and keeping the same meaning:
                <strong>Scientific, Natural Sciences, Technical, Literary, Web Content, and Artistic</strong> for your file, whether
                it is <strong>a book, an article, or a patent,</strong> and you can publish it in a variety of official
                parts such as <strong>publishing houses, scientific journals, or patent offices.</strong>
            </div>
            <div class="row d-flex justify-content-between mb-5" id="languagesDisplay">

            </div>
        </div>
    </div>
    <script>
        let languages = ["English (US)","English (UK)","French","Arabic","German","Spanish","Italian","Russian",
            "Portuguese","Portuguese (Brazilian)","Romanian","Japanese","Chinese (simplified)","Turkish",
            "Bulgarian","Ukrainian","Lithuanian","Polish","Indonesian","Slovak","Romanian","Japanese","Chinese (simplified)",
            "Turkish","Bulgarian","Ukrainian","Lithuanian","Polish","Indonesian","Slovak",];
        let languagesDiv = document.getElementById("languagesDisplay");
        for (let i = 0; i < languages.length; i++) {
            const langElement = document.createElement("div");
            langElement.classList = "col-md-4 col-6 pt-3 text-center";
            langElement.textContent = languages[i];
            languagesDiv.append(langElement) ;
        }
    </script>
@endsection
