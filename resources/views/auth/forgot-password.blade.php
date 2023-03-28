@extends("layouts.layout")
@section("title","Reset Password")
@section("content")

    <div class="container">
        <div class="row">
            <h4 class="text-bold text-capitalize">
                Reset Password
            </h4>

            @error("email")
                <div class="alert alert-danger mt-2">
                    {{ $message }}
                </div>
            @enderror
            @if(session()->has("status"))
                <div class="alert alert-success mt-2">
                    {{ session()->get("status") }}
                </div>
            @endif

            <p class="text-left mt-2">
                Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
            </p>

            @if (session()->has("message"))
                <div class="my-3 text-center text-success">
                    A new verification link has been sent to the email address you provided in your profile settings
                </div>
            @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                        <div class="form-group m-2">
                            <label for="email" class="col-12 text-left">Email</label>
                            <input type="email" name="email" id="email" class="form-control " required>
                        </div>

                        <div class="form-group col-md-6 col-12 text-center">
                            <button type="submit" class="btn btn-primary p-2">
                                Email Password Reset Link
                            </button>
                        </div>

                </form>
            </div>
    </div>

@endsection
