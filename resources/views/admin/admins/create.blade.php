<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('admin.admins') }}</x-slot>
    <x-slot name="cardHeader">{{ __('admin.add') .' '. __('admin.admin') }}</x-slot>

    <form action="{{ route('admin.admins.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-form.input name="name" value="{{ old('name') }}">{{ __('admin.name') }}</x-form.input>
        <x-form.input type='email' name="email" value="{{ old('email') }}">{{ __('admin.email') }}</x-form.input>
        <x-form.input name="phone" value="{{ old('phone') }}">{{ __('admin.phone_number') }}</x-form.input>

        <x-form.input type="password" name="password">{{ __('admin.password') }}</x-form.input>
        <x-form.input type="password" name="password_confirmation">{{ __('admin.confirm') .' '. __('admin.password') }}</x-form.input>

        <x-form.file name="image">{{ __('admin.upload') .' '. __('admin.image') }}</x-form.file>

        <x-form.submit redirectRoute="{{ route('admin.admins.index') }}">{{ __('admin.add') }}</x-form.submit>
    </form>
</x-admin.layouts.card>
