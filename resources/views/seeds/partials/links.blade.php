<hr>
<br>
<diV class="mt-5">
    <x-nav-link :href="route('seeds.create')" :active="request()->routeIs('seeds.create')">
        {{ __('Add Seed') }}
    </x-nav-link>
    <span class="dark:text-indigo-300">/</span>
    <x-nav-link :href="route('seeds.trashed')" :active="request()->routeIs('seeds.trashed')">
        {{ __('Archived Seeds') }}
    </x-nav-link>
</diV>
