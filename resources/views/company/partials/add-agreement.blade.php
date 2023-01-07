<section xmlns="http://www.w3.org/1999/html">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Company Order Agreement') }}
        </h2>
    </header>

    <form method="post" action="{{ route('companyPayment.store') }}" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="seed_id" :value="__('Seed N.')" />
            <x-text-input id="seed_id" name="seed_id" type="text" class="mt-1 block w-full" :value="old('seed_id')"
                          autofocus autocomplete="seed_id" />
            <x-input-error class="mt-2" :messages="$errors->get('seed_id')" />
        </div>

        <div>
            <x-input-label for="company_email" :value="__('Email')" />
            <x-text-input id="company_email" name="company_email" type="email" class="mt-1 block w-full" :value="old
            ('company_email')"
                          autofocus autocomplete="company_email" />
            <x-input-error class="mt-2" :messages="$errors->get('company_email')" />
        </div>

        <header>
            <h6 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                {{ __('Agreement Details') }}
            </h6>
        </header>


        <div>
            <x-input-label for="agreement" :value="__('Agreement')" />
            <textarea  id="agreement" name="agreement"  class="mt-1 block w-full"
                       autofocus autocomplete="description" /> {{value(old('agreement'))}} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('agreement')" />
        </div>

        <div>
            <x-input-label for="agreement_date" :value="__('Agreement Date')" />
            <x-text-input id="agreement_date" name="agreement_date" type="date" class="mt-1 block w-full" :value="old
            ('agreement_date')"
                          autofocus autocomplete="agreement_date" />
            <x-input-error class="mt-2" :messages="$errors->get('agreement_date')" />
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" name="quantity" type="text" class="mt-1 block w-full" :value="old('quantity')"
                          autofocus autocomplete="quantity" />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

        <div>
            <x-input-label for="total_price" :value="__('Total Price')" />
            <x-text-input id="total_price" name="total_price" type="text" class="mt-1 block w-full" :value="old
            ('total_price')"
                          autofocus autocomplete="total_price" />
            <x-input-error class="mt-2" :messages="$errors->get('total_price')" />
        </div>
        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
