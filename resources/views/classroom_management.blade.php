<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom Management{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <h1>
                    การจัดการห้องเรียน
                </h1>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createClassroomModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มห้องเรียน
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
                    <table id="table_classroom_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ชั้นปีการศึกษา</th>
                                <th>ห้องเรียนที่</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $gradeMapping = [
                                    'ม.1' => 'ชั้นมัธยมศึกษาปีที่ 1',
                                    'ม.2' => 'ชั้นมัธยมศึกษาปีที่ 2',
                                    'ม.3' => 'ชั้นมัธยมศึกษาปีที่ 3',
                                    'ม.4' => 'ชั้นมัธยมศึกษาปีที่ 4',
                                    'ม.5' => 'ชั้นมัธยมศึกษาปีที่ 5',
                                    'ม.6' => 'ชั้นมัธยมศึกษาปีที่ 6',
                                ];
                            @endphp
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>
                                        {{ $gradeMapping[optional($classroom->grade)->grade_label] ?? (optional($classroom->grade)->grade_label ?? 'N/A') }}
                                    </td>
                                    <td>
                                        {{ $classroom->classroom_label }}
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-warning" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateClassroomModal{{ $classroom->id }}"><i
                                                            class="fa-solid fa-pen"></i>แก้ไข</a></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteClassroomModal"
                                                        data-classroom-id="{{ $classroom->id }}">
                                                        <i class="fa-solid fa-trash"></i>ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateClassroomModal{{ $classroom->id }}" tabindex="-1"
                                    aria-labelledby="updateClassroomModalLabel{{ $classroom->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="updateClassroomModalLabel{{ $classroom->id }}">
                                                    แก้ไขห้องเรียน</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-classroom-update', $classroom->id) }}">
                                                    @csrf

                                                    <select class="form-control" name="grade_id" id="grade"
                                                        required>
                                                        @foreach ($grades as $grade)
                                                            <option value="{{ $grade->id }}"
                                                                {{ $classroom->grade_id == $grade->id ? 'selected' : '' }}>
                                                                {{ $gradeMapping[$grade->grade_label] ?? $grade->grade_label }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="mb-3">
                                                        <label for="classroom_label"
                                                            class="form-label">ชื่อห้องเรียน</label>
                                                        <input type="text" class="form-control"
                                                            name="classroom_label" id="classroom_label"
                                                            value="{{ $classroom->classroom_label }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
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
    {{-- <pre>{{ json_encode($grades) }}</pre> --}}
    <div class="modal fade" id="createClassroomModal" tabindex="-1" aria-labelledby="createClassroomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createClassroomModalLabel">เพิ่มห้องเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('route-classroom-create') }}">
                        @csrf
                        {{-- <div class="mb-3">
                            <label for="grade" class="form-label">Grade</label>
                            <input type="text" class="form-control" name="grade" id="grade" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="grade" class="form-label">เลือกชั้นเรียน</label>
                            <select class="form-control" name="grade_id" id="grade_id" required>
                                <option value="" disabled selected>เลือกชั้นเรียน</option>
                                @foreach ($grades as $grade)
                                    <option value="{{ $grade->id }}">
                                        {{ $gradeMapping[$grade->grade_label] ?? $grade->grade_label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="classroom_label" class="form-label">ชื่อห้องเรียน</label>
                            <input type="text" class="form-control" name="classroom_label" id="classroom_label"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteClassroomModal" tabindex="-1" aria-labelledby="deleteClassroomModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteClassroomModalLabel">ยืนยันการลบห้องเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณแน่ใจหรือไม่ว่าต้องการลบห้องเรียนนี้?
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteClassroomForm" action="">
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
        new DataTable('#table_classroom_management');

        // $('[data-bs-target="#deleteClassroomModal"]').each(function() {
        //     $(this).on('click', function() {
        //         const classroomId = $(this).data('classroom-id');
        //         const form = $('#deleteClassroomForm');
        //         form.attr('action', `/backoffice/classroom-management/delete/${classroomId}`);
        //     });
        // });

        $(document).on('click', '[data-bs-target="#deleteClassroomModal"]', function() {
            const classroomId = $(this).data('classroom-id');
            const form = $('#deleteClassroomForm');
            form.attr('action', `/backoffice/classroom-management/delete/${classroomId}`);
        });
    </script>
</body>

</html>
