<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Agreement Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @foreach($query as $c)
                    <h3 class="dark:text-indigo-300">{{$c->company_name}}</h3>

                    <hr>

                    <h6 class="dark:text-indigo-300 mt-6">Order Details:</h6>
                    <hr>
                    <p class="dark:text-white"><b>Seed:</b> {{$c->seed_name}}</p>
                    <p class="dark:text-white"><b>Category:</b> {{$c->category_name}}</p>
                    <p class="dark:text-white"><b>Quantity:</b> {{$c->quantity}}</p>
                    <p class="dark:text-white"><b>Total:</b> {{$c->total_price}}</p>
                    <p class="dark:text-white"><b>Date:</b> {{$c->agreement_date}}</p>

                    <hr>

                    <h6 class="dark:text-indigo-300 mt-6">Agreement:</h6>
                    <diV class="p-6 text-gray-900 dark:text-gray-100">
                        {!! $c->agreement !!}
                    </diV>
                @endforeach
            </div>

</x-app-layout>
