@php
    $libraryContent = getContent('online_library.content', true);
@endphp
<section id="online-library" class="section--sm section--bottom online-library">
    <div class="container">
        <div class="text-center">
            <h2 class="online-library__title mb-3">
                <span>{{ __(@$libraryContent->data_values->title_primary ?? 'Access Our') }}</span>
                <span class="online-library__accent">
                    {{ __(@$libraryContent->data_values->title_accent ?? 'Digital Library Resources') }}
                </span>
            </h2>
            <p class="online-library__subtitle mb-5">
                @php
                    echo __(strip_tags(@$libraryContent->data_values->subtitle ?? 'Explore our comprehensive collection of language learning materials, e-books, audio resources, and study guides available 24/7'));
                @endphp
            </p>
        </div>

        <div class="row">
            <div class="col-12 mb-5">
                <h4 class="online-library__heading mb-3">
                    {{ __(@$libraryContent->data_values->overview_heading ?? 'Library Overview') }}
                </h4>
                <p class="online-library__body mb-0">
                    @php
                        echo __(strip_tags(@$libraryContent->data_values->overview_body ?? "Welcome to Lana Language Centre's Online Library! Our digital library provides students with unlimited access to a vast collection of language learning resources. Whether you're studying German, Luganda, or any other language we offer, you'll find comprehensive materials to support your learning journey.<br><br>Our library includes textbooks, grammar guides, vocabulary lists, audio recordings, video tutorials, practice exercises, and exam preparation materials. All resources are organized by language and difficulty level to help you find exactly what you need."));
                    @endphp
                </p>
            </div>
        </div>

        <div class="row g-4 online-library-grid">
            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-book-open"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card1_title ?? 'Foreign language resources') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card1_body ?? 'Comprehensive collection of German textbooks, grammar guides, and vocabulary materials for all proficiency levels.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card1_item1 ?? 'German language resources') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card1_item2 ?? 'Indo-European language resources') }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-headphones-alt"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card2_title ?? 'Audio & Video Resources') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card2_body ?? 'Access audio recordings, podcasts, and video tutorials to improve your listening and pronunciation skills.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card2_item1 ?? 'Audio Pronunciation Guides') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card2_item2 ?? 'Language Learning Podcasts') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card2_item3 ?? 'Video Tutorials') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card2_item4 ?? 'Interactive Listening Exercises') }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-file-alt"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card3_title ?? 'Ugandan Languages') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card3_body ?? 'Extensive collection of materials for learning Luganda, Acholi, Runyoro, Runyankole, and other local languages.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card3_item1 ?? 'Luganda Learning Materials') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card3_item2 ?? 'Language Practice Exercises') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card3_item3 ?? 'Traditional Stories & Texts') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card3_item4 ?? 'Cultural Context Guides') }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-tasks"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card4_title ?? 'Practice Exercises') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card4_body ?? 'Interactive exercises, quizzes, and practice tests to reinforce your learning and track your progress.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card4_item1 ?? 'Grammar Exercises') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card4_item2 ?? 'Writing Practice Sheets') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card4_item3 ?? 'Reading Comprehension') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card4_item4 ?? 'Vocabulary Quizzes') }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-graduation-cap"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card5_title ?? 'Course based projects') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card5_body ?? 'Specialized materials for German language exams including practice tests and study guides.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card5_item1 ?? 'German Exam Practice') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card5_item2 ?? 'Exam Strategy Resources') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card5_item3 ?? 'Past Exam Papers') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card5_item4 ?? 'Past Exam Review Sheets') }}</li>
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <div class="online-library-card">
                    <div class="online-library-card__icon">
                        <i class="las la-users"></i>
                    </div>
                    <h5 class="online-library-card__title">
                        {{ __(@$libraryContent->data_values->card6_title ?? 'Class based projects') }}
                    </h5>
                    <p class="online-library-card__text">
                        @php
                            echo __(strip_tags(@$libraryContent->data_values->card6_body ?? 'Connect with fellow students, join study groups, and participate in language learning discussions.'));
                        @endphp
                    </p>
                    <ul class="online-library-card__list">
                        <li>▢ {{ __(@$libraryContent->data_values->card6_item1 ?? 'Online Study Groups') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card6_item2 ?? 'Language Exchange Programs') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card6_item3 ?? 'Peer Learning Resources') }}</li>
                        <li>▢ {{ __(@$libraryContent->data_values->card6_item4 ?? 'Discussion Forums') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

