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

            {{-- {{ $teachingAssignment->id }} --}}

            {{-- {{ $students }} --}}

            {{-- {{ $subject }} --}}

            {{-- {{ $learningUnits }} --}}


            {{-- @foreach ($submissions as $submissionData)
                <div>
                    <h5>Student: {{ $submissionData['student']->name }}</h5>
                    <p>Assignment: {{ $submissionData['assignment']->assignment_title }}</p>
                    <p>Score: {{ $submissionData['submission']->actual_score }}</p>
                    <p>Status: {{ $submissionData['submission']->submit_status == 'y' ? 'Submitted' : 'Not Submitted' }}
                    </p>
                </div>
            @endforeach --}}


            <div class="title d-flex justify-content-between align-items-baseline">
                <h1>
                    ห้องเรียน {{ $classroom->classroom_label }}
                </h1>
                <h2>
                    ในวิชา {{ $subject->subject_title }}
                </h2>
            </div>
            <hr>
            @foreach ($learningUnits as $unit)
                <h3>
                    หน่วยการเรียนรู้ที่ {{ $loop->iteration }} {{ $unit->unit_title }} ({{ $unit->assume_score }} คะแนน)
                </h3>
                <div>
                    @foreach ($unit->subLearningUnits as $subUnit)
                        <div class="d-flex justify-content-between my-3">
                            <div>
                                <a href="{{ route('route-teacher-rooms-subject-assignment', ['teachingAssignmentId' => $teachingAssignment->id, 'unitId' => $unit->id, 'subUnitId' => $subUnit->id]) }}"
                                    class="text-decoration-none">
                                    <span class="fw-bold">{{ $subUnit->sub_unit_title }} ({{ $subUnit->assume_score }}
                                        คะแนน) </span>
                                </a>
                                <ul>
                                    @foreach ($subUnit->assignments as $assignment)
                                        <li class="text-dark my-2">
                                            {{ $assignment->title }} ({{ $assignment->max_score }} คะแนน)
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div>
                                <span class="text-dark">
                                    มอบมาย {{ $subUnit->assignments_count }} งาน
                                </span>
                            </div>
                        </div>
                    @endforeach

                </div>
            @endforeach

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
                                    @if ($student->all_completed)
                                        <div class="btn btn-sm btn-success rounded-4" style="cursor: context-menu;">
                                            ส่งครบ
                                        </div>
                                    @else
                                        <div class="btn btn-sm btn-warning rounded-4" style="cursor: context-menu;">
                                            ยังไม่ครบ
                                        </div>
                                    @endif
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
