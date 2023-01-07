<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's details.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    @if($flag)
        <form method="post" action="{{ route('profile.updateDetails') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

          @foreach($data as $d)
                <div>
                    <x-input-label for="country" :value="__('Country')" />
                    <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country',
                $d->country)" required autofocus autocomplete="country" />
                    <x-input-error class="mt-2" :messages="$errors->get('country')" />
                </div>
                <div>
                    <x-input-label for="city" :value="__('City')" />
                    <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city',
                $d->city)" required autofocus autocomplete="city" />
                    <x-input-error class="mt-2" :messages="$errors->get('city')" />
                </div>
                <div>
                    <x-input-label for="zip_code" :value="__('ZIP')" />
                    <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old
                    ('zip_code',
                $d->zip_code)" required autofocus autocomplete="zip_code" />
                    <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
                </div>
                <div>
                    <x-input-label for="street" :value="__('Street')" />
                    <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old
                    ('street',
                $d->street)" required autofocus autocomplete="street" />
                    <x-input-error class="mt-2" :messages="$errors->get('street')" />
                </div>
                <div>
                    <x-input-label for="phone_number" :value="__('Phone')" />
                    <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old
                    ('phone_number',
                $d->phone_number)" required autofocus autocomplete="phone_number" />
                    <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
                </div>
            @endforeach

            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Update') }}</x-primary-button>

                @if (session('status') === 'profile-details-updated')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>

    @else
        <form method="post" action="{{ route('profile.storeDetails') }}" class="mt-6 space-y-6">
            @csrf
            <div>
                <x-input-label for="country" :value="__('Country')" />
                <x-text-input id="country" name="country" type="text" class="mt-1 block w-full" :value="old('country')" required autofocus autocomplete="country" />
                <x-input-error class="mt-2" :messages="$errors->get('country')" />
            </div>
            <div>
                <x-input-label for="city" :value="__('City')" />
                <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city')" required autofocus autocomplete="city" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>
            <div>
                <x-input-label for="zip_code" :value="__('ZIP')" />
                <x-text-input id="zip_code" name="zip_code" type="text" class="mt-1 block w-full" :value="old
                    ('zip_code')" required autofocus autocomplete="zip_code" />
                <x-input-error class="mt-2" :messages="$errors->get('zip_code')" />
            </div>
            <div>
                <x-input-label for="street" :value="__('Street')" />
                <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old
                    ('street')" required autofocus autocomplete="street" />
                <x-input-error class="mt-2" :messages="$errors->get('street')" />
            </div>
            <div>
                <x-input-label for="phone_number" :value="__('Phone')" />
                <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old
                    ('phone_number')" required autofocus autocomplete="phone_number" />
                <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
            </div>
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Save') }}</x-primary-button>

                @if (session('status') === 'profile-details-inserted')
                    <p
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        x-init="setTimeout(() => show = false, 2000)"
                        class="text-sm text-gray-600 dark:text-gray-400"
                    >{{ __('Saved.') }}</p>
                @endif
            </div>
        </form>
    @endif

</section>
