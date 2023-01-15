<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sales') }}
        </h2>
        @include("sales.partials.links")
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                @if (session()->has('status'))
                    <div class="p-3 text-green-700 bg-green-300 dark:text-green-700 dark:text-green-400
                        dark:bg-gray-600 rounded">
                        {{ session()->get('status') }}
                    </div>
                @endif
            </div>
            @include('sales.partials.table')
        </div>
    </div>
    </div>
</x-app-layout>
