<section xmlns="http://www.w3.org/1999/html">
    <header>

    </header>

    <form method="post" action="{{ route('employees.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old
            ('name')"
                          autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="surname" :value="__('Surname')" />
            <x-text-input id="surname" name="surname" type="text" class="mt-1 block w-full" :value="old
            ('surname')"
                          autofocus autocomplete="surname" />
            <x-input-error class="mt-2" :messages="$errors->get('surname')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old
            ('email')"
                           />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" name="password" type="password" class="mt-1 block w-full" :value="old
            ('password')"/>
            <x-input-error class="mt-2" :messages="$errors->get('password')" />
        </div>

        <div>
            <label for="roles" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
                role</label>
            <select name="role_id" id="role_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm
            rounded-lg
       focus:ring-blue-500
       focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach($roles as $role)
                    <option value="{{$role->id}}" >{{$role->name}}</option>
                @endforeach
                <x-input-error class="mt-2" :messages="$errors->get('role_id')" />
            </select>
        </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
