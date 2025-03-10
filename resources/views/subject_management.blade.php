<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Management{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <h1>
                    การจัดการวิชา
                </h1>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createSubjectModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มวิชา
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
                    <table id="table_subject_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>รหัสวิชา</th>
                                <th>วิชา</th>
                                <th>ชั้นเรียน</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subjects as $subject)
                                <tr>
                                    <td>{{ $subject->subject_code }}</td>
                                    <td>{{ $subject->subject_title }}</td>
                                    <td>{{ $subject->grades }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-info"
                                                        href="{{ route('route-subject-management.detail', $subject->id) }}"><i
                                                            class="fa-solid fa-pen"></i> ดูรายละเอียดวิชา</a></li>
                                                <li><a class="dropdown-item text-warning" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateSubjectModal{{ $subject->id }}"><i
                                                            class="fa-solid fa-pen"></i> แก้ไข</a></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteSubjectModal"
                                                        data-subject-id="{{ $subject->id }}">
                                                        <i class="fa-solid fa-trash"></i> ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateSubjectModal{{ $subject->id }}" tabindex="-1"
                                    aria-labelledby="updateSubjectModalLabel{{ $subject->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="updateSubjectModalLabel{{ $subject->id }}">
                                                    แก้ไขวิชา</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-subject-update', $subject->id) }}">
                                                    @csrf
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="role" class="form-label">ระดับชั้น</label>
                                                            <select class="form-select" name="grades" id="grades">
                                                                @foreach ($grades as $grade)
                                                                    <option value="{{ $grade->grade_label }}"
                                                                        {{ $subject->grades == $grade->grade_label ? 'selected' : '' }}>
                                                                        {{ $grade->grade_label }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="subject_code"
                                                                class="form-label">รหัสวิชา</label>
                                                            <input type="text" class="form-control"
                                                                name="subject_code" id="subject_code"
                                                                value="{{ $subject->subject_code }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="subject_title"
                                                                class="form-label">ชื่อวิชา</label>
                                                            <input type="subject_title" class="form-control"
                                                                name="subject_title" id="subject_title"
                                                                value="{{ $subject->subject_title }}" required>
                                                        </div>
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

    <div class="modal fade" id="createSubjectModal" tabindex="-1" aria-labelledby="createSubjectModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createSubjectModalLabel">เพิ่มวิชา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('route-subject-create') }}">
                        @csrf
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="role" class="form-label">ระดับชั้น</label>
                                <select class="form-select" name="grades" id="grades" required>
                                    @foreach ($grades as $grade)
                                        <option value="{{ $grade->grade_label }}">{{ $grade->grade_label }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="w-100 mb-3">
                                <label for="subject_code" class="form-label">รหัสวิชา</label>
                                <input type="text" class="form-control" name="subject_code" id="subject_code"
                                    required>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="subject_title" class="form-label">ชื่อวิชา</label>
                                <input type="text" class="form-control" name="subject_title" id="subject_title"
                                    required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteSubjectModal" tabindex="-1" aria-labelledby="deleteSubjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteSubjectModalLabel">ยืนยันการลบวิชา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณแน่ใจหรือไม่ว่าต้องการลบวิชานี้?
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteUserForm" action="">
                        @csrf
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-danger">ลบ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('partials.script')
    <script>
        new DataTable('#table_subject_management');

        $('[data-bs-target="#deleteSubjectModal"]').each(function() {
            $(this).on('click', function() {
                const subjectId = $(this).data('subject-id');
                const form = $('#deleteUserForm');
                form.attr('action', `/backoffice/subject-management/delete/${subjectId}`);
            });
        });
    </script>

</body>

</html>
