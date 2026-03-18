@extends($activeTemplate . 'layouts.master')
@section('content')
    <div class="dashboard-inner">
        <div class="notice"></div>
        @if ($pendingWithdrawals)
            <div class="alert border border--primary" role="alert">
                <div class="alert__icon d-flex align-items-center text--primary"><i class="fas fa-spinner"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('Withdrawal Pending')</span><br>
                    <small><i>@lang('Total') {{ showAmount($pendingWithdrawals) }}
                            @lang('withdrawal request is pending. Please wait for admin approval. The amount will send to the account which you\'ve provided. See') <a href="{{ route('user.withdraw.history') }}" class="link-color">@lang('withdrawal history')</a></i></small>
                </p>
            </div>
        @endif

        @if ($pendingDeposits)
            <div class="alert border border--primary" role="alert">
                <div class="alert__icon d-flex align-items-center text--primary"><i class="fas fa-spinner"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('Deposit Pending')</span><br>
                    <small><i>@lang('Total') {{ showAmount($pendingDeposits) }}
                            @lang('deposit request is pending. Please wait for admin approval. See') <a href="{{ route('user.deposit.history') }}" class="link-color">@lang('deposit history')</a></i></small>
                </p>
            </div>
        @endif

        @if (!$user->ts)
            <div class="alert border border--warning" role="alert">
                <div class="alert__icon d-flex align-items-center text--warning"><i class="fas fa-user-lock"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('2FA Authentication')</span><br>
                    <small><i>@lang('To keep safe your account, Please enable') <a href="{{ route('user.twofactor') }}" class="link-color">@lang('2FA')</a> @lang('security').</i> @lang('It will make secure your account and balance.')</small>
                </p>
            </div>
        @endif

        @php
            $kyc = getContent('kyc.content', true);
        @endphp

        @if (auth()->user()->kv == Status::KYC_UNVERIFIED && auth()->user()->kyc_rejection_reason)
            <div class="alert border border--danger" role="alert">
                <div class="alert__icon d-flex align-items-center text--danger"><i class="fas fa-file-signature"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('KYC Documents Rejected')</span><br>
                    <small><i>{{ __(@$kyc->data_values->reject) }}
                            <a href="javascript::void(0)" class="link-color" data-bs-toggle="modal" data-bs-target="#kycRejectionReason">@lang('Click here')</a> @lang('to show the reason').

                            <a href="{{ route('user.kyc.form') }}" class="link-color">@lang('Click Here')</a> @lang('to Re-submit Documents'). <br>
                            <a href="{{ route('user.kyc.data') }}" class="link-color">@lang('See KYC Data')</a>
                        </i></small>
                </p>
            </div>
        @elseif ($user->kv == Status::KYC_UNVERIFIED)
            <div class="alert border border--info" role="alert">
                <div class="alert__icon d-flex align-items-center text--info"><i class="fas fa-file-signature"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('KYC Verification Required')</span><br>
                    <small><i>{{ __(@$kyc->data_values->required) }} <a href="{{ route('user.kyc.form') }}" class="link-color">@lang('Click here')</a> @lang('to submit KYC information').</i></small>
                </p>
            </div>
        @elseif($user->kv == Status::KYC_PENDING)
            <div class="alert border border--warning" role="alert">
                <div class="alert__icon d-flex align-items-center text--warning"><i class="fas fa-user-check"></i></div>
                <p class="alert__message">
                    <span class="fw-bold">@lang('KYC Verification Pending')</span><br>
                    <small><i>{{ __(@$kyc->data_values->pending) }} <a href="{{ route('user.kyc.data') }}" class="link-color">@lang('Click here')</a> @lang('to see your submitted information')</i></small>
                </p>
            </div>
        @endif

        <div class="row g-3 mt-4">
            <div class="col-lg-4">
                <div class="dashboard-widget">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-secondary">@lang('Successful Deposits')</h5>
                    </div>
                    <h3 class="text--secondary my-4">{{ showAmount($successfulDeposits) }}</h3>
                    <div class="widget-lists">
                        <div class="row">
                            <div class="col-4">
                                <p class="fw-bold">@lang('Submitted')</p>
                                <small>{{ showAmount($submittedDeposits) }}</small>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">@lang('Pending')</p>
                                <small>{{ showAmount($pendingDeposits) }}</small>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">@lang('Rejected')</p>
                                <small>{{ showAmount($rejectedDeposits) }}</small>
                            </div>
                        </div>
                        <hr>
                        <p><small><i>@lang('You\'ve requested to deposit') {{ showAmount($requestedDeposits) }}.
                                    @lang('Where') {{ showAmount($initiatedDeposits) }}
                                    @lang('is just initiated but not submitted.')</i></small></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="dashboard-widget">
                    <div class="d-flex justify-content-between">
                        <h5 class="text-secondary">@lang('Successful Withdrawals')</h5>
                    </div>
                    <h3 class="text--secondary my-4">{{ showAmount($successfulWithdrawals) }}
                    </h3>
                    <div class="widget-lists">
                        <div class="row">
                            <div class="col-4">
                                <p class="fw-bold">@lang('Submitted')</p>
                                <small>{{ showAmount($submittedWithdrawals) }}</small>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">@lang('Pending')</p>
                                <small>{{ showAmount($pendingWithdrawals) }}</small>
                            </div>
                            <div class="col-4">
                                <p class="fw-bold">@lang('Rejected')</p>
                                <small>{{ showAmount($rejectedWithdrawals) }}</small>
                            </div>
                        </div>
                        <hr>
                        <p><small><i>@lang('You\'ve requested to withdraw') {{ showAmount($requestedWithdrawals) }}.
                                    @lang('Where') {{ showAmount($initiatedWithdrawals) }}
                                    @lang('is just initiated but not submitted.')</i></small></p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- @if (auth()->user()->kv == Status::KYC_UNVERIFIED && auth()->user()->kyc_rejection_reason) --}}
    <div class="modal fade" id="kycRejectionReason">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">@lang('KYC Document Rejection Reason')</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ auth()->user()->kyc_rejection_reason }} Lorem ipsum, dolor sit amet consectetur adipisicing elit. Porro, ipsa?</p>
                </div>
            </div>
        </div>
    </div>
    {{-- @endif --}}
@endsection
