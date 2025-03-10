<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management Edit{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid">
                <hr>
                <h3>แก้ไขข้อมูล {{ $student->prefix }} {{ $student->first_name }} {{ $student->last_name }}</h3>
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
                <form method="POST" action="{{ route('route-student-update', $student->id) }}">
                    @csrf
                    <div class="d-flex gap-3">
                        <div class="w-100 mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input type="email" class="form-control" name="email" id="email"
                                value="{{ $student->email }}" required>
                        </div>
                        <div class="w-100 mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="text" class="form-control" name="phone" id="phone"
                                value="{{ $student->phone }}" required>
                        </div>
                    </div>
                    <div class="w-100 mb-3">
                        <label for="student_code" class="form-label">รหัสนักเรียน</label>
                        <input type="text" class="form-control" name="student_code" id="student_code"
                            value="{{ $student->student_code }}" required>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="w-100 mb-3">
                            <label for="classroom_id" class="form-label">ห้องเรียน</label>
                            <select class="form-control" name="classroom_id" id="classroom_id" required>
                                @foreach ($classrooms as $classroom)
                                    <option value="{{ $classroom->id }}"
                                        {{ $student->classroom_id == $classroom->id ? 'selected' : '' }}>
                                        {{ $classroom->classroom_label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="w-100 mb-3">
                            <label for="prefix" class="form-label">คำนำหน้า</label>
                            <select class="form-select" name="prefix" id="prefix">
                                <option value="นาย" {{ $student->prefix == 'นาย' ? 'selected' : '' }}>
                                    นาย</option>
                                <option value="นางสาว" {{ $student->prefix == 'นางสาว' ? 'selected' : '' }}>
                                    นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-3">
                        <div class="w-100 mb-3">
                            <label for="first_name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" name="first_name" id="first_name"
                                value="{{ $student->first_name }}" required>
                        </div>

                        <div class="w-100 mb-3">
                            <label for="last_name" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" name="last_name" id="last_name"
                                value="{{ $student->last_name }}" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-warning">บันทึก</button>
                </form>


            </div>
        </section>
    </main>

    @include('partials.script')
    <script></script>
</body>

</html>
