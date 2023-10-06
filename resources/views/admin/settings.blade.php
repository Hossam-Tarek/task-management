<x-admin.layouts.card>

    <x-slot name="pageTitle">{{ __('admin.settings') }}</x-slot>

    <x-slot name="cardHeader">{{ __('admin.edit') }} {{ __('admin.settings') }}</x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item active">{{ __('admin.settings') }}</li>
    </x-slot>

    <form action="{{ route('admin.settings.update') }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')

        @foreach($settings as $setting)
            @if($setting->type == 'file')
                <x-form.file name="{{ $setting->slug }}">{{ $setting->name }}</x-form.file>
                @continue
            @elseif($setting->type == 'image')
                <x-form.file name="{{ $setting->slug }}" :image="$setting->value">{{ $setting->name }}</x-form.file>
                @continue
            @elseif($setting->type == 'textarea')
                <x-form.textarea type="{{ $setting->type }}" name="{{ $setting->slug }}" rows="3" maxlength="255" :value="$setting->value">{{ $setting->name }}</x-form.textarea>
                @continue
            @endif

            <x-form.input type="{{ $setting->type }}" name="{{ $setting->slug }}" :value="$setting->value">{{ $setting->name }}</x-form.input>
        @endforeach

        <x-form.submit redirectRoute="{{ route('admin.home') }}">{{ __('admin.edit') }}</x-form.submit>
    </form>

</x-admin.layouts.card>
