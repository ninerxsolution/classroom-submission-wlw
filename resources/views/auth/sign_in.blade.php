<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงชื่อเข้าใช้งาน{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('assets/css/sign-in.css') }}">
</head>

<body>
    <main id="main_obj">
        <section class="sc-sign-in">
            <div class="container d-flex justify-content-center align-items-center">

                <form method="POST" action="{{ route('route-sign-in') }}">
                    @csrf
                    <div class="sign-in-card bg-light shadow rounded-4 p-5">

                        <div class="sign-in-form d-flex flex-wrap justify-content-center">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <div class="logo">
                                    <img src="{{ asset('assets/images/logo-wlw-school.png') }}" alt="Logo wlw"
                                        class="img-fluid">

                                </div>
                                <div class="text-center">
                                    <h1>
                                        Classroom<br> Submission
                                    </h1>
                                </div>
                            </div>
                            <input type="text" name="username" id="username" class="form-control rounded-4"
                                placeholder="กรอกชื่อผู้ใช้หรืออีเมล">
                            <input type="password" name="password" id="password" class="form-control rounded-4"
                                placeholder="กรอกรหัสผ่าน">
                            @if (session('login_error'))
                                <div id="text-alert" class="text-danger text-center">
                                    {{ session('login_error') }}
                                </div>
                            @endif
                            <button type="submit" class="w-100 btn btn-primary rounded-5">
                                ลงชื่อเข้าใช้
                            </button>
                            {{-- <a href="#" class="text-decoration-none">ลืมรหัสผ่านใช่หรือไม่?</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </main>

    @include('partials.script')
</body>

</html>
