@extends("layouts.layout")
@section("title","Profile Settings")

@section("content")

    <div class="container-fluid">
        <div class="row">
            <h3 class="col-12 text-left mt-3">Profile Settings</h3>
            @if(session()->has("message"))
                <div class="col-md-6 col-12 m-auto text-center">
                    <div class="alert-success p-2">
                        {!! session()->get("message") !!}
                    </div>
                </div>
            @endif

            <div class="row text-center">
                <div class="col-sm-8 col-sm-offset-2 m-auto">
                    <form method="post" data-form-title="Update Profile Setting" action="{{ route("updateProfileSettings") }}">
                        @csrf

                        @if(!$user->email_verified_at)
                            <div class="form-group mt-2">
                                <p class="alert-danger p-2 text-center">
                                    Verify your email to contact us easier and more security <br>
                                    From <a class="btn-sm btn-outline-danger" href="{{ route("verification.notice") }}">
                                            HERE
                                        </a>
                                </p>
                                <label class="col-12 text-left" for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old("email",$user->email) }}"
                                       required placeholder="Email*" data-form-field="Email">
                                @error("email")
                                <label class="col-12 text-left text-danger">{{ $message }}</label>
                                @enderror
                            </div>
                        @endif

                        <div class="form-group mt-3">
                            <label class="col-12 text-left" for="current_password">Current Password</label>
                            <input type="password" class="form-control" name="current_password" id="current_password"
                                    placeholder="Current Password*" data-form-field="Current Password">
                            @error("current_password")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="col-12 text-left" for="password">New Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                    placeholder="New Password*" data-form-field="New Password">
                            @error("password")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label class="col-12 text-left" for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
                                   placeholder="Confirm New Password*" data-form-field="Confirm New Password">
                            @error("password_confirmation")
                            <label class="col-12 text-left text-danger">{{ $message }}</label>
                            @enderror
                        </div>

                        <div>
                            <button type="submit" class="btn btn-lg btn-primary mt-3">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
