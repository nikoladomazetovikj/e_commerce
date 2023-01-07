<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                ORDER N.
            </th>
            <th scope="col" class="py-3 px-6">
                PRICE PAYED
            </th>
            <th scope="col" class="py-3 px-6">
                DATE
            </th>
            <th scope="col" class="py-3 px-6">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($query as $q)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$q->id}}
                </th>

                <td class="py-4 px-6">
                    {{$q->total_price}}
                </td>
                <td class="py-4 px-6">
                    {{$q->date}}
                </td>
                <td class="py-4 px-6">
                    {{$q->id}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
        {{ $query->links() }}
    </div>
</div>

