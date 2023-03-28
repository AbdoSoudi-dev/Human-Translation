@extends("layouts.layout")
@section("title","Email Verification")
@section("content")

    <div class="container">
        <div class="row">
            <h4 class="text-bold text-capitalize">
                Email Verification
            </h4>
            <div class="">
                Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
            </div>

            @if (session()->has("message"))
                <div class="my-3 text-center text-success">
                    A new verification link has been sent to the email address you provided in your profile settings
                </div>
            @endif

            <div class="mt-3 d-flex align-items-center justify-content-center">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary p-2">
                        Resend Verification Email
                    </button>
                </form>
            </div>
        </div>
    </div>

@endsection
