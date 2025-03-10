<div id="sidebar_obj" class="sidebar bg-primary active">
    <a href="{{ route('route-academic_year-management') }}"
        class="{{ request()->routeIs('route-academic_year-management') ? 'active' : '' }}">
        <i class="fa-solid fa-calendar-day"></i>
        ปีการศึกษา</a>
    <a href="{{ route('route-employee-management') }}"
        class="{{ request()->routeIs('route-employee-management') ? 'active' : '' }}">
        <i class="fa-solid fa-user-tie"></i>
        บัญชีบุคลากร</a>
    <a href="{{ route('route-classroom-management') }}"
        class="{{ request()->routeIs('route-classroom-management') ? 'active' : '' }}">
        <i class="fa-solid fa-door-open"></i> ชั้นเรียน</a>
    <a href="{{ route('route-student-management') }}"
        class="{{ request()->routeIs('route-student-management') ? 'active' : '' }}">
        <i class="fa-solid fa-user-group"></i> รายชื่อนักเรียน</a>
    <a href="{{ route('route-subject-management') }}"
        class="{{ request()->routeIs('route-subject-management') ? 'active' : '' }}">
        <i class="fa-solid fa-book-open"></i> วิชาเรียน</a>
    <a href="{{ route('route-teaching-assignment-management') }}"
        class="{{ request()->routeIs('route-teaching-assignment-management') ? 'active' : '' }}">
        <i class="fa-solid fa-users-rectangle"></i> การเรียนการสอน</a>
</div>
