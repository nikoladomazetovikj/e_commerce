<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                SEED NAME
            </th>
            <th scope="col" class="py-3 px-6">
                CATEGORY
            </th>
            <th scope="col" class="py-3 px-6">
                QUANTITY
            </th>
            <th scope="col" class="py-3 px-6">
                SUBTOTAL
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($query as $q)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$q->seed_name}}
                </th>

                <td class="py-4 px-6">
                    {{$q->category_name}}
                </td>
                <td class="py-4 px-6">
                    {{$q->quantity}}
                </td>
                <td class="py-4 px-6">
                    {{$q->subtotal}} $
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">TOTAL:</h5>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$total}} $</p>

    </div>


</div>

