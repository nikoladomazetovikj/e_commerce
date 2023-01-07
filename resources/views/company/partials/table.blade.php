<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                NAME
            </th>
            <th scope="col" class="py-3 px-6">
                ADDRESS
            </th>
            <th scope="col" class="py-3 px-6">
                EMAIL
            </th>
            <th scope="col" class="py-3 px-6">
                NUMBER
            </th>
            <th scope="col" class="py-3 px-6">

            </th>
            <th scope="col" class="py-3 px-6">

            </th>
            <th scope="col" class="py-3 px-6">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($allCompanies as $company)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                       <a href="{{route('company.show', $company->id)}}"> {{{$company->company_name}}}    </a>
                   </th>

                <td class="py-4 px-6">
                    {{$company->company_address}}
                </td>
                <td class="py-4 px-6">
                   {{$company->company_email}}
                </td>
                <td class="py-4 px-6">
                    {{$company->company_phone}}
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('company.show', $company->id)}}">
                        <x-primary-button>{{ __('View') }}</x-primary-button>
                    </a>
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('company.edit', $company->id)}}">
                    <x-secondary-button>{{ __('Edit') }}</x-secondary-button>
                    </a>
                </td>
                <td class="py-4 px-6">
                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', '{{$company->id}}')">
                        {{ __('Delete') }}
                    </x-danger-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


<div class="p-12">
    @foreach($allCompanies as $company)
    <x-modal name="{{$company->id}}"  focusable >
        <div class="p-6">
            <form method="post" action="{{ route('company.destroy', $company->id) }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-sm font-medium text-gray-900 dark:text-gray-100">Are you sure your want to delete
                    this company?</h2>

                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    {{ __('Once you delete a company it will be archived in the database but you will not be
                    able to see the company data') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Delete Company') }}
                    </x-danger-button>
                </div>
            </form>
        </div>
    </x-modal>
    @endforeach
</div>
