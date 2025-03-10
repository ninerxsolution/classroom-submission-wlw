<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office{{ config('app.subfix_web_title') }}</title>

    @include('partials.head')

</head>

<body>

    @include('partials.sidebar_bf')
    @include('partials.header_bf')

    <main id="main_obj" class="active">
        <section>
            <div class="container-fluid d-flex justify-content-center align-items-center">
                <div class="text-center mt-auto mb-auto p-5">
                    <h1>
                        Back Office, Welcome!
                    </h1>
                    <h3>
                        สวัสดีคุณ {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                    </h3>
                </div>
                {{-- <div>
                    <h2>User Information</h2>
                    <p><strong>Username:</strong> {{ Auth::user()->username }}</p>
                    <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                </div>
                <div>
                    <h2>สถานะการเข้าสู่ระบบของผู้ใช้</h2>
                    @foreach (session()->all() as $key => $value)
                        <p><strong>{{ $key }}:</strong> {{ is_array($value) ? json_encode($value) : $value }}
                        </p>
                    @endforeach
                </div>
                <div>
                    <h2>Cookies</h2>
                    @foreach (request()->cookies->all() as $key => $value)
                        <p><strong>{{ $key }}:</strong> {{ $value }}</p>
                    @endforeach
                </div> --}}
            </div>
        </section>
    </main>

    @include('partials.script')

</body>

</html>
