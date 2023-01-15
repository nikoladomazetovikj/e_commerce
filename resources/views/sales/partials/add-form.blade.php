<section xmlns="http://www.w3.org/1999/html">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Add new Sale') }}
        </h2>
    </header>

    <form method="post" action="{{ route('sales.store') }}"  class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="seed_id" :value="__('Seed Code')" />
            <x-text-input id="seed_id" name="seed_id" type="text" class="mt-1 block w-full" :value="old
            ('seed_id')"
                          autofocus autocomplete="seed_id" />
            <x-input-error class="mt-2" :messages="$errors->get('seed_id')" />
        </div>

        <div>
            <x-input-label for="sale" :value="__('Sale')" />
            <x-text-input id="sale" name="sale" type="number" class="mt-1 block w-full" :value="old
            ('sale')"
                          autofocus autocomplete="sale" />
            <x-input-error class="mt-2" :messages="$errors->get('sale')" />
        </div>

        <div>
            <x-input-label for="start" :value="__('Start From')" />
            <x-text-input id="start" name="start" type="date" class="mt-1 block w-full" :value="old
            ('start')"
                          autofocus autocomplete="start" />
            <x-input-error class="mt-2" :messages="$errors->get('start')" />
        </div>


        <div>
            <x-input-label for="end" :value="__('End From')" />
            <x-text-input id="end" name="end" type="date" class="mt-1 block w-full" :value="old
            ('end')"
                          autofocus autocomplete="end" />
            <x-input-error class="mt-2" :messages="$errors->get('end')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
