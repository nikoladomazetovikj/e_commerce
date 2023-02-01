<hr>
<br>
<div class="mt-2">
    @if(\Illuminate\Support\Facades\Auth::user()->role_id == \App\Enums\Role::ADMIN->value)
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li>
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <x-nav-link :href="route('reports.adminUser')" :active="request()->routeIs('reports.adminUser')">
                            {{ __('Customer Payments Report') }}
                        </x-nav-link>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        <x-nav-link :href="route('reports.adminCompany')" :active="request()->routeIs('reports.adminCompany')">
                            {{ __('Companies Payments Report') }}
                        </x-nav-link>
                    </div>
                </li>
            </ol>
        </nav>

    @endif

</div>
