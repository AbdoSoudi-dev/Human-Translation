@extends("layouts.layout")
@section("title","Login")

@section("content")

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="container">

            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-8 col-lg-6">
                    <div class="border border-3 border-primary"></div>
                    <div class="card bg-white">
                        <div class="card-body p-5">
                            <x-jet-validation-errors class="mb-4" />

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if (session()->has("message"))
                                <p class="mb-4 text-center alert-success p-2">
                                    {!! session()->get('message')  !!}
                                </p>
                            @endif
                            @if (session()->has("status"))
                                <p class="mb-4 text-center alert-success p-2">
                                    {!! session()->get('status')  !!}
                                </p>
                            @endif
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('login') }}">
                                @csrf
                                <h2 class="fw-bold mb-2">{{ config("app.name") }}</h2>
                                <p class=" mb-3">Please enter your email and password!</p>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******" required>
                                </div>
                                <p class="col-12 text-left mt-1">
                                    <a href="{{ url("/forgot-password") }}">
                                        Password Forgotten?
                                    </a>
                                </p>
                                <x-jet-checkbox id="remember_me" name="remember" />
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                <div class="d-grid mt-3">
                                    <button class="btn btn-outline-primary" type="submit">Login</button>
                                </div>


                            </form>
                            <div>
                                <p class="mb-0 text-center">Don't have an account?
                                    <a href="{{ route("register") }}" class="text-blue-dark fw-bold">Sign Up</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
