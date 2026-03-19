@php
    $loginContent = getContent('login.content', true);
@endphp
@extends($activeTemplate . 'layouts.frontend')
@section('content')
    <div class="section container">
        <div class="row g-lg-0">
            <div class="col-lg-6 d-none d-lg-block">
                <div class="h-100 auth-form__bg" style="background-image: url({{ frontendImage('login', @$loginContent->data_values->image, '800x1100') }});">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="auth-form__content section">
                    <h3 class="text-capitalize text-center mt-0 mb-4">
                        {{ __(@$loginContent->data_values->heading) }}
                    </h3>

                    <div class="login-info-box">
                        <p class="login-info-text mb-3">
                            @php
                                echo __(strip_tags(@$loginContent->data_values->intro_1 ?? "Ready to start your language learning journey? Applying to Lana Language Centre is simple and straightforward. Whether you want to learn German or explore Ugandan languages, we're here to guide you through the process."));
                            @endphp
                        </p>
                        <p class="login-info-text mb-4">
                            @php
                                echo __(strip_tags(@$loginContent->data_values->intro_2 ?? "Our admissions team is ready to help you choose the right course for your needs and answer any questions you may have about our programs, schedules, and fees."));
                            @endphp
                        </p>

                        <div class="row g-2 login-steps">
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li>▢ {{ __(@$loginContent->data_values->step_1 ?? 'Start Online Submission') }}</li>
                                    <li>▢ {{ __(@$loginContent->data_values->step_2 ?? 'Submit The Form') }}</li>
                                    <li>▢ {{ __(@$loginContent->data_values->step_3 ?? 'Review The Submission') }}</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled mb-0">
                                    <li>▢ {{ __(@$loginContent->data_values->step_4 ?? 'Gather Necessary Documents') }}</li>
                                    <li>▢ {{ __(@$loginContent->data_values->step_5 ?? 'Interviewing Process') }}</li>
                                    <li>▢ {{ __(@$loginContent->data_values->step_6 ?? 'Last Decision') }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
