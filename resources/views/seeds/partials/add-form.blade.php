<section xmlns="http://www.w3.org/1999/html">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Seed Details') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Please provide Seed Details") }}
        </p>
    </header>

    <form method="post" action="{{ route('seeds.store') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old
            ('name')"
                          autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="description" :value="__('Details')" />
            <textarea  id="description" name="description"  class="mt-1 block w-full"
                       autofocus autocomplete="description" /> {{value(old('description'))}} </textarea>
            <x-input-error class="mt-2" :messages="$errors->get('description')" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <x-text-input id="image" name="image" type="file" class="mt-1 block w-full" :value="old
            ('image')"
                          autofocus autocomplete="image" />
            <x-input-error class="mt-2" :messages="$errors->get('image')" />
        </div>

        <div>
            <x-input-label for="price" :value="__('Price')" />
            <x-text-input id="price" name="price" type="number" class="mt-1 block w-full" :value="old
            ('price')"
                          autofocus autocomplete="price" />
            <x-input-error class="mt-2" :messages="$errors->get('price')" />
        </div>

        <div>
            <x-input-label for="quantity" :value="__('Quantity')" />
            <x-text-input id="quantity" name="quantity" type="number" class="mt-1 block w-full" :value="old
            ('quantity')"
                          autofocus autocomplete="quantity" />
            <x-input-error class="mt-2" :messages="$errors->get('quantity')" />
        </div>

       <div>
       <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a
           category</label>
       <select name="category_id" id="categories" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
       focus:ring-blue-500
       focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
           <option selected>Choose a category</option>
           @foreach($categories as $category)
               <option value="{{$category->id}}" >{{$category->name}}</option>
           @endforeach
           <x-input-error class="mt-2" :messages="$errors->get('category_id')" />
       </select>
       </div>


        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>
    </form>
</section>
