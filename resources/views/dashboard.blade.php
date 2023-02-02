<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        @include('layouts.dashboardLinks')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                   @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::ADMIN->value)
                       @include('dashboard.admin')
                    @endif

                       @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::MANAGER->value)
                           @include('dashboard.manager')
                       @endif

                       @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::CUSTOMER->value)
                           @include('reports.partials.invoices')
                       @endif

            </div>
        </div>
    </div>




    @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::ADMIN->value)
        {!! $chart1->renderChartJsLibrary() !!}
        {!! $chart1->renderJs() !!}
        {!! $chart2->renderJs() !!}
        {!! $chart3->renderJs() !!}
    @endif
</x-app-layout>
