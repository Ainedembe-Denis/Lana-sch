@php
    // About page content is stored in the `about.content` frontend entry.
    $aboutContent = getContent('about.content', true);
@endphp

<section class="section--sm org-structure section--bottom">
    <div class="container">
        <div class="text-center">
            <h2 class="org-structure__title mb-3 mb-lg-4">
                <span class="org-structure__line">
                    {{ __(@$aboutContent->data_values->org_structure_title ?? 'Organizational Structure') }}
                </span>
                <span class="org-structure__accent org-structure__line">
                    {{ __(@$aboutContent->data_values->org_structure_accent ?? 'Management') }}
                </span>
            </h2>

            {{-- This section is purely presentational (matches the provided organisational structure image). --}}
            <p class="org-structure__subtitle mb-4 mb-lg-5">
                {{ __(@$aboutContent->data_values->org_structure_subtitle ?? 'Our staff from the top management to the support staff is comprised of well-trained, highly self-driven and competent colleagues whose focus is centered on client satisfaction.') }}
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <img
                    src="{{ asset('assets/images/logo_icon/organisation.png') }}"
                    alt="@lang('Organizational structure')"
                    class="img-fluid org-structure__image"
                />
            </div>
        </div>
    </div>
</section>

