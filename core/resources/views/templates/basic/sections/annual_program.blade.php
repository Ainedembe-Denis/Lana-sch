@php
    $content = getContent('annual_program.content', true);
    $bookSlotItems = getContent('annual_program.element', null, null, true);
@endphp

<section id="annual-program" class="section--sm section--bottom annual-program">
    <div class="container">
        {{-- Hero / Intro --}}
        <div class="annual-program__intro mb-5">
            <h2 class="annual-program__title mb-4">
                {{ __(@$content->data_values->heading ?? 'Our Annual Program') }}
            </h2>
            <div class="annual-program__body">
                {!! __(@$content->data_values->intro_body ?? 'At Lana Language Centre, we offer comprehensive annual language programs designed to help you achieve fluency. Our programs are structured to provide progressive learning from beginner to advanced levels. We offer flexible payment plans and various course durations to accommodate different learning needs and schedules. Contact our admissions office for detailed information about our annual programs and current fee structure.') !!}
            </div>
        </div>

        {{-- Table 1: Course and registration dates --}}
        <div class="annual-program__table-wrap mb-5">
            <h4 class="annual-program__table-title mb-4">
                {{ __(@$content->data_values->course_reg_title ?? 'Course and registration dates 2026') }}
            </h4>
            <div class="table-responsive">
                <table class="annual-program__table annual-program__table--course-reg">
                    <thead>
                        <tr>
                            <th>@lang('Intake')</th>
                            <th>@lang('Duration')</th>
                            <th>@lang('Dates')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $defaultIntakes = [
                                1 => ['name' => 'January', 'duration' => '10 Weeks', 'course' => '12/01/2026 – 28/03/2026', 'reg' => '24/11/2025 – 24/01/2026'],
                                2 => ['name' => 'April', 'duration' => '10 Weeks', 'course' => '13/04/2026 – 25/06/2026', 'reg' => '09/03/2026 – 25/04/2026'],
                                3 => ['name' => 'July', 'duration' => '10 Weeks', 'course' => '13/07/2026 – 19/09/2026', 'reg' => '08/06/2026 – 25/07/2026'],
                                4 => ['name' => 'October', 'duration' => '10 Weeks', 'course' => '05/10/2026 – 12/12/2026', 'reg' => '31/08/2026 – 17/10/2026'],
                            ];
                        @endphp
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $d = $defaultIntakes[$i] ?? [];
                                $name = @$content->data_values->{"intake_{$i}_name"} ?: $d['name'] ?? ('Intake ' . $i);
                                $duration = @$content->data_values->{"intake_{$i}_duration"} ?: $d['duration'] ?? '10 Weeks';
                                $courseDates = @$content->data_values->{"intake_{$i}_course_dates"} ?: $d['course'] ?? '';
                                $regDates = @$content->data_values->{"intake_{$i}_reg_dates"} ?: $d['reg'] ?? '';
                                $bgClass = $i === 1 ? 'annual-program__cell--yellow' : ($i === 2 ? 'annual-program__cell--blue' : ($i === 3 ? 'annual-program__cell--yellow' : 'annual-program__cell--gray'));
                            @endphp
                            @if ($courseDates || $regDates || $name)
                                <tr class="{{ $bgClass }}">
                                    <td>{{ __($name) }}</td>
                                    <td rowspan="2" class="annual-program__cell--duration">{{ __($duration) }}</td>
                                    <td><strong>{{ __($courseDates) }}</strong></td>
                                </tr>
                                <tr class="{{ $bgClass }}">
                                    <td>@lang('Registration')</td>
                                    <td>{{ __($regDates) }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- FAQ: Examination preparation dates --}}
        <div class="annual-program__faq mb-5">
            <h4 class="annual-program__table-title mb-4">
                {{ __(@$content->data_values->exam_prep_faq_title ?? 'Examination preparation dates') }}
            </h4>
            <div class="accordion annual-program__accordion" id="annualProgramFaq">
                @php
                    $defaultFaq = [
                        1 => ['q' => 'What does it mean?', 'a' => ''],
                        2 => ['q' => 'Where and when does it take place?', 'a' => ''],
                        3 => ['q' => 'Who can be part of the examination preparation course?', 'a' => ''],
                    ];
                @endphp
                @foreach ([1, 2, 3] as $i)
                    @php
                        $df = $defaultFaq[$i] ?? [];
                        $question = @$content->data_values->{"faq_{$i}_question"} ?: $df['q'] ?? '';
                        $answer = @$content->data_values->{"faq_{$i}_answer"} ?: $df['a'] ?? '';
                    @endphp
                    @if ($question || $answer)
                        <div class="accordion-item">
                            <h5 class="accordion-header">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $i }}" aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="faq{{ $i }}">
                                    <span class="annual-program__faq-icon me-2"><i class="las la-question"></i></span>
                                    {{ __($question ?: 'Question ' . $i) }}
                                </button>
                            </h5>
                            <div id="faq{{ $i }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}" data-bs-parent="#annualProgramFaq">
                                <div class="accordion-body">
                                    @if ($answer)
                                        {!! __($answer) !!}
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- Table 2: Dates of examination preparation courses --}}
        <div class="annual-program__table-wrap mb-5">
            <h4 class="annual-program__table-title mb-4">
                {{ __(@$content->data_values->exam_prep_courses_title ?? 'Dates of examination preparation courses 2026') }}
            </h4>
            <div class="table-responsive">
                <table class="annual-program__table annual-program__table--exam-prep">
                    <thead>
                        <tr>
                            <th>@lang('Intake')</th>
                            <th>@lang('Dates')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $defaultExamPrep = [
                                1 => ['intake' => 'Intake 1', 'dates' => '21/03/2026 – 10/04/2026'],
                                2 => ['intake' => 'Intake 2', 'dates' => '20/06/2026 – 10/07/2026'],
                                3 => ['intake' => 'Intake 3', 'dates' => '12/09/2026 – 02/10/2026'],
                                4 => ['intake' => 'Intake 4', 'dates' => '28/11/2026 – 23/12/2026'],
                            ];
                        @endphp
                        @foreach ([1, 2, 3, 4] as $i)
                            @php
                                $de = $defaultExamPrep[$i] ?? [];
                                $intake = @$content->data_values->{"exam_prep_{$i}_intake"} ?: $de['intake'] ?? '';
                                $dates = @$content->data_values->{"exam_prep_{$i}_dates"} ?: $de['dates'] ?? '';
                            @endphp
                            @if ($intake || $dates)
                                <tr>
                                    <td>{{ __($intake ?: 'Intake ' . $i) }}</td>
                                    <td><strong>{{ __($dates) }}</strong></td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Table 3: Book a slot according to level --}}
        <div class="annual-program__table-wrap">
            <h4 class="annual-program__table-title mb-4">
                {{ __(@$content->data_values->book_slot_title ?? 'Examination preparation dates – book a slot according to level') }}
            </h4>
            <div class="table-responsive">
                <table class="annual-program__table annual-program__table--book-slot">
                    <thead>
                        <tr>
                            <th>@lang('Level')</th>
                            <th>@lang('Type of Exam')</th>
                            <th>@lang('Action')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $items = collect($bookSlotItems ?? [])->values();
                            $levelCounts = $items->groupBy(fn($i) => @$i->data_values->level)->map->count();
                        @endphp
                        @foreach ($items as $idx => $item)
                            @php
                                $level = @$item->data_values->level;
                                $examType = @$item->data_values->exam_type;
                                $colorClass = @$item->data_values->color_class ?: 'gray';
                                $bookUrl = @$item->data_values->book_url ?: '#';
                                $prevLevel = $idx > 0 ? (@$items[$idx - 1]->data_values->level ?? null) : null;
                                $isFirstOfLevel = $prevLevel !== $level;
                                $rowspan = $isFirstOfLevel ? ($levelCounts[$level] ?? 1) : 0;
                            @endphp
                            <tr>
                                @if ($isFirstOfLevel)
                                    <td rowspan="{{ $rowspan }}">{{ __($level) }}</td>
                                @endif
                                <td class="annual-program__cell--{{ $colorClass }}">{{ __($examType) }}</td>
                                <td>
                                    <a href="{{ $bookUrl }}" target="_blank" rel="noopener" class="annual-program__book-link">@lang('Book a slot')</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
