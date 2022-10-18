@extends('layouts.app')

@section('title')
Register | FebruaryReadings
@endsection

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                @csrf
                <span class="login100-form-title p-b-32">
                    Registration
                </span>
                <span class="txt1 p-b-11">
                    Username
                </span>
                @error('username')
                    <div style = "width: 100%" class = "alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-12" data-validate="Username is required">
                    <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="text" name="username">
                    <span class="focus-input100"></span>
                </div>
                
                <span class="txt1 p-b-11">
                    Email
                </span>
                @error('email')
                    <div style = "width: 100%" class = "alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-12" data-validate="Email is required">
                    <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="email" name="email">
                    <span class="focus-input100"></span>
                </div>
                
                <span class="txt1 p-b-11">
                    Password
                </span>
                @error('password')
                    <div style = "width: 100%" class = "alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-12" data-validate="Password is required">
                    <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                    </span>
                    <input class="input100" type="password" name="password">    
                    <span class="focus-input100"></span>
                </div>
                
                
                <span class="txt1 p-b-11">
                    Re-Password
                </span>
                @error('re-password')
                    <div style = "width: 100%" class = "alert alert-danger">{{ $message }}</div>
                @enderror
                <div class="wrap-input100 validate-input m-b-36" data-validate="Re-Password is required">
                    <input class="input100" type="password" name="re-password">
                    <span class="focus-input100"></span>
                </div>
                
                <div class="flex-sb-m w-full p-b-48">
                    
                    <div>
                        <a href="login" class="txt3">
                            already have an account?
                        </a>
                    </div>  
                </div>
                <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Sign up
                </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection