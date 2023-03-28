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
                Create new password
            </p>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email" class="col-12 text-left">Email</label>
                    <input type="email" name="email" id="email" class="form-control " value="{{ old('email', $request->email) }}" required>
                    @error("password")
                    <label class="col-12 text-left text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label class="col-12 text-left" for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                           placeholder="Password*" data-form-field="Password">
                    @error("password")
                    <label class="col-12 text-left text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group mt-3">
                    <label class="col-12 text-left" for="password_confirmation">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                           placeholder="Confirm Password*" data-form-field="Confirm Password">
                    @error("password_confirmation")
                    <label class="col-12 text-left text-danger">{{ $message }}</label>
                    @enderror
                </div>

                <div class="form-group mt-2 text-center">
                    <button type="submit" class="btn btn-primary p-2">
                        Reset Password
                    </button>
                </div>

            </form>
        </div>
    </div>

@endsection
