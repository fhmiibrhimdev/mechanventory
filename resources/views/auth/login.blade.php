<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Inventory</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}?_={{ rand(1000,2000) }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
</head>

<body class="tw-bg-gray-50" style="font-family: 'Roboto', sans-serif;">

    <div class="tw-max-w-lg tw-mx-auto tw-mt-4 tw-px-4">
        <div class="tw-rounded-2xl tw-text-center tw-mt-10">
            <center>
                <img src="http://priok.solusi-rnd.tech/img/vector2.png" class="tw-w-9/12 lg:tw-w-6/12">
            </center>
            <p class="tw-font-semibold tw-m-4 tw-text-xl">Welcome to Mechanventory</p>
            <p class="tw-text-base">Sign In your account</p>
        </div>
        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="tw-mt-10">
                <i class="far fa-user tw-text-gray-500 tw-ml-7 tw-mt-[23px] tw-absolute tw-text-sm"></i>
                <input type="email" class="tw-mt-1 tw-block tw-w-full tw-pl-16 tw-pr-7 tw-py-5 tw-rounded-full tw-bg-white tw-border tw-border-none tw-text-sm tw-shadow-sm tw-placeholder-slate-400
                                  focus:tw-outline-none focus:tw-border-blue-500 focus:tw-ring-1 focus:tw-ring-blue-500
                                " placeholder="Masukkan email anda.." name="email" id="email" required="" autofocus="">
            </div>
            <div class="tw-mt-4">
                <i class="far fa-lock-open tw-text-gray-500 tw-ml-7 tw-mt-[23px] tw-absolute tw-text-sm"></i>
                <input type="password" class="tw-mt-1 tw-block tw-w-full tw-pl-16 tw-pr-7 tw-py-5 tw-rounded-full tw-bg-white tw-border tw-border-none tw-text-sm tw-shadow-sm tw-placeholder-slate-400
                                  focus:tw-outline-none focus:tw-border-blue-500 focus:tw-ring-1 focus:tw-ring-blue-500
                                " placeholder="Masukkan password anda.." name="password" id="password" required=""
                    autocomplete="current-password">
            </div>
            <div class="tw-mt-4 tw-text-center">
                <button
                    class="tw-rounded-full tw-bg-blue-800 tw-px-20 tw-py-3 tw-mt-8 tw-mb-3 tw-font-bold tw-text-white tw-shadow-sm tw-shadow-blue-700 hover:tw-bg-blue-600">
                    LOG IN
                </button>
            </div>
        </form>
    </div>
</body>

</html>

{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
@csrf

<!-- Email Address -->
<div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required
        autofocus />
    <x-input-error :messages="$errors->get('email')" class="tw-mt-2" />
</div>

<!-- Password -->
<div class="tw-mt-4">
    <x-input-label for="password" :value="__('Password')" />

    <x-text-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required
        autocomplete="current-password" />

    <x-input-error :messages="$errors->get('password')" class="tw-mt-2" />
</div>

<!-- Remember Me -->
<div class="tw-block tw-mt-4">
    <label for="remember_me" class="tw-inline-flex tw-items-center">
        <input id="remember_me" type="checkbox"
            class="tw-rounded dark:tw-bg-gray-900 tw-border-gray-300 dark:tw-border-gray-700 tw-text-indigo-600 tw-shadow-sm focus:tw-ring-indigo-500 dark:focus:tw-ring-indigo-600 dark:focus:tw-ring-offset-gray-800"
            name="remember">
        <span class="tw-ml-2 tw-text-sm tw-text-gray-600 dark:tw-text-gray-400">{{ __('Remember me') }}</span>
    </label>
</div>

<div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
    @if (Route::has('password.request'))
    <a class="tw-underline tw-text-sm tw-text-gray-600 dark:tw-text-gray-400 hover:tw-text-gray-900 dark:hover:tw-text-gray-100 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 dark:focus:tw-ring-offset-gray-800"
        href="{{ route('password.request') }}">
        {{ __('Forgot your password?') }}
    </a>
    @endif

    <x-primary-button class="tw-ml-3">
        {{ __('Log in') }}
    </x-primary-button>
</div>
</form>
</x-auth-card>
</x-guest-layout> --}}