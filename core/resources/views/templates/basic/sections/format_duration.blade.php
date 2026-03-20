@php
    $content = getContent('format_duration.content', true);
@endphp

<section class="section--sm section--bottom format-duration">
    <div class="container">

        {{-- German Courses section --}}
        <div class="format-duration__section mb-5">
            <h2 class="format-duration__heading mb-4">
                {{ __(@$content->data_values->german_courses_heading ?? 'German Courses') }}
            </h2>
            <div class="format-duration__body">
                {!! __(@$content->data_values->german_courses_body ?? 'All German courses at Lana Language Center take a duration of 10 Weeks and courses from A1 to B1 are not segmented but courses from B2 onwards are subdivided into two i.e. B2.1 & B2.2, C1.1 & C1.2. The total duration of the B2 and C1 courses is 20 Weeks. The level C2 is strictly taught on private basis.<br><br>Students with prior knowledge of German without international certification are subjected to a pre-entry test at a cost.') !!}
            </div>
        </div>

        {{-- Other languages section --}}
        <div class="format-duration__section">
            <h2 class="format-duration__heading mb-4">
                {{ __(@$content->data_values->other_languages_heading ?? 'Other languages') }}
            </h2>
            <div class="format-duration__body">
                {!! __(@$content->data_values->other_languages_body ?? 'All other languages taught at Lana Language Center apart from German are taught on private basis and they are strictly online using zoom as a learning platform.') !!}
            </div>
        </div>

    </div>
</section>
