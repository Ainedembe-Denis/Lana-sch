@php
    $aboutContent = getContent('about.content', true);
@endphp
<section class="section--sm mission-goals section--bottom">
    <div class="container">
        <div class="text-center">
            <h2 class="mission-goals__title mb-4 mb-lg-5">
                <span>{{ __(@$aboutContent->data_values->mission_title ?? 'Mission Statement') }}</span>
                <span class="mission-goals__amp">&amp;</span>
                <span class="mission-goals__accent">{{ __(@$aboutContent->data_values->core_values_title ?? 'Institutional Goals') }}</span>
            </h2>
        </div>

        <div class="row g-4 g-lg-5">
            <div class="col-lg-6">
                <h5 class="mission-goals__heading">{{ __(@$aboutContent->data_values->mission_title ?? 'Our Mission') }}</h5>
                <p class="mission-goals__text mb-4">
                    @php
                        echo __(strip_tags(@$aboutContent->data_values->mission_text ?? 'To promote and enable cultural exchange and cooperation through training local and foreign languages.'));
                    @endphp
                </p>

                <h5 class="mission-goals__heading">{{ __(@$aboutContent->data_values->motto_title ?? 'Our Motto') }}</h5>
                <p class="mission-goals__text mb-0">
                    {{ __(@$aboutContent->data_values->motto_text ?? 'Languages open doors') }}
                </p>
            </div>

            <div class="col-lg-6">
                <h5 class="mission-goals__heading">{{ __(@$aboutContent->data_values->vision_title ?? 'Our Vision') }}</h5>
                <p class="mission-goals__text mb-4">
                    @php
                        echo __(strip_tags(@$aboutContent->data_values->vision_text ?? 'To contribute to intercultural awareness and enrichment in society through languages!'));
                    @endphp
                </p>

                <h5 class="mission-goals__heading">{{ __(@$aboutContent->data_values->core_values_title ?? 'Our Core Values') }}</h5>
                <ul class="mission-goals__list mb-0">
                    <li>{{ __(@$aboutContent->data_values->core_value_1 ?? 'Excellence') }}</li>
                    <li>{{ __(@$aboutContent->data_values->core_value_2 ?? 'Team work') }}</li>
                    <li>{{ __(@$aboutContent->data_values->core_value_3 ?? 'Customer satisfaction') }}</li>
                    <li>{{ __(@$aboutContent->data_values->core_value_4 ?? 'Commitment') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>

