@extends($activeTemplate . 'layouts.frontend')
@section('content')
    @php
        $bannerContent = getContent('banner.content', true);
    @endphp
    
    <div class="hero" style="background-image: url({{ frontendImage('banner' , @$bannerContent->data_values->image, '1920x960') }});">
        <div class="hero__content">
            <div class="container">
                <div class="row g-3 justify-content-center">
                    <div class="col-lg-9 col-xl-7 text-center">
                        <h1 class="hero__content-title text-capitalize t-text-white">
                            {{ __(@$bannerContent->data_values->heading) }}
                        </h1>
                        <a href="{{ route('user.login') }}"
                            class="btn btn--xl xl-text btn--base btn--outline mt-3">
                            Apply Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @if ($sections->secs != null)
        @foreach (json_decode($sections->secs) as $sec)
            @if ($sec !== 'client' && strtolower($sec) !== 'faq')
                @include($activeTemplate . 'sections.' . $sec)
            @endif
        @endforeach
    @endif

@endsection
