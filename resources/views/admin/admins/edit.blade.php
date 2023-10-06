<x-admin.layouts.master>
    <x-slot name="pageTitle">
        {{ __('admin.admin') }}
    </x-slot>

    <x-slot name="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.admins.index') }}#">@lang('admin.admins')</a></li>
        <li class="breadcrumb-item active">@lang('admin.admin')</li>
    </x-slot>

    <div class="row">
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
{{--                        <img class="profile-user-img img-fluid img-circle"--}}
{{--                             src="{{ auth()->user()->image_url }}"--}}
{{--                             alt="User profile picture">--}}
                    </div>

                    <h3 class="profile-username text-center">{{ $admin->name }}</h3>

                    <p class="text-muted text-center">{{ $admin->email }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>phone</b> <a class="float-right">{{ $admin->phone }}</a>
                        </li>
                    </ul>

{{--                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>--}}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#edit-admin" data-toggle="tab">@lang('admin.edit')</a></li>
                        <li class="nav-item"><a class="nav-link" href="#permissions-tab" data-toggle="tab">@lang('admin.permissions')</a></li>
                        <li class="nav-item"><a class="nav-link" href="#password-tab" data-toggle="tab">@lang('admin.change') @lang('admin.password')</a></li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content">

                        <div class="active tab-pane" id="edit-admin">
                            <form action="{{ route('admin.admins.update', $admin) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                <x-form.input name="name" class="row" label-class="col-md-2 col-form-label" input-class="col-md-10"
                                              value="{{ $admin->name }}">{{ __('admin.name') }}</x-form.input>

                                <x-form.input type='email' name="email" class="row" label-class="col-md-2 col-form-label" input-class="col-md-10"
                                              value="{{ $admin->email }}">{{ __('admin.email') }}</x-form.input>

                                <x-form.input name="phone" class="row" label-class="col-md-2 col-form-label" input-class="col-md-10"
                                              value="{{ $admin->phone }}">{{ __('admin.phone_number') }}</x-form.input>

                                <x-form.file name="image" class="row" label-class="col-md-2 col-form-label" input-class="col-md-10"
                                             image="{{ $admin->image }}">{{ __('admin.upload') .' '. __('admin.image') }}</x-form.file>

                                <x-form.submit redirectRoute="{{ route('admin.admins.index') }}">{{ __('admin.edit') }}</x-form.submit>
                            </form>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="permissions-tab">
                            <!-- The timeline -->
                            <form action="{{ route('admin.admins.permissions.update', $admin) }}" method="post">
                                @csrf

                                <x-form.submit redirectRoute="{{ route('admin.admins.index') }}" class="d-flex justify-content-end"
                                               input-class="mx-2">{{ __('admin.edit') }}</x-form.submit>

                                <div class="row">
                                    @foreach($permissionGroups as $permissionGroup)
                                    <div class="col-sm-6 col-md-6 px-2 my-2">
                                        <div class="card shadow">
                                            <div class="card-header d-flex">
                                                <h3 class="card-title font-weight-bold mr-auto">{{ $permissionGroup->title }}</h3>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input select-all-switch" id="{{ $permissionGroup->name }}-switch"
                                                           {{ $permissionGroup->permissions->count() == $admin->permissions()->where('permission_group_id', $permissionGroup->id)->count() ? 'checked' : '' }}>
                                                    <label class="custom-control-label font-weight-normal" for="{{ $permissionGroup->name }}-switch">@lang('admin.select_all')</label>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <div class="form-group">
                                                    @foreach($permissionGroup->permissions as $permission)
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" name="permissions[]" value="{{ $permission->id }}" class="custom-control-input select-single-switch"
                                                                   id="{{ $permission->name }}" {{ $admin->hasPermissionTo($permission) ? 'checked' : '' }}>
                                                            <label class="custom-control-label font-weight-normal" for="{{ $permission->name }}">{{ $permission->title }}</label>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            </form>

                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="password-tab">
                            <form action="{{ route('admin.admins.password', $admin) }}" method="post">
                                @csrf

                                <x-form.input type="password" class="row" label-class="col-md-3 col-form-label" input-class="col-md-9"
                                              name="password">{{ __('admin.new_password') }}</x-form.input>

                                <x-form.input type="password" class="row" label-class="col-md-3 col-form-label" input-class="col-md-9"
                                              name="password_confirmation">{{ __('admin.confirm') .' '. __('admin.new_password') }}</x-form.input>


                                <x-form.submit redirectRoute="{{ route('admin.admins.index') }}">{{ __('admin.change') }}</x-form.submit>
                            </form>
                        </div>
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>

    <x-slot name="scripts">
        <script>
            $(document).ready(function() {
                $(".select-all-switch").click(function() {
                    var checkBoxes = $(this).parent().parent().parent().find(".select-single-switch");
                    checkBoxes.prop("checked", $(this).prop("checked"));
                });

                $(".select-single-switch").click(function() {
                    if ($(this).prop("checked")) {
                        allChecked = $(this).parent().parent().find('.select-single-switch:checked').length ==
                            $(this).parent().parent().find('.select-single-switch').length;

                        $(this).parent().parent().parent().parent().find('.select-all-switch').prop("checked", allChecked);
                    } else {
                        $(this).parent().parent().parent().parent().find('.select-all-switch').prop("checked", false);
                    }
                });
            });
        </script>
    </x-slot>
</x-admin.layouts.master>
