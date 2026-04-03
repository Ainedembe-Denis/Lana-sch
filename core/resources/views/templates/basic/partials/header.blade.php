@php
    $contactContent = getContent('contact.content', true);
    $germanCourses = getContent('courses.element', false, null, true);
@endphp

<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list list--row d-flex align-items-center position-relative w-100" style="min-height: 40px; margin-top: 1em!important;">
                    <li class="list--row__item mx-auto">
                        <ul class="list vf-info-list d-flex justify-content-center m-0 p-0">
                            <li class="vf-info-list__item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($activeTemplateTrue . 'images/icon-envelop.png') }}">
                                    </div>
                                    <div class="ms-3">
                                        <p class="label mb-0 fw-bold text-uppercase t-text-white">
                                            @lang('Email')
                                        </p>

                                        <a href="mailto:{{ @$contactContent->data_values->email }}" class="mb-0 vf-info-list__text">{{ __(@$contactContent->data_values->email) }}</a>
                                    </div>

                                </div>
                            </li>
                            <li class="vf-info-list__item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($activeTemplateTrue . 'images/icon-location.png') }}">
                                    </div>
                                    <div class="ms-3">
                                        <p class="label mb-0 fw-bold text-uppercase t-text-white">
                                            @lang('Address')
                                        </p>
                                        <p class="mb-0 vf-info-list__text">
                                            {{ __(@$contactContent->data_values->location) }}
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="vf-info-list__item">
                                <div class="d-flex">
                                    <div class="flex-shrink-0">
                                        <img src="{{ asset($activeTemplateTrue . 'images/icon-phone.png') }}">
                                    </div>
                                    <div class="ms-3">
                                        <p class="label mb-0 fw-bold text-uppercase t-text-white">
                                            @lang('Phone')
                                        </p>
                                        <a href="tel:{{ @$contactContent->data_values->phone }}" class="mb-0 fw-md vf-info-list__text">
                                            {{ @$contactContent->data_values->phone }}</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li class="position-absolute end-0 d-flex align-items-center" style="top: 50%; transform: translateY(-50%); pe-3">
                        <img src="https://flagcdn.com/w40/ug.png" alt="Uganda" style="width: 35px; height: auto; border-radius: 2px;">
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<style>
    .hero__content-title {
        margin-top: 2em!important;
    }

    }
</style>

<header class="header" id="header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ siteLogo() }}" alt="{{ __(gs('site_name')) }}" class="img-fluid logo__is" />
            </a>
            <button class="navbar-toggler header-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span id="hiddenNav"><i class="las la-bars"></i></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-menu align-items-lg-center">


                    <li class="nav-item">
                        <a class="nav-link {{ menuActive('home') }}" aria-current="page" href="{{ route('home') }}">@lang('Home')</a>
                    </li>
                    @if (@$pages)
                        @foreach ($pages as $k => $data)
                            @php
                                $name = __($data->name);
                            @endphp
                            @if (stripos($name, 'Course') !== false || $data->slug == 'courses')
                                <li class="nav-item has-mega-menu dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('pages', $data->slug) }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ $name }} <i class="las la-angle-down" style="color: #336699;"></i>
                                    </a>
                                    <div class="mega-menu dropdown-menu">
                                        <div class="container">
                                            <div class="row">
                                                
                                                <div class="col-lg-4">
                                                    <h6 class="mega-menu-title">German Courses</h6>
                                                    @php
                                                        $germanCourseItems = $germanCourses->filter(function ($course) {
                                                            $slug = $course->slug ?: (@$course->data_values->slug ?? null);
                                                            return $slug && strpos($slug, 'german-') === 0;
                                                        })->values();
                                                    @endphp
                                                    <ul class="mega-menu-list">
                                                        <li><a href="{{ route('format.duration') }}">Format And Duration</a></li>
                                                        @foreach ($germanCourseItems as $course)
                                                            @php
                                                                $slug = $course->slug ?: (@$course->data_values->slug ?? null);
                                                                $title = @$course->data_values->title ?? $slug;
                                                                $isExcluded = $slug === 'german-a1'; // Avoid duplicating A1.
                                                            @endphp
                                                            @if ($slug && !$isExcluded)
                                                                <li><a href="{{ url('courses/' . $slug) }}">{{ __($title) }}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h6 class="mega-menu-title">Other Languages</h6>
                                                    <ul class="mega-menu-list">
                                                        <li><a href="{{ route('format.duration') }}">Format And Duration</a></li>
                                                        <li><a href="{{ route('other.languages') }}#indo-european">Indo-European Languages</a></li>
                                                        <li><a href="{{ route('other.languages') }}#ugandan-local">Ugandan Local Languages</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h6 class="mega-menu-title">Get Started</h6>
                                                    <ul class="mega-menu-list">
                                                        <li><a href="{{ route('annual.program') }}">Annual Program</a></li>
                                                        <li><a href="{{ route('register') }}">Register To Start Classes</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="{{ menuActive('pages', [$data->slug]) }} nav-link" href="{{ route('pages', [$data->slug]) }}">{{ $name }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                    <li class="nav-item">
                        <a class="nav-link {{ menuActive('blog') }}" href="{{ route('blog') }}">@lang('Blogs')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ menuActive('online.library') }}" href="{{ route('online.library') }}">@lang('Online Library')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ menuActive('contact') }}" href="{{ route('contact') }}">@lang('Contact')</a>
                    </li>
                    @auth
                        <li class="nav-item mt-2 d-block d-lg-none">
                            <div class="account mt-1">
                                <a href="{{ route('user.home') }}" class="btn btn--md btn--base fw-bold w-100">
                                    @lang('Dashboard')
                                </a>
                            </div>
                        </li>
                    @else
                        <li class="nav-item mt-2 d-block d-lg-none">
                            <div class="account mt-1">
                                <a href="{{ route('user.login') }}" class="btn btn--md btn--base fw-bold w-100">
                                    @lang('HOW TO APPLY')
                                </a>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>

            @auth
                <div class="account d-none d-lg-block">
                    <a href="{{ route('user.home') }}" class="btn btn--md btn--base fw-bold w-100">
                        @lang('Dashboard')
                    </a>
                </div>
            @else
                <div class="account d-none d-lg-block">
                    <a href="{{ route('user.login') }}" class="btn btn--md btn--base fw-bold w-100">
                        @lang('HOW TO APPLY')
                    </a>
                </div>
            @endauth
        </nav>
    </div>
