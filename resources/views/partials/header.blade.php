    <header>
        <nav class="navbar navbar-expand-lg bg-primary">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ route('route-teacher-dashboard') }}">
                    <img src="{{ asset('assets/images/logo-wlw-school.png') }}" alt="" class="img-fluid"
                        style="max-width:40px;">
                    <span>ระบบบันทึกหน่วยการเรียน</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link text-light" aria-current="page"
                                href="{{ route('route-teacher-dashboard') }}">วิชาสอน</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('route-teacher-classrooms') }}">ห้องเรียน</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light disabled"
                                href="{{ route('route-teacher-subjects') }}">หน่วยการสอน</a>
                        </li> --}}
                        <li class="nav-item dropdown">
                            <div class="nav-link text-light dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                แดชบอร์ด
                            </div>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" target="_blank"
                                        href="https://watluang.ac.th/">หน้าหลักโรงเรียนวัดหลวงวิทยา</a></li>
                                <li><a class="dropdown-item" target="_blank"
                                        href="https://watluang.ac.th/student/default/index">บันทึกผลการเรียน</a></li>
                                <li><a class="dropdown-item" target="_blank"
                                        href="https://app.watluang.ac.th/site/login">วิชาการ</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="dropdown dropstart ms-auto">
                        <button class="btn text-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->prefix }} {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <i
                                class="fa-solid fa-circle-user"></i>
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
    </header>
