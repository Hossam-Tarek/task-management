<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('admin.users') }}</x-slot>
    <x-slot name="cardHeader">{{ __('admin.users_table') }}</x-slot>

    <x-slot name="styles">
        @livewireStyles
        @powerGridStyles
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">{{ __('admin.users') }}</li>
    </x-slot>

    <livewire:users-table/>

    <x-slot name="scripts">
        @livewireScripts
        @powerGridScripts
    </x-slot>
</x-admin.layouts.card>
