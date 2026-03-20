@php
    $content = getContent('other_languages.content', true);
@endphp

<section class="section--sm section--bottom other-languages">
    <div class="container">

        {{-- Indo-European languages section --}}
        <div id="indo-european" class="other-languages__section mb-5 scroll-margin-top">
            <div class="other-languages__block d-flex gap-3">
                <div class="other-languages__icon other-languages__icon--blue">
                    <i class="las la-globe"></i>
                </div>
                <div>
                    <h2 class="other-languages__heading mb-3">
                        {{ __(@$content->data_values->indo_european_heading ?? 'Indo-European languages') }}
                    </h2>
                    <div class="other-languages__body">
                        {!! __(@$content->data_values->indo_european_body ?? 'Some of the Indo-European languages taught at Lana Language Center include French, Russian, Spanish, Italian, Dutch, Chinese, Japanese, and Arabic among others.') !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Ugandan local languages section --}}
        <div id="ugandan-local" class="other-languages__section scroll-margin-top">
            <div class="other-languages__block d-flex gap-3">
                <div class="other-languages__icon other-languages__icon--gold">
                    <i class="las la-book-open"></i>
                </div>
                <div class="flex-grow-1">
                    <h2 class="other-languages__heading mb-3">
                        {{ __(@$content->data_values->ugandan_heading ?? 'Ugandan local languages') }}
                    </h2>
                    <div class="other-languages__body mb-4">
                        {!! __(@$content->data_values->ugandan_body ?? 'Among the Ugandan local languages taught at Lana Language Center are Luganda, Lusoga, Runyakitara, Luo among others.') !!}
                    </div>
                    <div class="other-languages__contact">
                        <div class="other-languages__contact-row">
                            <div class="other-languages__contact-icon">
                                <i class="las la-phone"></i>
                            </div>
                            <div>
                                <p class="other-languages__contact-label">@lang('PHONE NUMBERS')</p>
                                <p class="other-languages__contact-value mb-0">
                                    <a href="tel:{{ str_replace(' ', '', @$content->data_values->ugandan_phone_1 ?? '0701048912') }}">{{ __(@$content->data_values->ugandan_phone_1 ?? '0701 04 89 12') }}</a><br>
                                    <a href="tel:{{ str_replace(' ', '', @$content->data_values->ugandan_phone_2 ?? '0788048919') }}">{{ __(@$content->data_values->ugandan_phone_2 ?? '0788 04 89 19') }}</a>
                                </p>
                            </div>
                        </div>
                        <div class="other-languages__contact-row">
                            <div class="other-languages__contact-icon">
                                <i class="las la-envelope"></i>
                            </div>
                            <div>
                                <p class="other-languages__contact-label">@lang('EMAIL ADDRESS')</p>
                                <p class="other-languages__contact-value mb-0">
                                    <a href="mailto:{{ @$content->data_values->ugandan_email ?? 'lanalanguagecentre@gmail.com' }}">{{ __(@$content->data_values->ugandan_email ?? 'lanalanguagecentre@gmail.com') }}</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
