<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add User') }}
        </h2>
        @include("company.partials.links")
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <section xmlns="http://www.w3.org/1999/html">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ __('Company User') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            {{ __("Please provide Company User Details") }}
                        </p>
                    </header>
                    <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                        @if (session()->has('status'))
                            <div class="p-3 text-red-700 bg-green-300 dark:text-red-400
                        dark:bg-gray-600 rounded">
                                {{ session()->get('status') }}
                            </div>
                        @endif
                    </div>

                    <form method="post" action="{{ route('company.user.create') }}" class="mt-6 space-y-6">
                        @csrf

                        <div>
                            <x-input-label for="company_email" :value="__('Email')" />
                            <x-text-input id="company_email" name="company_email" type="email" class="mt-1 block w-full" :value="old
            ('company_email')"
                                          autofocus autocomplete="company_email" />
                            <x-input-error class="mt-2" :messages="$errors->get('company_email')" />
                        </div>

                        <header>
                            <h6 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('User Details') }}
                            </h6>

                        </header>
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name')"  autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div>
                            <x-input-label for="surname" :value="__('Surname')" />
                            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old
                            ('surname')"  autofocus autocomplete="surname" />
                            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
                        </div>

                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" name="password" type="text" class="mt-1 block w-full"
                                          :value="old
                            ('password')"  autofocus autocomplete="password" />
                            <x-input-error class="mt-2" :messages="$errors->get('password')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </section>

            </div>

</x-app-layout>
