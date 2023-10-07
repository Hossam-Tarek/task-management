<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('Tasks') }}</x-slot>
    <x-slot name="cardHeader">{{ __('Edit Task') }}</x-slot>

    <form action="{{ route('admin.tasks.update') }}" method="POST">
        @csrf
        @method('PUT')

        <x-form.input name="title" value="{{ $task->title }}" maxlength="255">{{ __('Title') }}</x-form.input>
        <x-form.textarea name="description" value="{{ $task->description }}">{{ __('Description') }}</x-form.textarea>

        <x-form.submit redirectRoute="{{ route('admin.tasks.store') }}">{{ __('Create') }}</x-form.submit>
    </form>
</x-admin.layouts.card>
