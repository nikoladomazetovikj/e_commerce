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
                    <form action="{{route('company.restore', $company->id)}}" method="post">
                        @csrf

                            <x-primary-button>{{ __('Restore') }}</x-primary-button>
                    </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>
</div>
