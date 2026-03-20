@extends($activeTemplate . 'layouts.frontend')

@section('content')
    <section class="section--sm section--bottom">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-3">
                    <div class="course-sidebar">
                        <h5 class="course-sidebar__title">@lang('Language Courses')</h5>
                        <ul class="course-sidebar__list">
                            @foreach ($courses as $item)
                                @php
                                    $isActive = ($item->id === $course->id);
                                    // Slug may be stored either on the model column (`slug`)
                                    // or inside data_values (depending on how frontend builder saves it).
                                    // Use `?:` so empty string doesn't break the fallback.
                                    $itemSlug = ($item->slug ?: (@$item->data_values->slug ?? null));
                                    $itemTitle = @$item->data_values->title ?? 'Course';
                                @endphp
                                <li class="course-sidebar__item {{ $isActive ? 'course-sidebar__item--active' : '' }}">
                                    <a href="{{ $itemSlug ? route('courses.detail', ['courseSlug' => $itemSlug]) : '#' }}">
                                        {{ __($itemTitle) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col-lg-9">
                    <article class="course-detail">
                        <h2 class="course-detail__title">
                            {{ __(@$course->data_values->title ?? '') }}
                        </h2>

                        @if (@$course->data_values->summary)
                            <p class="course-detail__lead">
                                {{ __(@$course->data_values->summary) }}
                            </p>
                        @endif

                        @if (@$course->data_values->body)
                            <div class="course-detail__text">
                                @php
                                    echo @$course->data_values->body;
                                @endphp
                            </div>
                        @endif
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection

