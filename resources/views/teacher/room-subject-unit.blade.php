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
    {{-- {{ $learningUnit->id }} --}}
    {{-- {{ $assignments }} --}}
    @php
        use Carbon\Carbon;
        Carbon::setLocale('th');
    @endphp
    <section class="py-4">
        <div class="container">
            <div class="title d-flex justify-content-between align-items-baseline">
                <h1>
                    ห้องเรียน {{ $classroom->classroom_label }}
                </h1>
                <h2>
                    ในวิชา {{ $subject->subject_title }}
                </h2>
            </div>
            <hr>
            <h3>
                <a href="{{ route('route-teacher-rooms-subject-assignment-detail') }}" class="text-decoration-none">
                    <span class="text-secondary">
                        {{ $learningUnit->unit_title }}
                        /</span> </a>
                {{ $subLearningUnit->sub_unit_title }} ({{ $subLearningUnit->assume_score }} คะแนน)
            </h3>
            <hr>
            <div>
                <a href="/sub-unit-system/room-subject-unit-work-config.php" class="btn btn-warning rounded-pill">
                    <i class="fa-solid fa-gear"></i>
                    <span>จัดการการมอบหมายงาน</span>
                </a>
            </div>
            <div class="d-flex flex-column gap-3 mt-4">
                @foreach ($assignments as $assignment)
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <a href="/sub-unit-system/room-subject-unit-work.php" class="text-decoration-none">
                                        <h5 class="card-title">
                                            งานชิ้นที่ {{ $loop->iteration }} {{ $assignment->title }}
                                        </h5>
                                    </a>
                                    <h6 class="card-subtitle text-secondary">
                                        มอบหมายเมื่อ
                                        {{ Carbon::parse($assignment->assigned_date)->translatedFormat('j F') }}
                                        {{ Carbon::parse($assignment->assigned_date)->year + 543 }}
                                    </h6>
                                </div>
                                <div>
                                    ({{ $assignment->max_score }} คะแนน)
                                </div>
                            </div>
                            <hr>
                            <div>
                                {{ $assignment->description }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <hr>
            <div class="table-responsive overflow-visible">
                <table id="data-table-student" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>เลขที่</th>
                            <th>รหัสนักเรียน</th>
                            <th>ชื่อจริง - นามสกุล</th>
                            <th>สถานะการขาด-ส่งงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $student->student_code }}</td>
                                <td>{{ $student->prefix }} {{ $student->first_name }} {{ $student->last_name }}</td>
                                <td>
                                    @foreach ($assignments as $assignment)
                                        @php
                                            $submission = $submissions[$student->id][$assignment->id] ?? null;
                                        @endphp

                                        @if ($submission && $submission['submission'] && $submission['actual_score'])
                                            <span class="text-success">
                                                {{ $submission['actual_score'] }} / {{ $submission['max_score'] }}
                                                คะแนน
                                            </span>
                                        @else
                                            <span class="text-danger">ยังไม่ส่ง</span>
                                        @endif
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')

</body>

</html>
