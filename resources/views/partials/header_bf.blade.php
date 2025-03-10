<nav id="navbar_obj" class="navbar navbar-expand-lg bg-light active">
    <div class="container-fluid">
        <button class="btn me-3" id="sidebar_toggle"><i class="fa-solid fa-bars"></i></button>

        <a class="navbar-brand" href="{{ route('route-backoffice') }}">Classroom Submission</a>
        <div class="ms-auto">
            @if (isset($latestAcademicYear))
                <span> ปีการศึกษา : {{ $latestAcademicYear->year_label + 543 }} เทอม:
                    {{ $latestAcademicYear->year_semester }}</span>
            @endif
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            {{-- <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
            </ul> --}}
            <div class="dropdown dropstart ms-auto">
                <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i class="fa-solid fa-circle-user"></i>
                </button>
                <ul class="dropdown-menu">
                    {{-- <li><a class="dropdown-item" href="#">จัดการบัญชี</a></li> --}}
                    <li>
                        <form method="POST" action="{{ route('route-logout') }}">
                            @csrf<button type="submit" class="dropdown-item"
                                href="{{ route('route-logout') }}">ออกจากระบบ</button></form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
