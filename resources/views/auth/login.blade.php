<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>

    <div class="google text-center mt-4">  
        <p>or</p>
        <a href="{{ url('auth/google') }}" class="btn btn-danger flex items-center justify-center gap-2 px-4 py-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                <path fill="#4285F4" d="M24 9.5c3.27 0 6.15 1.18 8.42 3.13l6.36-6.36C34.7 2.15 29.7 0 24 0 14.73 0 6.85 5.8 2.8 14.3l7.76 6.02C12.54 12.7 17.73 9.5 24 9.5z"/>
                <path fill="#34A853" d="M46.1 24.56c0-1.58-.14-3.1-.4-4.56H24v9.2h12.36c-.86 4.54-3.4 8.36-7.16 10.92l7.76 6.02C42.46 40.88 46.1 33.54 46.1 24.56z"/>
                <path fill="#FBBC05" d="M10.56 28.44c-1.04-3.08-1.04-6.36 0-9.44L2.8 13.02C-.96 20.7-.96 28.3 2.8 35.98l7.76-6.02z"/>
                <path fill="#EA4335" d="M24 48c6.36 0 11.64-2.1 15.54-5.68l-7.76-6.02c-2.12 1.42-4.7 2.26-7.78 2.26-6.27 0-11.46-3.2-14.44-7.98l-7.76 6.02C6.85 42.2 14.73 48 24 48z"/>
            </svg>
            <span>Login with your Google Account</span>
        </a>
    </div>
    

</x-guest-layout>
