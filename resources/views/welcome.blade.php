<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ลงชื่อเข้าใช้งาน{{ config('app.subfix_web_title') }}</title>
    @include('partials.head')
    <link rel="stylesheet" href="{{ asset('assets/css/sign-in.css') }}">
    <style>
        .sc-welcome .container {
            height: 100vh;
        }
    </style>
</head>

<body>
    <main id="main_obj" class="bg-light">
        <section class="sc-welcome">
            <div class="container d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <h1>
                        Welcome!
                    </h1>
                    <h3>
                        Classroom Submission project
                    </h3>
                    <hr>

                    @auth
                        @if (Auth::user()->role == 'TEACHER')
                            <a href="{{ route('route-teacher-dashboard') }}" class="btn btn-primary rounded-5">
                                Go to teacher dashboard
                            </a>
                        @elseif(Auth::user()->role == 'ADMIN')
                            <a href="{{ route('route-backoffice') }}" class="btn btn-primary rounded-5">
                                Go to admin dashboard
                            </a>
                        @else
                            <a href="{{ route('route-sign-in') }}" class="btn btn-primary rounded-5">
                                Go to login page
                            </a>
                        @endif
                    @else
                        <a href="{{ route('route-sign-in') }}" class="btn btn-primary rounded-5">
                            Go to login page
                        </a>
                    @endauth

                </div>
            </div>
        </section>
    </main>
    @include('partials.script')
</body>

</html>
