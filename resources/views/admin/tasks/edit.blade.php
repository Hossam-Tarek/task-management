<x-admin.layouts.card>
    <x-slot name="pageTitle">{{ __('Tasks') }}</x-slot>
    <x-slot name="cardHeader">{{ __('Edit Task') }}</x-slot>

    <form action="{{ route('admin.tasks.update', $task) }}" method="POST">
        @csrf
        @method('PUT')

        <x-form.input name="title" value="{{ $task->title }}" maxlength="255">{{ __('Title') }}</x-form.input>
        <x-form.textarea name="description" value="{{ $task->description }}">{{ __('Description') }}</x-form.textarea>

        <div class="form-group">
            <label for="assigned_by_id">{{ __('Assign by') }}</label>
            <select name="assigned_by_id" id="assigned_by_id" class="form-control @error("assigned_by_id") is-invalid @enderror">
                <option value="">{{ __('Select User') }}</option>
                @foreach($admins as $admin)
                    <option value="{{ $admin->id }}" {{ $admin->id == $task->assigned_by_id ? 'selected': '' }}>{{ $admin->name }} - {{ $admin->email }}</option>
                @endforeach
            </select>

            @error("assigned_by_id")
                <p class="help text-danger">{{ $errors->first("assigned_by_id") }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="assigned_to_id">{{ __('Assign to') }}</label>
            <select name="assigned_to_id" id="assigned_to_id" class="form-control @error("assigned_to_id") is-invalid @enderror">
                <option value="">{{ __('Select User') }}</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $task->assigned_to_id ? 'selected': '' }}>{{ $user->name }} - {{ $user->email }}</option>
                @endforeach
            </select>

            @error("assigned_to_id")
            <p class="help text-danger">{{ $errors->first("assigned_to_id") }}</p>
            @enderror
        </div>

        <x-form.submit redirectRoute="{{ route('admin.tasks.store') }}">{{ __('Create') }}</x-form.submit>
    </form>
</x-admin.layouts.card>
