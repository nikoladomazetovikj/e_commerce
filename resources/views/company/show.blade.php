<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Company Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
              @foreach($company as $c)
                    <h3 class="dark:text-indigo-300">{{$c->company_name}}</h3>

                  <hr>

                    <h6 class="dark:text-indigo-300 mt-6">Company Details:</h6>

                    <p class="dark:text-white"><b>Address:</b> {{$c->company_address}}</p>
                    <p class="dark:text-white"><b>Phone:</b> {{$c->company_phone}}</p>
                    <p class="dark:text-white"><b>Email:</b> {{$c->company_email}}</p>
                @if($c->company_website !== null)
                    <p class="dark:text-white"><b>Website:</b> {{$c->company_website}}</p>
                    @endif

                @if($c->additional_details !== null)
                    <hr>

                    <h6 class="dark:text-indigo-300 mt-6">Additional Details:</h6>
                    @endif
                @endforeach
            </div>


</x-app-layout>
