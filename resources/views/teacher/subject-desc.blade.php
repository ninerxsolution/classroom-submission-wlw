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
                    รายละเอียดวิชาเรียน
                </h1>
            </div>
            <hr>
            <div class="card mb-3">
                <a href="/sub-unit-system/subject-unit.php"
                    class="card-header fw-bold text-primary text-decoration-none d-flex justify-content-between">
                    <span>วิชาชีววิทยา ชั้นมัธยมศึกษาปีที่ 4</span>
                    <span>ว31241</span>
                </a>
                <div class="card-body">
                    <div>
                        หน่วยกิตการเรียนรู้ : 1 หน่วย (เก็บ 80 คะแนน)
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">
                                การเคลื่อนที่ของสิ่งมีชีวิต
                            </span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสิ่งมีชีวิตเซลล์เดียว</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสัตว์ไม่มีกระดูกสันหลัง</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสัตว์มีกระดูกสันหลัง</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของมนุษย์</span> <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">ระบบต่อมไร้ท่อ</span> <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                การทำงานร่วมกันของระบบต่อมไร้ท่อและระบบประสาท <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                ต่อมไร้ท่อ <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                ฮอร์โมนและการทำงานของฮอร์โมน <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การรักษาสมดุลฮอร์โมน</span> <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="/sub-unit-system/subject-desc-info.php" class="btn btn-primary rounded-pill">
                        <span>รายละเอียด</span>
                    </a>
                </div>
            </div>
            <div class="card mb-3">
                <a href="/sub-unit-system/subject-unit.php"
                    class="card-header fw-bold text-primary text-decoration-none d-flex justify-content-between">
                    <span>วิชาชีววิทยา ชั้นมัธยมศึกษาปีที่ 5</span>
                    <span>ว31241</span>
                </a>
                <div class="card-body">
                    <div>
                        หน่วยกิตการเรียนรู้ : 1 หน่วย (เก็บ 80 คะแนน)
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">
                                การเคลื่อนที่ของสิ่งมีชีวิต
                            </span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสิ่งมีชีวิตเซลล์เดียว</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสัตว์ไม่มีกระดูกสันหลัง</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของสัตว์มีกระดูกสันหลัง</span> <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่ของมนุษย์</span> <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">ระบบต่อมไร้ท่อ</span> <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                การทำงานร่วมกันของระบบต่อมไร้ท่อและระบบประสาท <span class="text-secondary">(10
                                    คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                ต่อมไร้ท่อ <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                ฮอร์โมนและการทำงานของฮอร์โมน <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การรักษาสมดุลฮอร์โมน</span> <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="/sub-unit-system/subject-desc-info.php" class="btn btn-primary rounded-pill">
                        <span>รายละเอียด</span>
                    </a>
                </div>
            </div>
            <div class="card mb-3">
                <a href="/sub-unit-system/subject-unit.php"
                    class="card-header fw-bold text-primary text-decoration-none d-flex justify-content-between">
                    <span>วิชาฟิสิกส์ ชั้นมัธยมศึกษาปีที่ 5</span>
                    <span>ว31201</span>
                </a>
                <div class="card-body">
                    <div>
                        หน่วยกิตการเรียนรู้ : 1 หน่วย (เก็บ 80 คะแนน)
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">สมดุลกล</span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>งานและพลังงาน</span>
                                <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>โมเมนตัมและการชน</span>
                                <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่แนวโค้ง</span>
                                <span class="text-secondary">(20 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">การเคลื่อนที่แบบฮาร์มอนิกอย่างง่าย</span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>โมเมนตัมและการชน</span>
                                <span class="text-secondary">(20 คะแนน)</span>

                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่แนวโค้ง</span>
                                <span class="text-secondary">(20 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="/sub-unit-system/subject-desc-info.php" class="btn btn-primary rounded-pill">
                        <span>รายละเอียด</span>
                    </a>
                </div>
            </div>
            <div class="card mb-3">
                <a href="/sub-unit-system/subject-unit.php"
                    class="card-header fw-bold text-primary text-decoration-none d-flex justify-content-between">
                    <span>วิชาฟิสิกส์ ชั้นมัธยมศึกษาปีที่ 6</span>
                    <span>ว31201</span>
                </a>
                <div class="card-body">
                    <div>
                        หน่วยกิตการเรียนรู้ : 1 หน่วย (เก็บ 80 คะแนน)
                    </div>
                    <hr>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">สมดุลกล</span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>งานและพลังงาน</span>
                                <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>โมเมนตัมและการชน</span>
                                <span class="text-secondary">(10 คะแนน)</span>
                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่แนวโค้ง</span>
                                <span class="text-secondary">(20 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                    <div>
                        <div class="d-flex justify-content-between my-3">
                            <span class="fw-bold">การเคลื่อนที่แบบฮาร์มอนิกอย่างง่าย</span>
                            <span class="fw-bold">(40 คะแนนรวม)</span>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>โมเมนตัมและการชน</span>
                                <span class="text-secondary">(20 คะแนน)</span>

                            </div>
                        </li>
                        <li>
                            <div class="d-flex justify-content-between my-3">
                                <span>การเคลื่อนที่แนวโค้ง</span>
                                <span class="text-secondary">(20 คะแนน)</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-footer">
                    <a href="/sub-unit-system/subject-desc-info.php" class="btn btn-primary rounded-pill">
                        <span>รายละเอียด</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')

</body>

</html>