</header>


@push('style')
    <style>
        .language-wrapper {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            padding: 5px 12px;
            border-radius: 4px;
            width: max-content;
            background-color: transparent;
            border: 1px solid hsl(var(--white) / .5) !important;
            height: 38px;
        }

        .sm-screen {
            max-width: 130px;
        }

        .sm-screen .language-wrapper {
            border: 1px solid hsl(var(--dark) / .5) !important;
        }

        .sm-screen .language_text_select {
            color: hsl(var(--dark));
        }

        .sm-screen .collapse-icon {
            color: hsl(var(--dark));
        }


        .language_flag {
            flex-shrink: 0
        }

        .language_flag img {
            height: 20px;
            width: 20px;
            object-fit: cover;
            border-radius: 50%;
        }

        .language-wrapper.show .collapse-icon {
            transform: rotate(180deg)
        }

        .collapse-icon {
            font-size: 14px;
            display: flex;
            transition: all linear 0.2s;
            color: hsl(var(--white));
        }

        .language_text_select {
            font-size: 14px;
            font-weight: 400;
            color: hsl(var(--white));
            margin-bottom: 0;
        }

        .language-content {
            display: flex;
            align-items: center;
            gap: 6px;
        }


        .language_text {
            color: hsl(var(--white));
            margin-bottom: 0;
        }

        .langList {
            padding: 0;
        }

        .language-list {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            cursor: pointer;
        }

        .language .dropdown-menu {
            position: absolute;
            -webkit-transition: ease-in-out 0.1s;
            transition: ease-in-out 0.1s;
            opacity: 0;
            visibility: hidden;
            top: 100%;
            display: unset;
            background: hsl(var(--base));
            -webkit-transform: scaleY(1);
            transform: scaleY(1);
            min-width: 150px;
            padding: 7px 0 !important;
            border-radius: 8px;
            border: 1px solid rgb(255 255 255 / 10%);
        }

        .language .dropdown-menu.show {
            visibility: visible;
            opacity: 1;
            inset: unset !important;
            margin: 0px !important;
            transform: unset !important;
            top: 100% !important;
        }
    </style>
@endpush

@push('script')
    <script>
        (function($) {
            "use strict";

            const $mainlangList = $(".langList");
            const $langBtn = $(".language-content");
            const $langListItem = $mainlangList.children();

            $langListItem.each(function() {
                const $innerItem = $(this);
                const $languageText = $innerItem.find(".language_text");
                const $languageFlag = $innerItem.find(".language_flag");

                $innerItem.on("click", function(e) {
                    $langBtn.find(".language_text_select").text($languageText.text());
                    $langBtn.find(".language_flag").html($languageFlag.html());
                });
            });

        })(jQuery);
    </script>
@endpush
