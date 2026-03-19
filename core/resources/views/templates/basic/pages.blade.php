@extends($activeTemplate . 'layouts.frontend')

@section('content')
    @if ($sections != null)
        @foreach (json_decode($sections) as $sec)
            @include($activeTemplate . 'sections.' . $sec)
        @endforeach
    @endif

    @if (request()->routeIs('pages') && request()->route('slug') === 'about')
        @include($activeTemplate . 'sections.mission_goals')
        @include($activeTemplate . 'sections.career_guidance')
    @endif
@endsection
