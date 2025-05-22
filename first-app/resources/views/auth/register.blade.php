<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        {{-- passeed --}}
        @if(Session::has('success')) 
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{Session::get('success')}}</span> 
          </div>
        @endif
        {{-- Failed --}}
        @if(Session::has('success')) 
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <span class="font-medium">{{Session::get('success')}}</span> 
          </div>
        @endif
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                 />
            {{-- <x-input-error :messages="$errors->get('name')" class="mt-2" /> --}}
            @if ($errors->has('name'))
                <div class="text-red-600/100">
                {{ $errors->first('name') }}
               </div>
            @endif
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                 />
            {{-- <x-input-error :messages="$errors->get('email')" class="mt-2" /> --}}
            @if ($errors->has('email'))
                <div class="text-red-600/100">
                {{ $errors->first('email') }}
               </div>
            @endif
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" />

            {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
            @if ($errors->has('password'))
                <div class="text-red-600/100">
                {{ $errors->first('password') }}
               </div>
            @endif 
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" />

            {{-- <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" /> --}}
            @if ($errors->has('password_confirmation'))
                <div class="text-red-600/100">
                {{ $errors->first('password_confirmation') }}
               </div>
            @endif 
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4" type="submit">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
