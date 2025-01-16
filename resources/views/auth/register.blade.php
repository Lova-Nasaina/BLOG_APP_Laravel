@extends("layouts.default")
@section("title", "Register")
@section("content")


<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-body p-5">
                    <h3 class="card-title text-center mb-4">Register</h3>


                    @if (session()->has("success"))
                    <div class="alert alert-success">
                        {{ session()->get("success") }}
                    </div>
                    @endif

                    @if (session()->has("error"))
                    <div class="alert alert-danger">
                        {{ session()->get("error") }}
                    </div>
                    @endif

                    <form method="post" action="{{ route("register.post") }}" enctype="multipart/form-data">

                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" >
                            @if ($errors->has('name'))
                        <span class="text-danger">
                            {{ $errors->first('name') }}
                        </span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email adress</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            @if ($errors->has('email'))
                        <span class="text-danger">
                            {{ $errors->first('email') }}
                        </span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            @if ($errors->has('password'))
                        <span class="text-danger">
                            {{ $errors->first('password') }}
                        </span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Repeat Password</label>
                            <input type="password" class="form-control" id="password" name="repeatpwd" placeholder="repeat your password" required>
                            @if ($errors->has('repeatpwd'))
                        <span class="text-danger">
                            {{ $errors->first('repeatpwd') }}
                        </span>
                        @endif
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Profil Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" placeholder="Photo profil" required>
                        @if ($errors->has('photo'))
                        <span class="text-danger">
                            {{ $errors->first('photo') }}
                        </span>
                        @endif
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Sign Up</button>
                        </div>
                    </form>
                    <div class="text-center mt-3">
                        <p>Already have an account? <a href="/login">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
