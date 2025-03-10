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
                    การจัดการบุคลากร
                </h1>
                <div class="d-flex justify-content-end">
                    <div class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUserModal">
                        <i class="fa-solid fa-plus"></i> เพิ่มบัญชีผู้ใช้
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
                    <table id="table_employee_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>บทบาท</th>
                                <th>รหัสผู้สอน</th>
                                <th>ชื่อจริง-นามสกุล</th>
                                <th>ตำแหน่ง</th>
                                <th>เบอร์ติดต่อ</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->user_code }}</td>
                                    <td>{{ $user->prefix }} {{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->position }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-outline-warning" href="#" role="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-gear"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item text-warning" href="#"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#updateUserModal{{ $user->id }}"><i
                                                            class="fa-solid fa-pen"></i> แก้ไข</a></li>
                                                <li>
                                                    <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#deleteUserModal"
                                                        data-user-id="{{ $user->id }}">
                                                        <i class="fa-solid fa-trash"></i> ลบ
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <div class="modal fade" id="updateUserModal{{ $user->id }}" tabindex="-1"
                                    aria-labelledby="updateUserModalLabel{{ $user->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateUserModalLabel{{ $user->id }}">
                                                    แก้ไขบัญชี</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST"
                                                    action="{{ route('route-employee-update', $user->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="role" class="form-label">บทบาท</label>
                                                            <select class="form-select" name="role" id="role">
                                                                <option value="SUPER_ADMIN"
                                                                    {{ $user->role == 'SUPER_ADMIN' ? 'selected' : '' }}>
                                                                    SUPER_ADMIN</option>
                                                                <option value="ADMIN"
                                                                    {{ $user->role == 'ADMIN' ? 'selected' : '' }}>
                                                                    ADMIN
                                                                </option>
                                                                <option value="TEACHER"
                                                                    {{ $user->role == 'TEACHER' ? 'selected' : '' }}>
                                                                    TEACHER</option>
                                                            </select>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="username"
                                                                class="form-label">ชื่อผู้ใช้งาน</label>
                                                            <input type="text" class="form-control" name="username"
                                                                id="username" value="{{ $user->username }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 mb-3">
                                                        <label for="password" class="form-label">รหัสผ่าน</label>
                                                        <input type="password" class="form-control" name="password"
                                                            id="password">
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="email" class="form-label">อีเมล</label>
                                                            <input type="email" class="form-control" name="email"
                                                                id="email" value="{{ $user->email }}" required>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="phone"
                                                                class="form-label">หมายเลขโทรศัพท์</label>
                                                            <input type="text" class="form-control" name="phone"
                                                                id="phone" value="{{ $user->phone }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="user_code" class="form-label">User ID</label>
                                                            <input type="text" class="form-control"
                                                                name="user_code" id="user_code"
                                                                value="{{ $user->user_code }}" required>
                                                        </div>
                                                        <div class="w-100 mb-3">
                                                            <label for="prefix"
                                                                class="form-label">คำนำหน้าชื่อ</label>
                                                            <select class="form-select" name="prefix"
                                                                id="prefix">
                                                                <option value="นาย"
                                                                    {{ $user->prefix == 'นาย' ? 'selected' : '' }}>
                                                                    นาย</option>
                                                                <option value="นาง"
                                                                    {{ $user->prefix == 'นาง' ? 'selected' : '' }}>
                                                                    นาง
                                                                </option>
                                                                <option value="นางสาว"
                                                                    {{ $user->prefix == 'นางสาว' ? 'selected' : '' }}>
                                                                    นางสาว</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex gap-3">
                                                        <div class="w-100 mb-3">
                                                            <label for="first_name" class="form-label">ชื่อ</label>
                                                            <input type="text" class="form-control"
                                                                name="first_name" id="first_name"
                                                                value="{{ $user->first_name }}" required>
                                                        </div>

                                                        <div class="w-100 mb-3">
                                                            <label for="last_name" class="form-label">นามสกุล</label>
                                                            <input type="text" class="form-control"
                                                                name="last_name" id="last_name"
                                                                value="{{ $user->last_name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="w-100 mb-3">
                                                        <label for="position" class="form-label">ตำแหน่งงาน</label>
                                                        <input type="text" class="form-control" name="position"
                                                            id="position" value="{{ $user->position }}" required>
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

    <div class="modal fade" id="createUserModal" tabindex="-1" aria-labelledby="createUserModalLabel"
        aria-hidden="true">

        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">สร้างบัญชีผู้ใช้</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('route-employee-create') }}">
                        @csrf
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="role" class="form-label">บทบาท</label>
                                <select class="form-select" name="role" id="role" required>
                                    <option value="SUPER_ADMIN">SUPER_ADMIN</option>
                                    <option value="ADMIN">ADMIN</option>
                                    <option value="TEACHER">TEACHER</option>
                                </select>
                            </div>
                            <div class="w-100 mb-3">
                                <label for="username" class="form-label">ชื่อผู้ใช้งาน</label>
                                <input type="text" class="form-control" name="username" id="username" required>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="password" class="form-label">รหัสผ่าน</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="email" class="form-label">อีเมล</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="w-100 mb-3">
                                <label for="phone" class="form-label">หมายเลขโทรศัพท์</label>
                                <input type="text" class="form-control" name="phone" id="phone" required>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="user_code" class="form-label">User ID</label>
                                <input type="text" class="form-control" name="user_code" id="user_code" required>
                            </div>
                            <div class="w-100 mb-3">
                                <label for="prefix" class="form-label">คำนำหน้าชื่อ</label>
                                <select class="form-select" name="prefix" id="prefix" required>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="w-100 mb-3">
                                <label for="first_name" class="form-label">ชื่อ</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    required>
                            </div>

                            <div class="w-100 mb-3">
                                <label for="last_name" class="form-label">นามสกุล</label>
                                <input type="text" class="form-control" name="last_name" id="last_name" required>
                            </div>
                        </div>
                        <div class="w-100 mb-3">
                            <label for="position" class="form-label">ตำแหน่งงาน</label>
                            <input type="text" class="form-control" name="position" id="position">
                        </div>
                        <button type="submit" class="btn btn-success">สร้างบัญชี</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="deleteUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteUserModalLabel">ยืนยันการลบบัญชีผู้ใช้งาน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    คุณแน่ใจหรือไม่ว่าต้องการลบบัญชีผู้ใช้งานนี้?
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
        new DataTable('#table_employee_management');

        $('[data-bs-target="#deleteUserModal"]').each(function() {
            $(this).on('click', function() {
                const userId = $(this).data('user-id');
                const form = $('#deleteUserForm');
                form.attr('action', `/backoffice/employee-management/delete/${userId}`);
            });
        });
    </script>
</body>

</html>
