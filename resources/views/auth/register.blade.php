<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <img src="/images/logo.png" alt="">
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Имя')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <div class="mt-4">
                <x-label for="surname" :value="__('Фамилия')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required />
            </div>

            <div class="mt-4">
                <x-label for="second_name" :value="__('Отчество')" />

                <x-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" :value="old('second_name')" required />
            </div>

            <div class="mt-4">
                <x-label for="number" :value="__('Номер телефона')" />

                <x-input id="number" class="block mt-1 w-full" type="text" name="number" :value="old('number')" required />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Почта')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Пароль')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Подтвердите пароль')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-center mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Уже зарегистрированы?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Зарегистрироваться') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
