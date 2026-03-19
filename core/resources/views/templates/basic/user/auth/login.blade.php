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

                    <div class="login-info-box mb-5">
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

        <div class="row">
            <div class="col-12">
                <div class="login-extra-box">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h5 class="login-extra-heading mb-3">
                                {{ __(@$loginContent->data_values->know_first_title ?? 'Things To Know First') }}
                            </h5>
                            <p class="login-info-text mb-0">
                                @php
                                    echo __(strip_tags(@$loginContent->data_values->know_first_body ?? 'Before applying, please review our course offerings and determine which language and level best suits your needs. We offer courses in German (A1 to C1 levels) and various Ugandan languages including Luganda, Acholi, Runyoro, and more.<br><br>All applicants should have a genuine interest in language learning and be committed to attending classes regularly. No prior language experience is required for beginner courses. We welcome students of all ages and backgrounds.'));
                                @endphp
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h5 class="login-extra-heading mb-3">
                                {{ __(@$loginContent->data_values->required_docs_title ?? 'Required Documents') }}
                            </h5>
                            <p class="login-info-text">
                                @php
                                    echo __(strip_tags(@$loginContent->data_values->required_docs_intro ?? "To complete your application, you'll need to provide the following documents and information:"));
                                @endphp
                            </p>
                            <ul class="list-unstyled login-steps mb-0">
                                <li>▢ {{ __(@$loginContent->data_values->required_doc_1 ?? 'Completed application form (available online or at our office)') }}</li>
                                <li>▢ {{ __(@$loginContent->data_values->required_doc_2 ?? 'Copy of national ID or passport') }}</li>
                                <li>▢ {{ __(@$loginContent->data_values->required_doc_3 ?? 'Two recent passport-size photographs') }}</li>
                                <li>▢ {{ __(@$loginContent->data_values->required_doc_4 ?? 'Proof of payment or payment plan agreement') }}</li>
                                <li>▢ {{ __(@$loginContent->data_values->required_doc_5 ?? 'For advanced courses, proof of previous language level (if applicable)') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
