<hr>
<br>
<diV class="mt-5">
    <x-nav-link :href="route('company.create')" :active="request()->routeIs('company.create')">
        {{ __('Create') }}
    </x-nav-link>
    <span class="dark:text-indigo-300">/</span>
    <x-nav-link :href="route('company.trashed')" :active="request()->routeIs('company.trashed')">
        {{ __('Archived Companies') }}
    </x-nav-link>
</diV>
