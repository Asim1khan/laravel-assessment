<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{ asset('backend/images/favicon.ico') }}">

<title>Sunny Admin - Log in </title>

<!-- Vendors Style-->
<link rel="stylesheet" href="{{ asset('backend/css/vendors_css.css') }}">

<!-- Style-->
<link rel="stylesheet" href="{{ asset('/backend/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('backend/css/skin_color.css') }}">

</head>
<body class="hold-transition theme-primary bg-gradient-primary">

<div class="container h-p100">
<div class="row align-items-center justify-content-md-center h-p100">

<div class="col-12">
<div class="row justify-content-center no-gutters">
<div class="col-lg-4 col-md-5 col-12">
<div class="content-top-agile p-10">
<h2 class="text-white">User Registration </h2>
<p class="text-white-50">Registration</p>
</div>
<div class="p-30 rounded30 box-shadowed b-2 b-dashed">
    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="form-group">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
                </div>
                <input type="text" id="name" name="name" class="form-control pl-15 bg-transparent text-white plc-white"
                    placeholder="name">
            </div>
        </div>


<div class="form-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text bg-transparent text-white"><i class="ti-user"></i></span>
        </div>
        <input type="email" id="email" name="email" class="form-control pl-15 bg-transparent text-white plc-white"
            placeholder="Email">
    </div>
</div>
<div class="form-group">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text  bg-transparent text-white">
                <i class="ti-lock"></i></span>
        </div>
        <input type="password" id="password" name="password" class="form-control pl-15 bg-transparent text-white plc-white" placeholder="Password">
    </div>
</div>
    <div class="row">
    <div class="col-6">
        <div class="checkbox text-white">
        <a  href="{{ route('login') }}" id="basic_checkbox_1"   class="btn">
                Login
        </a>
        </div>



    </div>
    <!-- /.col -->

    <!-- /.col -->
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-info btn-rounded mt-10">
            Register</button>
    </div>
    <!-- /.col -->
    </div>
</form>



<div class="text-center">
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Vendor JS -->
<script src="{{ asset('backend/js/vendors.min.js') }}"></script>
<script src="{{ asset('../assets/icons/feather-icons/feather.min.js') }}"></script>
</body>
</html>














{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
