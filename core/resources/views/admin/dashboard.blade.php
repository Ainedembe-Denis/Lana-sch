@extends('admin.layouts.app')

@section('panel')
    <div class="row gy-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center py-5">
                    <h3 class="mb-3">@lang('Welcome to Admin Dashboard')</h3>
                    <p class="text-muted mb-4">@lang('Manage your website content and settings from here.')</p>
                    <div class="row g-3 justify-content-center">
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('admin.frontend.index') }}" class="btn btn-outline--primary btn-lg w-100">
                                <i class="la la-html5"></i> @lang('Manage Frontend')
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('admin.frontend.manage.pages') }}" class="btn btn-outline--success btn-lg w-100">
                                <i class="las la-list"></i> @lang('Manage Pages')
                            </a>
                        </div>
                        <div class="col-md-4 col-sm-6">
                            <a href="{{ route('admin.setting.system') }}" class="btn btn-outline--info btn-lg w-100">
                                <i class="las la-cog"></i> @lang('System Settings')
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('admin.partials.cron_modal')
@endsection

@push('breadcrumb-plugins')
    <button class="btn btn-outline--primary btn-sm" data-bs-toggle="modal" data-bs-target="#cronModal">
        <i class="las la-server"></i>@lang('Cron Setup')
    </button>
@endpush
