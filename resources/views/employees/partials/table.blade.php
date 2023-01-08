<div class="overflow-x-auto relative">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
            <th scope="col" class="py-3 px-6">
                NAME
            </th>
            <th scope="col" class="py-3 px-6">
                SURNAME
            </th>
            <th scope="col" class="py-3 px-6">
                EMAIL
            </th>
            <th scope="col" class="py-3 px-6">
                ROLE
            </th>
            <th scope="col" class="py-3 px-6">

            </th>
            <th scope="col" class="py-3 px-6">

            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($allEmployees as $employee)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td class="py-4 px-6">
                    {{$employee->name}}
                </td>
                <td class="py-4 px-6">
                    {{$employee->surname}}
                </td>
                <td class="py-4 px-6">
                    {{$employee->email}}
                </td>
                <td class="py-4 px-6">
                    {{$employee->role->name}}
                </td>
                <td class="py-4 px-6">
                    <a href="{{route('employees.show', $employee->id)}}">
                        <x-primary-button>{{ __('View') }}</x-primary-button>
                    </a>
                </td>
                <td class="py-4 px-6">
                    <x-danger-button
                        x-data=""
                        x-on:click.prevent="$dispatch('open-modal', '{{$employee->id}}')">
                        {{ __('Delete') }}
                    </x-danger-button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>

<div class="p-12">
    @foreach($allEmployees as $employee)
        <x-modal name="{{$employee->id}}"  focusable >
            <div class="p-6">
                <form method="post" action="{{ route('seeds.destroy', $employee->id) }}" class="p-6">
                    @csrf
                    @method('delete')

                    <h2 class="text-sm font-medium text-gray-900 dark:text-gray-100">Are you sure your want to delete
                        this employee?</h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Once you delete a employee it will be archived in the database but you can not
                        restore it') }}
                    </p>

                    <div class="mt-6 flex justify-end">
                        <x-secondary-button x-on:click="$dispatch('close')">
                            {{ __('Cancel') }}
                        </x-secondary-button>

                        <x-danger-button class="ml-3">
                            {{ __('Delete Employee') }}
                        </x-danger-button>
                    </div>
                </form>
            </div>
        </x-modal>
    @endforeach
</div>
