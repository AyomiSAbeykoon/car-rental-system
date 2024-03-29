@extends('layouts.app')

@section('content')
    <body class="page mt-5">
    <main class="main page__main">

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <form class="login-form main__login-form" method="POST" action="{{ route('password.email') }}">
            <h3 class="login-form__title text-white">{{ __('Reset Password') }}</h3>
            @csrf

            <label class="login-form__label" for="uname"><span class="sr-only">{{ __('Email Address') }}</span>
                <input class="login-form__input  @error('email') is-invalid @enderror" placeholder="Email" id="email"
                       type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
            </label>

            <button class="primary-btn" type="submit">   {{ __('Send Password Reset Link') }}</button>

        </form>
    </main>
    </body>

    <style>

        @import "https://unpkg.com/open-props";

        *,
        *::before,
        *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .navbar {
            display: none;
        }

        *:focus {
            outline-offset: 4px;
        }

        button,
        input {
            font: inherit;
        }

        .page {
            color: white;
            overflow: hidden;
            background-size: cover;
            /*background-image: url(https://images.pexels.com/photos/2618804/pexels-photo-2618804.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);*/
            background: #222E3C no-repeat center;
            display: grid;
            grid-template-areas: "main";
            padding: var(--size-4);
            min-height: 100vh;
            font-family: var(--font-sans);
        }

        .page__main {
            grid-area: main;
        }

        .main {
            display: grid;
            align-items: center;
        }

        .main__login-form {
            margin-inline: auto;
            max-width: 35em;
            /*height: 30em;*/
        }

        .login-form {
            color: #433532;
            display: grid;
            position: relative;
            width: 100%;
            padding: var(--size-8);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 1em;
        }

        .login-form::before {
            background: rgba(255, 255, 255, 0.3);
            position: absolute;
            inset: 0;
            border-radius: inherit;
            content: "";
            z-index: -4000;
            box-shadow: 0 0 2em rgba(0, 0, 0, 0.2);
            backdrop-filter: blur(5px);
        }

        .login-form__title {
            margin-bottom: var(--size-6);
            font-weight: var(--font-weight-6);
            font-size: var(--font-size-5);
            text-align: center;
        }

        .login-form__label {
            margin-bottom: var(--size-4);
            display: grid;
        }

        .login-form__input {
            color: inherit;
            width: 100%;
            padding: 0.8em;
            border: 0;
            border-radius: var(--radius-2);
        }

        .login-form__footer {
            margin-top: var(--size-5);
            display: flex;
            gap: var(--size-2);
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
        }

        @media screen and (min-width: 36em) {
            .login-form__footer {
                flex-direction: row;
            }
        }

        .login-form__link {
            color: inherit;
            text-decoration: 0;
        }

        .login-form__link:hover {
            text-decoration: underline;
        }

        .primary-btn {
            color: white;
            background-color: #433532;
            padding: 0.9em 1.4em;
            border: 0;
            border-radius: var(--radius-2);
            cursor: pointer;
        }

        .primary-btn:hover {
            background-color: #c53b0d;
        }

        .sr-only {
            position: absolute;
            margin: -1px;
            width: 1px;
            height: 1px;
            padding: 0;
            border-width: 0;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            white-space: nowrap;
        }
    </style>


@endsection
