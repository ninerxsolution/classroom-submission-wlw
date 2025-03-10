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

                <div class="d-flex justify-content-between align-items-end mb-4">
                    <h1>
                        วิชา {{ $subjects->subject_title }}, <br> รหัสวิชา {{ $subjects->subject_code }}, ระดับชั้น
                        {{ $subjects->grades }}
                    </h1>
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUnitModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มหน่วยการเรียนรู้
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

                @foreach ($learning_units as $unit)
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex gap-3 align-items-center">
                                    <h4>{{ $unit->unit_title }}</h4>
                                    <div>(คะแนน {{ $unit->assume_score }})</div>
                                </div>
                                <div class="d-flex gap-3">
                                    <a class="text-warning text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#editUnitModal{{ $unit->id }}">
                                        <i class="fa-solid fa-pen"></i> แก้ไข
                                    </a>
                                    <a class="text-danger text-decoration-none" data-bs-toggle="modal"
                                        data-bs-target="#deleteUnitModal{{ $unit->id }}">
                                        <i class="fa-solid fa-trash"></i> ลบ
                                    </a>
                                </div>
                            </div>
                            <div class="text-secondary mb-3">{{ $unit->unit_description }}</div>
                            <hr>
                            <div class="btn btn-warning mb-3" data-bs-toggle="modal"
                                data-bs-target="#createSubUnitModal">
                                <i class="fa-solid fa-plus"></i> เพิ่มหน่วยการเรียนรู้ย่อย
                            </div>

                            <div class="modal fade" id="createSubUnitModal" tabindex="-1"
                                aria-labelledby="createSubUnitModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                    <div class="modal-content">

                                        <div class="modal-header">
                                            <h5 class="modal-title" id="createSubUnitModalLabel">
                                                เพิ่มหน่วยการเรียนรู้ย่อย</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <form method="POST"
                                                action="{{ route('route-sub-learning-unit.create') }}">
                                                @csrf
                                                <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                                                <input type="hidden" name="subject_id" value="{{ $subjects->id }}">
                                                <div class="d-flex gap-3">
                                                    <div class="w-100 mb-3">
                                                        <label for="Learning unit title"
                                                            class="form-label">ชื่อหน่วยการเรียนรู้ย่อย</label>
                                                        <input type="text" class="form-control" name="sub_unit_title"
                                                            id="" required>
                                                    </div>
                                                </div>

                                                <div class="d-flex gap-3">
                                                    <div class="w-100 mb-3">
                                                        <label for="sub_unit_description"
                                                            class="form-label">คำอธิบายหน่วยการเรียนรู้ย่อย</label>
                                                        <textarea class="form-control" name="sub_unit_description" id="sub_unit_description" rows="4" required></textarea>
                                                    </div>
                                                </div>

                                                <div class="w-100 mb-3">
                                                    <label for="assume score" class="form-label">กำหนดคะแนน</label>
                                                    <input type="number" class="form-control" name="assume_score"
                                                        id="">
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-success">เพิ่มหน่วยกาเรียนย่อย</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if (isset($grouped_sub_learning_units[$unit->id]))
                                @foreach ($grouped_sub_learning_units[$unit->id] as $sub_unit)
                                    <div class="mb-3">
                                        <div class="d-flex gap-3">
                                            <h5>{{ $sub_unit->sub_unit_title }}</h5>
                                            <div>(คะแนน {{ $sub_unit->assume_score }})</div>
                                            <a class="text-warning text-decoration-none" data-bs-toggle="modal"
                                                data-bs-target="#editSubUnitModal{{ $sub_unit->id }}">
                                                <i class="fa-solid fa-pen"></i> แก้ไข
                                            </a>
                                            <a class="text-danger text-decoration-none" data-bs-toggle="modal"
                                                data-bs-target="#deleteSubUnitModal{{ $sub_unit->id }}">
                                                <i class="fa-solid fa-trash"></i> ลบ
                                            </a>
                                        </div>
                                        <div class="text-secondary">{{ $sub_unit->sub_unit_description }}</div>
                                    </div>

                                    <div class="modal fade" id="editSubUnitModal{{ $sub_unit->id }}" tabindex="-1"
                                        aria-labelledby="editSubUnitModalLabel" aria-hidden="true">

                                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">แก้ไขหน่วยการเรียนรู้ย่อย</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>

                                                <div class="modal-body">
                                                    <form method="POST"
                                                        action="{{ route('route-sub-learning-unit.update', $sub_unit->id, $sub_unit->unit_id) }}">
                                                        @csrf
                                                        <input type="hidden" name="unit_id"
                                                            value="{{ $unit->id }}">
                                                        <input type="hidden" name="subject_id"
                                                            value="{{ $subjects->id }}">
                                                        <div class="w-100 mb-3">
                                                            <label for="sub_unit_title_{{ $sub_unit->id }}"
                                                                class="form-label">ชื่อหน่วยการเรียนรู้ย่อย</label>
                                                            <input type="text" class="form-control"
                                                                name="sub_unit_title"
                                                                id="sub_unit_title_{{ $sub_unit->id }}"
                                                                value="{{ $sub_unit->sub_unit_title }}" required>
                                                        </div>

                                                        <div class="w-100 mb-3">
                                                            <label for="sub_unit_description_{{ $sub_unit->id }}"
                                                                class="form-label">คำอธิบายหน่วยการเรียนรู้</label>
                                                            <textarea class="form-control" name="sub_unit_description" id="sub_unit_description_{{ $sub_unit->id }}"
                                                                rows="4" required>{{ $sub_unit->sub_unit_description }}</textarea>
                                                        </div>

                                                        <div class="w-100 mb-3">
                                                            <label for="assume_score_{{ $sub_unit->id }}"
                                                                class="form-label">กำหนดคะแนนe</label>
                                                            <input type="number" class="form-control"
                                                                name="assume_score"
                                                                id="assume_score_{{ $sub_unit->id }}"
                                                                value="{{ $sub_unit->assume_score }}">
                                                        </div>

                                                        <button type="submit"
                                                            class="btn btn-success">บันทึกการแก้ไข</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal fade" id="deleteSubUnitModal{{ $sub_unit->id }}"
                                        tabindex="-1" aria-labelledby="deleteSubUnitModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">ยืนยันการลบหน่วยการเรียนรู้ย่อย</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    คุณแน่ใจหรือไม่ว่าต้องการลบหน่วยการเรียนรู้ย่อยนี้?
                                                </div>
                                                <div class="modal-footer">
                                                    <form method="POST"
                                                        action="{{ route('route-sub-learning-unit.delete', $sub_unit->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">ยกเลิก</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="modal fade" id="deleteUnitModal{{ $unit->id }}" tabindex="-1"
                        aria-labelledby="deleteUnitModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">ยืนยันการลบหน่วยการเรียนรู้</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    คุณแน่ใจหรือไม่ว่าต้องการลบหน่วยการเรียนรู้นี้?
                                </div>
                                <div class="modal-footer">
                                    <form method="POST"
                                        action="{{ route('route-learning-unit.delete', $unit->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">ลบ</button>
                                    </form>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">ยกเลิก</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="editUnitModal{{ $unit->id }}" tabindex="-1"
                        aria-labelledby="editUnitModalLabel" aria-hidden="true">

                        <div class="modal-dialog modal-dialog-scrollable modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">แก้ไขหน่วยการเรียนรู้</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">
                                    <form method="POST"
                                        action="{{ route('route-learning-unit.update', $unit->id) }}">
                                        @csrf

                                        <div class="w-100 mb-3">
                                            <label for="unit_title_{{ $unit->id }}"
                                                class="form-label">ชื่อหน่วยการเรียนรู้</label>
                                            <input type="text" class="form-control" name="unit_title"
                                                id="unit_title_{{ $unit->id }}" value="{{ $unit->unit_title }}"
                                                required>
                                        </div>

                                        <div class="w-100 mb-3">
                                            <label for="unit_description_{{ $unit->id }}"
                                                class="form-label">คำอธิบายหน่วยการเรียนรู้</label>
                                            <textarea class="form-control" name="unit_description" id="unit_description_{{ $unit->id }}" rows="4"
                                                required>{{ $unit->unit_description }}</textarea>
                                        </div>

                                        <div class="w-100 mb-3">
                                            <label for="assume_score_{{ $unit->id }}"
                                                class="form-label">กำหนดคะแนน</label>
                                            <input type="number" class="form-control" name="assume_score"
                                                id="assume_score_{{ $unit->id }}"
                                                value="{{ $unit->assume_score }}">
                                        </div>

                                        <button type="submit" class="btn btn-success">บันทึกการแก้ไข</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



            </div>
        </section>
    </main>

    <div class="modal fade" id="createUnitModal" tabindex="-1" aria-labelledby="createUnitModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createUnitModalLabel">เพิ่มหน่วยการเรียนรู้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('route-learning-unit.create') }}">
                        @csrf
                        <input type="hidden" name="subject_id" value="{{ $subjects->id }}">
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="Learning unit title" class="form-label">ชื่อหน่วยการเรียนรู้</label>
                                <input type="text" class="form-control" name="unit_title"
                                    id="Learning unit title" required>
                            </div>
                        </div>

                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="unit_description" class="form-label">คำอธิบายหน่วยการเรียนรู้</label>
                                <textarea class="form-control" name="unit_description" id="unit_description" rows="4" required></textarea>
                            </div>
                        </div>

                        <div class="w-100 mb-3">
                            <label for="assume score" class="form-label">กำหนดคะแนน</label>
                            <input type="number" class="form-control" name="assume_score" id="assume score">
                        </div>
                        <button type="submit" class="btn btn-success">เพิ่มหน่วยกาเรียน</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @include('partials.script')
    <script>
        new DataTable('#table_employee_management');
    </script>
</body>

</html>
