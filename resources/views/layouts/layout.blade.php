@include("layouts.partials.header")
<div id="page-container">
    <div class="translate-body">
        <section class="d-flex flex-column justify-content-center" id="body">
            @yield("content")
        </section>
    </div>
</div>
@include("layouts.partials.footer")
