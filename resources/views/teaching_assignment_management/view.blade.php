<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <h1>
                    มอบหมายการสอน {{ $user->prefix }} {{ $user->first_name }} {{ $user->last_name }}
                </h1>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTeachingModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มการสอน
                    </div>
                </div>

                @if ($errors->any())
                    <div class="error mt-3">
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="table_teaching_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ห้องเรียน</th>
                                <th>วิชา</th>
                                <th>ปีการศึกษา</th>
                                <th>เทอม</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teachingAssignments as $assignment)
                                <tr>
                                    <td>{{ $assignment->classroom_label }}</td>
                                    <td>{{ $assignment->subject_title }} | {{ $assignment->subject_id }}</td>
                                    <td>{{ $assignment->year_label + 543 }}</td>
                                    <td>{{ $assignment->year_semester }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-warning" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateTeachingModal{{ $assignment->id }}"><i
                                                            class="fa-solid fa-pen"></i>แก้ไข</a></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteTeachingModal"
                                                        data-teaching-id="{{ $assignment->id }}">
                                                        <i class="fa-solid fa-trash"></i>ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateTeachingModal{{ $assignment->id }}" tabindex="-1"
                                    aria-labelledby="updateTeachingModalLabel{{ $assignment->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="updateTeachingModalLabel{{ $assignment->id }}">
                                                    แก้ไขห้องเรียน </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-teaching-assignment-update', $assignment->id) }}">
                                                    @csrf
                                                    <input type="hidden" name="year_id"
                                                        value="{{ $latestAcademicYear->id }}">
                                                    <input type="hidden" name="teacher_id"
                                                        value="{{ $user->id }}">

                                                    <div class="w-100 mb-3">
                                                        <label for="classroom_id" class="form-label">ห้องเรียน</label>
                                                        <select class="form-select" name="classroom_id"
                                                            id="classroom_id" required>
                                                            @foreach ($classrooms as $classroom)
                                                                <option value="{{ $classroom->id }}"
                                                                    {{ $assignment->classroom_id == $classroom->id ? 'selected' : '' }}>
                                                                    {{ $classroom->classroom_label }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="w-100 mb-3">
                                                        <label for="subject_id" class="form-label">วิชา</label>
                                                        <select class="form-select" name="subject_id" id="subject_id"
                                                            required>
                                                            @foreach ($subjects as $subject)
                                                                <option value="{{ $subject->id }}"
                                                                    {{ $assignment->subject_id == $subject->id ? 'selected' : '' }}>
                                                                    {{ $subject->subject_title }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-warning">บันทึก</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>


    <div class="modal fade" id="createTeachingModal" tabindex="-1" aria-labelledby="createTeachingModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createTeachingModalLabel">สร้างห้องเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('route-teaching-assignment-create') }}">
                        @csrf
                        <input type="hidden" name="teacher_id" value="{{ $user->id }}">
                        <input type="hidden" name="year_id" value="{{ $latestAcademicYear->id }}">

                        <div class="w-100 mb-3">
                            <label for="classroom_id" class="form-label">ห้องเรียน</label>
                            <select class="form-select" name="classroom_id" id="classroom_id" required>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}">
                                        {{ $classroom->classroom_label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="w-100 mb-3">
                            <label for="subject_id" class="form-label">วิชา</label>
                            <select class="form-select" name="subject_id" id="subject_id" required>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->subject_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success">เพิ่มการสอน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteTeachingModal" tabindex="-1" aria-labelledby="deleteTeachingModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteTeachingModalLabel">ยืนยันการลบห้องเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณแน่ใจหรือไม่ว่าต้องการลบห้องเรียนนี้?
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteTeachingForm" action="">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('partials.script')
    <script>
        new DataTable('#table_teaching_management');

        // $('[data-bs-target="#deleteTeachingModal"]').each(function() {
        //     $(this).on('click', function() {
        //         const teachingId = $(this).data('teaching-id');
        //         const form = $('#deleteTeachingForm');
        //         form.attr('action', `/backoffice/teaching-assignment-management/delete/${teachingId}`);
        //     });
        // });

        $(document).on('click', '[data-bs-target="#deleteTeachingModal"]', function() {
            const teachingId = $(this).data('teaching-id');
            const form = $('#deleteTeachingForm');
            form.attr('action', `/backoffice/teaching-assignment-management/delete/${teachingId}`);
        });
    </script>
</body>

</html>
