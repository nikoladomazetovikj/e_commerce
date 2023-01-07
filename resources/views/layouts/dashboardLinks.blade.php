<hr>
<br>
<div class="mt-5">
    @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::ADMIN->value)
        <x-nav-link :href="route('reports.adminUser')" :active="request()->routeIs('reports.adminUser')">
            {{ __('Customer Payments Report') }}
        </x-nav-link>
        <span class="dark:text-indigo-300">/</span>
        <x-nav-link :href="route('reports.adminCompany')" :active="request()->routeIs('reports.adminCompany')">
            {{ __('Companies Payments Report') }}
        </x-nav-link>
    @endif

        @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::CUSTOMER->value)
            <x-nav-link :href="route('reports.invoices')" :active="request()->routeIs('reports.invoices')">
                {{ __('My Orders') }}
            </x-nav-link>

        @endif
</div>
