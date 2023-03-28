@extends("layouts.layout")
@section("title","Contact us")

@section("content")

    <div class="container-fluid">
        <div class="row">
            <h3 class="col-12  text-center mt-3">Contact Us</h3>

            @if(session()->has("message"))
                <div class="col-md-6 col-12 m-auto text-center">
                    <div class="alert-success p-2">
                        {!! session()->get("message") !!}
                    </div>
                </div>
            @endif

            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2 m-auto">
                    <form method="post" data-form-title="CONTACT US" action="{{ route("contact_us") }}">
                        @csrf
                        <input type="hidden" data-form-email="true">
                        <div class="form-group mt-2">
                            <input type="text" class="form-control" name="name" value="{{ old("name") }}" required placeholder="Name*" data-form-field="Name">
                            @error("name")
                                <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <input type="email" class="form-control" name="email" value="{{ old("email") }}" required placeholder="Email*" data-form-field="Email">
                            @error("email")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <input type="text" class="form-control" name="subject" value="{{ old("subject") }}" required placeholder="Subject*" data-form-field="Subject">
                            @error("subject")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <textarea class="form-control" name="body" value="{{ old("body") }}" placeholder="Message" rows="7"
                                      data-form-field="Message"></textarea>
                            @error("body")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div >
                            <button type="submit" class="btn btn-lg btn-primary mt-3">
                                Contact us
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
