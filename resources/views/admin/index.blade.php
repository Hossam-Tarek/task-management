<x-admin.layouts.master>
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $usersCount }}</h3>

                    <p>{{ __('Users') }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user"></i>
{{--                    <i class="fas fa-tasks"></i>--}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</x-admin.layouts.master>
