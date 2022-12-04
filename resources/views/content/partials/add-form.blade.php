<section xmlns="http://www.w3.org/1999/html">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Site Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Please provide site details content") }}
        </p>
    </header>

    <form method="post" action="{{ route('site.content.store') }}" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="description" :value="__('Description')" />
            <textarea  id="description" name="description"  class="mt-1 block w-full"
                      autofocus autocomplete="description" /> {{value(old('description'))}} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Address')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address')"
                           autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full" :value="old('phone_number')"
                           autofocus autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <header>
            <h6 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Social media links') }}
            </h6>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("These are optional") }}
            </p>
        </header>
        <div>
            <x-input-label for="facebook" :value="__('Facebook')" />
            <x-text-input id="facebook" name="facebook" type="text" class="mt-1 block w-full" :value="old
            ('facebook')"
                           autofocus autocomplete="facebook" />
            <x-input-error class="mt-2" :messages="$errors->get('facebook')" />
        </div>
        <div>
            <x-input-label for="instagram" :value="__('Instagram')" />
            <x-text-input id="instagram" name="instagram" type="text" class="mt-1 block w-full" :value="old
            ('instagram')"
                           autofocus autocomplete="instagram" />
            <x-input-error class="mt-2" :messages="$errors->get('instagram')" />
        </div>

        <div>
            <x-input-label for="twitter" :value="__('Twitter')" />
            <x-text-input id="twitter" name="facebook" type="text" class="mt-1 block w-full" :value="old
            ('twitter')"
                           autofocus autocomplete="twitter" />
            <x-input-error class="mt-2" :messages="$errors->get('twitter')" />
        </div>

        <div>
            <x-input-label for="youtube" :value="__('YouTube')" />
            <x-text-input id="youtube" name="youtube" type="text" class="mt-1 block w-full" :value="old
            ('youtube')"
                           autofocus autocomplete="youtube" />
            <x-input-error class="mt-2" :messages="$errors->get('youtube')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
