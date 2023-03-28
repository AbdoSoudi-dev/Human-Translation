@extends("layouts.layout")
@section("title","Register")

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
                            <form class="mb-3 mt-md-4" method="POST" action="{{ route('register') }}">
                                @csrf
                                <h2 class="fw-bold mb-2">{{ config("app.name") }}</h2>
                                <p class="text-left mb-3">Sign Up</p>
                                <div class="mb-3">
                                    <label for="name" class="form-label ">name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="ex: john" value="{{ old("name") }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label ">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" value="{{ old("email") }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label ">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="*******" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label ">Confirm Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                                           placeholder="*******" required>
                                </div>
                                <div class="d-grid mt-3">
                                    <button class="btn btn-outline-primary" type="submit">Sign Up</button>
                                </div>
                            </form>
                            <div>
                                <p class="mb-0 text-center">have an account?
                                    <a href="{{ route("login") }}" class="text-blue-dark fw-bold">Login</a></p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
