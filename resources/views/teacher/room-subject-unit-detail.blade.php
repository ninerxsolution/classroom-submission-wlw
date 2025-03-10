<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard{{ config('app.subfix_web_title') }}</title>

    @include('partials.head')

</head>

<body>

    <section class="py-4">
        <div class="container">
            <div class="title d-flex justify-content-between align-items-baseline">
                <h1>
                    ห้องเรียน ม.4/1
                </h1>
                <h2>
                    ในวิชา ชีววิทยา
                </h2>
            </div>
            <hr>
            <h3>
                <a href="/sub-unit-system/room.php" class="text-decoration-none"> <span
                        class="text-secondary">หน่วยการเรียนรู้ที่ 1 การเคลื่อนที่ของสิ่งมีชีวิต /</span> </a>
                การเคลื่อนที่ของสิ่งมีชีวิตเซลล์เดียว (10 คะแนน)
            </h3>
            <hr>
            <div>
                <a href="/sub-unit-system/room-subject-unit-work-config.php" class="btn btn-warning rounded-pill">
                    <i class="fa-solid fa-gear"></i>
                    <span>จัดการการมอบหมายงาน</span>
                </a>
            </div>
            <div class="d-flex flex-column gap-3 mt-4">
                <div>
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <a href="/sub-unit-system/room-subject-unit-work.php" class="text-decoration-none">
                                <h5 class="card-title">
                                    งานชิ้นที่ 1 แบบฝึกก่อนเรียน
                                </h5>
                            </a>
                            <h6 class="card-subtitle text-secondary">
                                มอบหมายเมื่อ อังคารที่ 3 กันยายน 2567
                            </h6>
                        </div>
                        <div>
                            (5 คะแนน)
                        </div>
                    </div>
                    <hr>
                    <div>
                        ให้นักเรียนทำแบบฝึกหัดก่อนเรียนจากหนังสือชีววิทยาหน้าที่ 24 ข้อที่ 2.2, 2.3 และ 3.4
                        โดยให้ส่งภายในคาบเรียน หากส่งหลังจากนั้นจะถูกลด 1 คะแนน จากคะแนนที่ทำได้
                    </div>
                </div>
            </div>
            <hr>
            <div class="table-responsive overflow-visible">
                <table id="data-table-student" class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>เลขที่</th>
                            <th>รหัสนักเรียน</th>
                            <th>ชื่อจริง - นามสกุล</th>
                            <th>สถานะการขาด-ส่งงาน</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>14141</td>
                            <td>นาย มัทราวุธ เมียดมอ</td>
                            <td>
                                <div class="btn btn-sm btn-success rounded-4" style="cursor: context-menu;">
                                    <span>5/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr data-id="1">
                            <td>2</td>
                            <td>69696</td>
                            <td>นางสาว ธรรศ งาสีแดง</td>
                            <td>
                                <div class="d-flex gap-3 d-none" id="input-1">
                                    <input type="number" class="form-control table-form-control" value="5">
                                    <div class="btn btn-sm btn-success rounded-4" onclick="toggleFunc(1)">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </div>
                                </div>
                                <div class="btn btn-sm btn-success rounded-4" style="cursor: context-menu;"
                                    onclick="toggleFunc(1)" id="display-1">
                                    <span>5/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr data-id="2">
                            <td>3</td>
                            <td>90765</td>
                            <td>นาย กฤษฎา เจริญวิเชียรฉาย</td>
                            <td>
                                <div class="d-flex gap-3" id="input-2">
                                    <input type="number" class="form-control table-form-control" value="5">
                                    <div class="btn btn-sm btn-success rounded-4" onclick="toggleFunc(2)">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                    </div>
                                </div>
                                <div class="btn btn-sm btn-success rounded-4 d-none" style="cursor: context-menu;"
                                    onclick="toggleFunc(2)" id="display-2">
                                    <span>5/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>34342</td>
                            <td>นาย กฤษณะ ภารสุวรรณ</td>
                            <td>
                                <div class="btn btn-sm btn-success rounded-4" style="cursor: context-menu;">
                                    <span>5/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>71631</td>
                            <td>นาย กิตติวัฒน์ เทียนเพ็ชร</td>
                            <td>
                                <div class="btn btn-sm btn-warning rounded-4" style="cursor: context-menu;">
                                    <span>4/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>46344</td>
                            <td>นาย ชญานนท์ อภัยวงษ์</td>
                            <td>
                                <div class="btn btn-sm btn-warning rounded-4" style="cursor: context-menu;">
                                    <span>4/5</span>
                                    <i class="fa-solid fa-pen"></i>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    @include('partials.footer')
    @include('partials.script')

</body>

</html>
