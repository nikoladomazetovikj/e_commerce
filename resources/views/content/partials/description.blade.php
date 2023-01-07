<section xmlns="http://www.w3.org/1999/html">

<div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
    @foreach($seed as $s)
        <form method="post" action="{{ route('contentSeeds.description', $s->id) }}" class="mt-6 space-y-6">
            @csrf
            @method('put')
            <h1 class="dark:text-indigo-300">{{$s->name}}</h1>
            <hr>
            <h6 class="dark:text-indigo-300 mt-6">Description:</h6>
            <div class="p-6 text-gray-900">
                <x-input-label for="description" :value="__('Description')" />
                <textarea  id="description" name="description"  class="mt-1 block w-full"
                           autofocus autocomplete="description" /> {{$s->description}} </textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            @endforeach
            <div class="flex items-center gap-4">
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
            </div>
        </form>
</div>
</section>
