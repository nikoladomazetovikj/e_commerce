<section xmlns="http://www.w3.org/1999/html">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Company Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Edit Company Details") }}
        </p>
    </header>

    @foreach($company as $c)
    <form method="post" action="{{ route('company.update', $c->id) }}" class="mt-6 space-y-6">
        @csrf
        @method('put')
        <div>
            <x-input-label for="company_name" :value="__('Name')" />
            <x-text-input id="company_name" name="company_name" type="text" class="mt-1 block w-full" :value="old
            ('company_name',$c->company_name)"
                          autofocus autocomplete="company_name" />
            <x-input-error class="mt-2" :messages="$errors->get('company_name')" />
        </div>

        <div>
            <x-input-label for="company_address" :value="__('Address')" />
            <x-text-input id="company_address" name="company_address" type="text" class="mt-1 block w-full"
                          :value="old('company_address',$c->company_address)"
                          autofocus autocomplete="company_address" />
            <x-input-error class="mt-2" :messages="$errors->get('company_address')" />
        </div>

        <div>
            <x-input-label for="company_phone" :value="__('Phone')" />
            <x-text-input id="company_phone" name="company_phone" type="text" class="mt-1 block w-full" :value="old
            ('company_phone',$c->company_phone)"
                          autofocus autocomplete="company_phone" />
            <x-input-error class="mt-2" :messages="$errors->get('company_phone')" />
        </div>

        <div>
            <x-input-label for="company_email" :value="__('Email')" />
            <x-text-input id="company_email" name="company_email" type="email" class="mt-1 block w-full" :value="old
            ('company_email',$c->company_email)"
                          autofocus autocomplete="company_email" />
            <x-input-error class="mt-2" :messages="$errors->get('company_email')" />
        </div>

        <header>
            <h6 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Additional Details') }}
            </h6>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                {{ __("These are optional") }}
            </p>
        </header>


        <div>
            <x-input-label for="additional_details" :value="__('Additional details')" />
            <textarea  id="additional_details" name="additional_details"  class="mt-1 block w-full"
                       autofocus autocomplete="description" /> {{$c->additional_details}} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('additional_details')" />
        </div>

        <div>
            <x-input-label for="company_website" :value="__('Website')" />
            <x-text-input id="company_website" name="company_website" type="text" class="mt-1 block w-full"
                          :value="old('company_website',$c->company_website)"
                          autofocus autocomplete="company_website" />
            <x-input-error class="mt-2" :messages="$errors->get('company_website')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Edit') }}</x-primary-button>
        </div>
    </form>
    @endforeach
</section>
