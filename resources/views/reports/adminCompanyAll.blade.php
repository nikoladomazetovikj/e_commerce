<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Customer payments') }}
        </h2>
        @include('layouts.dashboardLinks')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="my-5">
                <a href="{{route('csv.adminCompanies')}}">
                    <x-secondary-button>
                        {{ __('Download CSV') }}
                    </x-secondary-button>
                </a>
            </div>
            <div>
                @include('reports.partials.adminCompaniesTable')
            </div>
        </div>
    </div>
</x-app-layout>
