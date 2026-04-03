@php
    $aboutContent = getContent('about.content', true);
@endphp
<section class="section--sm career-guidance section--bottom">
    <div class="container">
        
        <div class="d-flex align-items-center justify-content-center justify-content-lg-start">
            <p class="mb-0 text-capitalize text--primary xxl-text">
                {{ __(@$aboutContent->data_values->career_title ?? 'Career Guidance') }}
            </p>
        </div>
        <div class="row g-4 g-lg-5" style="text-align: justify!important; margin-top: 0.5em!important">
            <div class="col-lg-6">
                <div class="career-guidance__item">
                    <div class="career-guidance__icon">
                        <i class="las la-briefcase"></i>
                    </div>
                    <div class="career-guidance__content">
                        <h5 class="career-guidance__heading">
                            {{ __(@$aboutContent->data_values->career_item_1_title ?? 'Career Counseling') }}
                        </h5>
                        <p class="career-guidance__text mb-0">
                            @php
                                echo __(strip_tags(@$aboutContent->data_values->career_item_1_text ?? 'Our experienced counselors help students identify career paths that align with their language skills and interests. We provide guidance on how language proficiency can enhance career opportunities.'));
                            @endphp
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="career-guidance__item">
                    <div class="career-guidance__icon">
                        <i class="las la-globe"></i>
                    </div>
                    <div class="career-guidance__content">
                        <h5 class="career-guidance__heading">
                            {{ __(@$aboutContent->data_values->career_item_2_title ?? 'International Opportunities') }}
                        </h5>
                        <p class="career-guidance__text mb-0">
                            @php
                                echo __(strip_tags(@$aboutContent->data_values->career_item_2_text ?? 'We guide students on how to leverage their language skills for international career opportunities, including work in German-speaking countries and international organizations.'));
                            @endphp
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="career-guidance__item">
                    <div class="career-guidance__icon">
                        <i class="las la-user-graduate"></i>
                    </div>
                    <div class="career-guidance__content">
                        <h5 class="career-guidance__heading">
                            {{ __(@$aboutContent->data_values->career_item_3_title ?? 'Academic Advancement') }}
                        </h5>
                        <p class="career-guidance__text mb-0">
                            @php
                                echo __(strip_tags(@$aboutContent->data_values->career_item_3_text ?? 'Our guidance services help students understand how language certification can support academic pursuits, including study abroad programs and higher education opportunities.'));
                            @endphp
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="career-guidance__item">
                    <div class="career-guidance__icon">
                        <i class="las la-award"></i>
                    </div>
                    <div class="career-guidance__content">
                        <h5 class="career-guidance__heading">
                            {{ __(@$aboutContent->data_values->career_item_4_title ?? 'Professional Development') }}
                        </h5>
                        <p class="career-guidance__text mb-0">
                            @php
                                echo __(strip_tags(@$aboutContent->data_values->career_item_4_text ?? 'We assist students in developing professional skills that complement their language learning, preparing them for successful careers in various industries.'));
                            @endphp
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

