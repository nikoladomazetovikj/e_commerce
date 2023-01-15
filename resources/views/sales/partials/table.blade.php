<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">

            </th>
            <th scope="col" class="py-3 px-6">
                NAME
            </th>
            <th scope="col" class="py-3 px-6">
                PRICE (with sale)
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($allSeeds as $seed)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <img src="{{asset('images/' . $seed->seed->image)}}" width="150"  height="150">
                </th>

                <td class="py-4 px-6">
                    {{$seed->seed->name}}
                </td>
                <td class="py-4 px-6">
                    {{$seed->sale}}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


