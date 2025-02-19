<x-guest-layout>
    <div class="text-center">
        <h2 class="text-2xl font-bold bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent mb-8">
            Registrarse
        </h2>
    </div>
    <div class="flex items-center justify-center gap-4 mb-8"> 
        {{-- <x-application-logo class="h-9 w-auto fill-current text-gray-800 dark:text-gray-200" /> --}}
        
        <h1 class="text-6xl md:text-8xl font-bold  bg-gradient-to-r from-[#FF2D20] to-purple-600 bg-clip-text text-transparent min-h-[110px] ">
            blogg
        </h1>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nombre')" />
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
            <x-input-label for="password" :value="__('Contraseña')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Ya te registraste? iniciá sesión') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Registrarme') }}
            </x-primary-button>
        </div>
    </form>
    
</x-guest-layout>
<footer class="w-full mt-16 py-4 text-center text-sm bg-gradient-to-r from-[#FF2D20] to-purple-600 text-white px-8 text-lg font-semibold">
    <h3 class="mb-4">© 2025 blogg</h3>
    <h3>Developed by: <a href="https://micaela-bahurlet.vercel.app/" target="_blank" class="hover:underline">Micaela Bahurlet</a></h3>
</footer>

