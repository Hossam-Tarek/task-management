<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('admin.admins') }}</x-slot>
    <x-slot name="cardHeader">
        <a href="{{ route('admin.admins.create') }}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i><span class="mx-2"> {{ __('admin.add') .' '. __('admin.admin') }}</span></a>
    </x-slot>

    <x-slot name="styles">
        @livewireStyles
        @powerGridStyles
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">{{ __('admin.admins') }}</li>
    </x-slot>

    <livewire:admins-table/>

    <x-slot name="scripts">
        <script src="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js') }}"></script>

        @livewireScripts
        @powerGridScripts
    </x-slot>
</x-admin.layouts.card>
