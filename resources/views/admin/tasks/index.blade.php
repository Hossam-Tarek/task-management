<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('Tasks') }}</x-slot>
    <x-slot name="cardHeader">
        <a href="{{ route('admin.tasks.create') }}" class="btn btn-secondary float-right"><i class="fas fa-plus"></i><span class="mx-2"> {{ __('Add Task') }}</span></a>
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">{{ __('Tasks') }}</li>
    </x-slot>

</x-admin.layouts.card>
