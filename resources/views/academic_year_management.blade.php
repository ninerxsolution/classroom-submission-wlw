<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Year Management{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <h1>
                    การจัดการปีการศึกษา
                </h1>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createYearModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มปีการศึกษา
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
                    <table id="table_academic_year_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ปีการศึกษา</th>
                                <th>ภาคเรียน</th>
                                <th>เริ่มต้นเมื่อ</th>
                                <th>สิ้นสุดเมื่อ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                use Carbon\Carbon;
                                Carbon::setLocale('th');
                            @endphp

                            @foreach ($academic_year as $year)
                                <tr>
                                    <td>{{ $year->year_label + 543 }}</td>
                                    <td>{{ $year->year_semester }}</td>
                                    <td>{{ Carbon::parse($year->start_date)->translatedFormat('j F') }}
                                        {{ Carbon::parse($year->start_date)->year + 543 }}</td>
                                    <td>{{ Carbon::parse($year->end_date)->translatedFormat('j F') }}
                                        {{ Carbon::parse($year->end_date)->year + 543 }}</td>

                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-warning" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateClassroomModal{{ $year->id }}"><i
                                                            class="fa-solid fa-pen"></i> แก้ไข</a></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteClassroomModal"
                                                        data-year-id="{{ $year->id }}">
                                                        <i class="fa-solid fa-trash"></i> ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateClassroomModal{{ $year->id }}" tabindex="-1"
                                    aria-labelledby="updateClassroomModalLabel{{ $year->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"
                                                    id="updateClassroomModalLabel{{ $year->id }}">
                                                    แก้ไขปีการศึกษา</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-academic_year-update', $year->id) }}">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label for="year_label" class="form-label">ปีการศึกษา</label>
                                                        <input type="number" class="form-control" name="year_label"
                                                            id="year_label" value="{{ $year->year_label + 543 }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="year_semester" class="form-label">ภาคเรียน</label>
                                                        <select class="form-control" name="year_semester"
                                                            id="year_semester" required>
                                                            <option value="1"
                                                                {{ $year->year_semester == 1 ? 'selected' : '' }}>1
                                                            </option>
                                                            <option value="2"
                                                                {{ $year->year_semester == 2 ? 'selected' : '' }}>2
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="start_date"
                                                            class="form-label">วันที่เริ่มต้น</label>
                                                        <input type="date" class="form-control" name="start_date"
                                                            id="start_date"
                                                            value="{{ Carbon::parse($year->start_date)->format('Y-m-d') }}"
                                                            required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="end_date" class="form-label">วันที่สิ้นสุด</label>
                                                        <input type="date" class="form-control" name="end_date"
                                                            id="end_date"
                                                            value="{{ Carbon::parse($year->end_date)->format('Y-m-d') }}"
                                                            required>
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


    <div class="modal fade" id="createYearModal" tabindex="-1" aria-labelledby="createYearModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createYearModalLabel">เพิ่มปีการศึกษา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('route-academic_year-create') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="year_label" class="form-label">ปีการศึกษา</label>
                            <input type="number" class="form-control" name="year_label" id="year_label" required>
                        </div>
                        <div class="mb-3">
                            <label for="year_semester"
                                class="form-label
                                ">ภาคเรียน</label>
                            <select class="form-control" name="year_semester" id="year_semester" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="start_date" class="form-label">วันที่เริ่มต้น</label>
                            <input type="date" class="form-control" name="start_date" id="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">วันที่สิ้นสุด</label>
                            <input type="date" class="form-control" name="end_date" id="end_date" required>
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
                    <h5 class="modal-title" id="deleteClassroomModalLabel">ยืนยันการลบปีการศึกษา</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณต้องการลบปีการศึกษานี้หรือไม่?
                </div>
                <div class="modal-footer">
                    <form method="POST" id="deleteYearForm" action="">
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
        new DataTable('#table_academic_year_management');

        $('[data-bs-target="#deleteClassroomModal"]').each(function() {
            $(this).on('click', function() {
                const yearId = $(this).data('year-id');
                const form = $('#deleteYearForm');
                form.attr('action', `/backoffice/academic_year-management/delete/${yearId}`);
            });
        });
    </script>
</body>

</html>
