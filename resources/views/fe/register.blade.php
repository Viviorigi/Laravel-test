@extends('fe.index')

@section('main')
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="demo4.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>

    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-7 m-auto">
                        <div class="heading mb-1">
                            <h2 class="title">Register</h2>
                        </div>
                        <form action="" method="POST">
                            @csrf

                            <label for="login-email">
                                Email address
                                <span class="required">*</span>
                            </label>
                            <input type="email" name="email" class="form-input form-wide" id="login-email"  />

                            <label for="login-email">
                                Full Name
                                <span class="required">*</span>
                            </label>
                            <input type="text" name="name" class="form-input form-wide" id="login-email"  />

                            <label for="login-password">
                                Password
                                <span class="required">*</span>
                            </label>
                            <input type="password"  name="password" class="form-input form-wide" id="login-password" required />

                            <label for="login-password">
                                Confirm Password
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-input form-wide" id="login-password" required />

                            <div class="form-footer">
                                <a href="{{route('login')}}"
                                    class="forget-password text-dark form-footer-right">You have account?</a>
                            </div>
                            <button type="submit" class="btn btn-dark btn-md w-100 mb-3">
                                Register
                            </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main>


@endsection