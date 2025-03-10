<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <h1>
                    การจัดการนักเรียน
                </h1>

                <div class="d-flex justify-content-end">
                    {{-- <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createStudentModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มนักเรียน
                    </div> --}}
                    <a href="{{ route('student-management-add') }}" class="btn btn-success ms-2">
                        <i class="fa-solid fa-user-plus"></i> เพิ่มนักเรียน
                    </a>
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
                    <table id="table_student_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>รหัสนักเรียน</th>
                                <th>ห้องเรียน</th>
                                <th>ชื่อจริง-นามสกุล</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->student_code }}</td>
                                    <td>{{ optional($student->classroom)->classroom_label ?? 'N/A' }}</td>
                                    <td>{{ $student->prefix }} {{ $student->first_name }} {{ $student->last_name }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item text-warning"
                                                        href="{{ route('student-management-edit.edit', $student->id) }}">
                                                        <i class="fa-solid fa-pen"></i> แก้ไข</a>
                                                </li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteStudentModal"
                                                        data-student-id="{{ $student->id }}">
                                                        <i class="fa-solid fa-trash"></i> ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                {{-- <div class="modal fade" id="updateStudentModal{{ $student->id }}" tabindex="-1"
                                    aria-labelledby="updateStudentModalLabel{{ $student->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="updateStudentModalLabel{{ $student->id }}">
                                                    Update Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-student-update', $student->id) }}">
                                                    @csrf

                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="email" class="form-label">Email</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" value="{{ $student->email }}" required>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="phone" class="form-label">Phone</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" value="{{ $student->phone }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="student_id" class="form-label">Student
                                                                code</label>
                                                            <input type="text" class="form-control" name="student_id"
                                                                id="student_id" value="{{ $student->student_code }}"
                                                                required>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="prefix" class="form-label">Prefix</label>
                                                            <select class="form-select" name="prefix" id="prefix">
                                                                <option value="นาย"
                                                                    {{ $student->prefix == 'นาย' ? 'selected' : '' }}>
                                                                    นาย</option>
                                                                <option value="นางสาว"
                                                                    {{ $student->prefix == 'นางสาว' ? 'selected' : '' }}>
                                                                    นางสาว</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="first_name" class="form-label">First
                                                                Name</label>
                                                            <input type="text" class="form-control" name="first_name"
                                                                id="first_name" value="{{ $student->first_name }}"
                                                                required>
                                                        </div>

                                                        <div class="w-100 mb-3">
                                                            <label for="last_name" class="form-label">Last
                                                                Name</label>
                                                            <input type="text" class="form-control" name="last_name"
                                                                id="last_name" value="{{ $student->last_name }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-warning">แก้ไขรายละเอียด</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </section>
    </main>
    <div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteStudentModalLabel">ยืนยันการลบข้อมูลนักเรียน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนักเรียนคนนี้?
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteStudentForm" action="">
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
        new DataTable('#table_student_management');

        // $('[data-bs-target="#deleteStudentModal"]').each(function() {
        //     $(this).on('click', function() {
        //         const studentId = $(this).data('student-id');
        //         const form = $('#deleteStudentModal');
        //         form.attr('action', `/backoffice/student-management/delete/${studentId}`);
        //     });
        // });

        $(document).on('click', '[data-bs-target="#deleteStudentModal"]', function() {
            const studentId = $(this).data('student-id');
            const form = $('#deleteStudentForm');
            form.attr('action', `/backoffice/student-management/delete/${studentId}`);
        });
    </script>
</body>

</html>
