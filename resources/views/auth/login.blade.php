<x-guest-layout>
    <div class="h-auto flex items-center justify-center bg-gray-100 p-4">
        <div class="w-full max-w-md">
            <h2 class="text-2xl font-bold text-center text-indigo-600 ">Connexion à MaLaveriePro</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Adresse e-mail')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Mot de passe')" />
                    <x-text-input id="password" class="block mt-1 w-full"
                                  type="password"
                                  name="password"
                                  required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" />
                    <label for="remember_me" class="ml-2 text-sm text-gray-600">
                        {{ __('Se souvenir de moi') }}
                    </label>
                </div>

                <!-- Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center mt-6">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-indigo-600 hover:underline mb-2 sm:mb-0" href="{{ route('password.request') }}">
                            {{ __('Mot de passe oublié ?') }}
                        </a>
                    @endif

                    <x-primary-button class="w-full sm:w-auto">
                        {{ __('Connexion') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-6 text-center text-sm text-gray-600">
                Pas encore de compte ?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline font-medium">Inscrivez-vous</a>
            </div>
        </div>
    </div>
</x-guest-layout>
