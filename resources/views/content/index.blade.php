<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Site Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                    @if (session()->has('status'))
                        <div class="p-3 text-green-700 bg-green-300 dark:text-green-700 dark:text-green-400
                        dark:bg-gray-600 rounded">
                            {{ session()->get('status') }}
                        </div>
                    @endif
                </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                  @if($siteData == 0)
                        {{ __("Please provide content for this site") }}
                    @endif

                    <h5>About Us</h5>
                      <hr>

                    @foreach($siteDetails as $sd)
                        <p>
                            {!! $sd->description !!}
                        </p>

                        <hr>
                        <h6>Site Data</h6>
                        <hr>
                       <div class="mt-4">
                           <p><b>Address:</b> {{$sd->address}}</p>
                           <p><b>Phone:</b> {{$sd->phone_number}}</p>
                           <p><b>Facebook:</b> {{$sd->facebook}}</p>
                           <p><b>Twitter:</b> {{$sd->twitter}}</p>
                           <p><b>Instagram:</b> {{$sd->instagram}}</p>
                           <p><b>YouTube:</b> {{$sd->youtube}}</p>
                       </div>

                      @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
