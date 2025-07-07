<x-guest-layout>
    <div >
        <div >
            <h2 class="text-3xl font-bold text-center text-indigo-600 mb-8">Créer un compte MaLaveriePro</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf




                    <div class="space-y-4">
                        <!-- Nom de la laverie -->
                        <div class="mt-6">
                            <x-input-label for="laverie_nom" :value="__('Nom de la laverie')" />
                            <x-text-input id="laverie_nom" class="block mt-1 w-full h-12 text-lg" type="text" name="laverie_nom" :value="old('laverie_nom')" required />
                            <x-input-error :messages="$errors->get('laverie_nom')" class="mt-2" />
                        </div>

                        <!-- Adresse de la laverie -->
                        <div class="mt-6">
                            <x-input-label for="laverie_adresse" :value="__('Adresse de la laverie')" />
                            <x-text-input id="laverie_adresse" class="block mt-1 w-full h-12 text-lg" type="text" name="laverie_adresse" :value="old('laverie_adresse')" required />
                            <x-input-error :messages="$errors->get('laverie_adresse')" class="mt-2" />
                        </div>

                        <!-- Téléphone de la laverie -->
                        <div class="mt-6">
                            <x-input-label for="laverie_telephone" :value="__('Téléphone de la laverie')" />
                            <x-text-input id="laverie_telephone" class="block mt-1 w-full h-12 text-lg" type="text" name="laverie_telephone" :value="old('laverie_telephone')" required />
                            <x-input-error :messages="$errors->get('laverie_telephone')" class="mt-2" />
                        </div>



                        <!-- Nom complet -->
                        <div class="mt-6">
                            <x-input-label for="name" :value="__('Nom complet')" />
                            <x-text-input id="name" class="block mt-1 w-full h-12 text-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email -->
                        <div class="mt-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full h-12 text-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Mot de passe -->
                        <div class="mt-6">
                            <x-input-label for="password" :value="__('Mot de passe')" />
                            <x-text-input id="password" class="block mt-1 w-full h-12 text-lg" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                   

                <!-- Confirmation du mot de passe (pleine largeur) -->
                <div class="mt-6">
                    <x-input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" />
                    <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Bouton et lien -->
                <div class="flex items-center justify-between mt-8">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Déjà inscrit ?') }}
                    </a>

                    <x-primary-button class="ml-4">
                        {{ __('Créer le compte') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
