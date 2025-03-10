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
        <div class="container">
            <div class="title d-flex justify-content-between">
                <div>
                    <h1>
                        วิชาการสอน
                    </h1>
                    <div class="fs-6 text-secondary">
                        ประจำปีการศึกษา {{ $activeYear->year_label + 543 }} ภาคเรียนที่ {{ $activeYear->year_semester }}
                    </div>
                </div>
                {{-- <a href="{{ route('route-teacher-subject-desc') }}" class="btn btn-primary rounded align-self-center">
                    รายละเอียดวิชาเรียน
                </a> --}}
            </div>
            <hr>
            <div class="d-flex flex-wrap">
                {{-- {{ $activeYear }} --}}
                @foreach ($subjects as $subject)
                    <a href="{{ route('route-teacher-subjects') }}" class="text-decoration-none">
                        <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                            <div class="card-header fw-bold d-flex justify-content-between">
                                <span>วิชา {{ $subject['subject_title'] }}</span>
                                <span>{{ $subject['subject_code'] }}</span>
                            </div>
                            <div class="card-body">
                                @foreach ($subject['classrooms'] as $teachingAssignment)
                                    <div>
                                        <a href="{{ route('route-teacher-rooms', $teachingAssignment->id) }}"
                                            class="text-decoration-none">
                                            {{ $teachingAssignment->classroom->classroom_label }}
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </a>
                @endforeach

                {{-- {{ implode(', ', $subjects->keys()->toArray()) }}
                {{ $totalClassrooms = $subjects->sum(fn($subject) => count($subject['classrooms'])) }} --}}


            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')

</body>

</html>
