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
                    การมอบหมายการสอน
                </h1>

                <div class="table-responsive">
                    <table id="table_employee_management" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
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
                                    <td>{{ $user->user_code }}</td>
                                    <td>{{ $user->prefix }} {{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->position }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        <a class="text-info"
                                            href="{{ route('route-teaching-assignment-management.view', $user->id) }}"><i
                                                class="fa-solid fa-pen"></i>จัดการสอน</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>





    @include('partials.script')
    <script>
        new DataTable('#table_employee_management');
    </script>
</body>

</html>
