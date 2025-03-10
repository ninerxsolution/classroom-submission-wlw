<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard{{ config('app.subfix_web_title') }}</title>

    @include('partials.head')

</head>

<body>

    @include('partials.header')

    <section class="py-4">
        <div class="container">
            <div class="title d-flex justify-content-between">
                <h1>
                    ห้องเรียน
                </h1>
            </div>
            <hr>
            <div class="d-flex flex-wrap">
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.4/1</span>
                        <span>30 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ชีววิทยา
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 1 การเคลื่อนที่ของสิ่งมีชีวิต / การเคลื่อนที่ของสัตว์มีกระดูกสันหลัง
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 16 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.4/5</span>
                        <span>34 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ฟิสิกส์
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 2 สมดุลกล / งานและพลังงาน
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 18 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.5/1</span>
                        <span>28 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ฟิสิกส์
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 2 สมดุลกล / งานและพลังงาน
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 19 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.5/2</span>
                        <span>37 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ชีววิทยา
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 1 การเคลื่อนที่ของสิ่งมีชีวิต / การเคลื่อนที่ของสัตว์มีกระดูกสันหลัง
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 16 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.5/5</span>
                        <span>36 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ฟิสิกส์
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 2 สมดุลกล / งานและพลังงาน
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 20 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.6/1</span>
                        <span>26 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ชีววิทยา
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 1 การเคลื่อนที่ของสิ่งมีชีวิต / การเคลื่อนที่ของสัตว์มีกระดูกสันหลัง
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 15 งาน
                        </div>
                    </div>
                </div>
                <div class="card me-3 mb-3" style="max-width:350px; width:100%;">
                    <a href="{{ route('route-teacher-rooms') }}"
                        class="card-header text-decoration-none text-primary fw-bold d-flex justify-content-between">
                        <span>ห้อง ม.6/2</span>
                        <span>39 คน</span>
                    </a>
                    <div class="card-body">
                        <div>
                            สอนวิชา ฟิสิกส์
                        </div>
                        <hr>
                        <div>
                            <div>
                                กำลังดำเนินการใน
                            </div>
                            <div class="fw-bold">
                                หน่วยการเรียนรู้ที่ 2 สมดุลกล / งานและพลังงาน
                            </div>
                        </div>
                    </div>
                    <div class="card-footer fw-bold">
                        <div>
                            มอบหมายทั้งสิ้น 21 งาน
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')

</body>

</html>
