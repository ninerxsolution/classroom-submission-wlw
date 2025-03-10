<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard{{ config('app.subfix_web_title') }}</title>

    @include('partials.head')

</head>

<body>

    @include('partials.header')

    <section class="py-4">
        {{-- {{ $assignments }} --}}
        @foreach ($subjects as $subject)
            <div class="container">
                <div class="title d-flex justify-content-between">
                    <h2>
                        วิชา {{ $subject->subject_title }}
                    </h2>
                    <h3>
                        ชั้น {{ $subject->grades }}
                    </h3>
                </div>
                <hr>
                <div class="accordion" id="accordionExample">
                    @if ($subject->learningUnits->isNotEmpty())
                        @foreach ($subject->learningUnits as $unit)
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bold collapsed" type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse_{{ $unit->id }}_{{ $loop->iteration }}"
                                        aria-expanded="false"
                                        aria-controls="collapse_{{ $unit->id }}_{{ $loop->iteration }}">
                                        <h4>
                                            หน่วยการเรียนรู้ที่ {{ $loop->iteration }} {{ $unit->unit_title }}
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapse_{{ $unit->id }}_{{ $loop->iteration }}"
                                    class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <div>
                                            {{ $unit->unit_description }}
                                        </div>
                                        {{-- <div class="d-flex">
                                            <a href="{{ route('route-teacher-subject-unit-desc') }}"
                                                class="ms-auto btn btn-primary rounded-pill">
                                                รายละเอียดหน่วยการเรียน
                                            </a>
                                        </div> --}}
                                        <hr>
                                        <div>
                                            <div>
                                                <h5>
                                                    หน่วยการเรียนรู้ย่อย
                                                </h5>
                                            </div>
                                            @if ($unit->subLearningUnits->isNotEmpty())
                                                @foreach ($unit->subLearningUnits as $subUnit)
                                                    <div
                                                        class="text-decoration-none d-flex justify-content-between my-3">
                                                        <span class="fw-bold">{{ $subUnit->sub_unit_title }}</span>
                                                        <div>
                                                            <span class="text-dark">
                                                                มอบมาย {{ $unit->assignments_count }} งาน
                                                            </span>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <p>ไม่มีหน่วยการเรียนรู้ย่อย</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>ไม่มีหน่วยการเรียนรู้</p>
                    @endif
                </div>
            </div>
            <hr>
        @endforeach

        {{-- @foreach ($subjects as $subject)
            <h3>วิชา {{ $subject->subject_title }} ({{ $subject->subject_code }})</h3>

            @if ($subject->learningUnits->isNotEmpty())
                @foreach ($subject->learningUnits as $unit)
                    <div class="card mt-2">
                        <div class="card-header">
                            หน่วยการเรียนรู้: {{ $unit->unit_title }}
                        </div>
                        <div class="card-body">
                            <p>{{ $unit->unit_description }}</p>
                            <strong>คะแนนสมมติ: {{ $unit->assume_score }}</strong>

                            @if ($unit->subLearningUnits->isNotEmpty())
                                <ul>
                                    @foreach ($unit->subLearningUnits as $subUnit)
                                        <li>
                                            <strong>{{ $subUnit->sub_unit_title }}</strong>
                                            - {{ $subUnit->sub_unit_description }}
                                            (คะแนนสมมติ: {{ $subUnit->assume_score }})
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p>ไม่มีหน่วยการเรียนรู้ย่อย</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            @else
                <p>ไม่มีหน่วยการเรียนรู้</p>
            @endif

            <hr>
        @endforeach --}}

    </section>
    @include('partials.footer')
    @include('partials.script')

</body>

</html>
