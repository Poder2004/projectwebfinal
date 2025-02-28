<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สร้างและจัดการกิจกรรม</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFE9D7;
            /* สีพื้นหลัง */
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('bbk.png') center/cover no-repeat;
            opacity: 0.2;
            /* ปรับค่าความโปร่งใส (0.0 = ใสสุด, 1.0 = ทึบสุด) */
            z-index: -1;
            /* ทำให้เป็นพื้นหลัง */
        }


        .hero-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 50px;
        }

        .text-content {
            width: 40%;
            font-family: Nunito;
        }

        .text-content h1 {
            font-weight: bold;
            color: #1F2937;
            font-size: 60px;
        }

        .create-button {
            background-color: #FF7F50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .image-container {
            display: flex;
            gap: 20px;
        }

        .basketball-image,
        .guitar-image,
        .boy-image,
        .ball-image {
            width: 200px;
            height: auto;
        }

        h2 {
            font-size: 24px;
            font-weight: lighter;
            margin-bottom: 30px;
        }

        .event-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            transition: transform 0.2s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            /* จัดปุ่มให้อยู่ตรงกลางแนวนอน */
            justify-content: space-between;
            /* ให้เนื้อหาเว้นช่องว่างแบบสมดุล */
        }

        .event-card:hover {
            transform: scale(1.02);
        }

        .event-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
        }

        .btn-join {
            background-color: #28a745;
            /* สีพื้นหลังของปุ่ม */
            color: white;
            /* สีตัวอักษร */
            border-radius: 20px;
            /* ทำให้ขอบมน */
            padding: 10px 20px;
            /* ปรับขนาดพื้นที่ขอบของปุ่ม */
            text-decoration: none;
            /* ลบขีดเส้นใต้ */
            text-align: center;
            /* จัดข้อความตรงกลาง */
            display: inline-block;
            /* ให้ปุ่มมีขนาดตามเนื้อหา */
            font-size: 16px;
            width: 120px;
            /* ปรับขนาดปุ่ม */
            height: 40px;
            font-weight: bold;
            /* ทำให้ตัวอักษรดูโดดเด่น */
            border: none;
            /* เอาเส้นขอบออก */
            cursor: pointer;
            /* ทำให้เป็นเมาส์ชี้เมื่อ hover */
            transition: all 0.3s ease-in-out;
            /* เพิ่มเอฟเฟกต์ลื่นไหล */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* เพิ่มเงา */
        }

        /* เอฟเฟกต์เมื่อ Hover */
        .btn-join:hover {
            background-color: #218838;
            /* เปลี่ยนสีเมื่อโฮเวอร์ */
            transform: scale(1.05);
            /* ขยายขนาดเล็กน้อย */
        }


        .basketball-image {
            width: 300px;
            height: 500px;
            margin-left: 150px;
            margin-top: 100px;
        }

        .guitar-image {
            width: 300px;
            height: 300px;
            margin-left: -220px;
            margin-top: 350px;
        }

        .boy-image {
            width: 300px;
            height: 300px;
            position: relative;
            left: 0px;
            top: 450px;
        }

        .ball-image {
            width: 350px;
            height: 450px;
            position: relative;
            left: -200px;
            top: 100px;
        }

        h1 {
            font-size: 45px;
            font-weight: bold;
            margin-bottom: 30px;
        }

        h1 img {
            width: 50px;
            height: auto;
            vertical-align: middle;
            /* ทำให้ภาพอยู่ตรงกลางแนวตั้ง */
            margin-left: 0px;
        }
    </style>
</head>

<body>
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="text-content">
                <div class="title">
                    <h1>สร้าง</h1>
                    <h1>และ <img src="om.png" alt=""></h1>
                    <h1><span>จัดการกิจกรรม</span></h1>
                </div>
                <h2>แพลตฟอร์มผู้สร้างกิจกรรมช่วยให้คุณสร้าง อัป และแก้ไขกิจกรรมได้อย่างง่ายดาย<br>
                    และช่วยให้คุณค้นหากิจกรรมต่างๆ ได้อย่างง่ายดาย<br>
                    มาใช้เวลาว่างให้เกิดความสุขกันเถอะ</h2>
                <button class="create-button">สร้างกิจกรรม</button>
            </div>
            <div class="image-container">
                <img src="basketball.png" class="basketball-image">
                <img src="guitar.png" class="guitar-image">
                <img src="boy.png" class="boy-image">
                <img src="ball.png" class="ball-image">
            </div>
        </section>

        <!-- Event List -->
        <div class="container py-5">
            <h1>กิจกรรม</h1>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event1.jpg" alt="กิจกรรม 1">
                        <h5 class="mt-3">อาสาทำดี แต้มฝันเติมแต้มยิ้ม</h5>
                        <p><strong>วันที่:</strong> 22 ก.พ. 2568</p>
                        <p><strong>สถานที่:</strong> โรงเรียนวัดชลอ บางกรวย</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event2.jpg" alt="กิจกรรม 2">
                        <h5 class="mt-3">ค่ายเยาวชนอนุรักษ์ธรรมชาติ</h5>
                        <p><strong>วันที่:</strong> 1-7 มี.ค. 2568</p>
                        <p><strong>สถานที่:</strong> ศูนย์อนุรักษ์สิ่งแวดล้อม</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event3.jpg" alt="กิจกรรม 3">
                        <h5 class="mt-3">กิจกรรมทำบุญตักบาตร</h5>
                        <p><strong>วันที่:</strong> 27 ม.ค. 2568</p>
                        <p><strong>สถานที่:</strong> วัดกลาง อุบลราชธานี</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event4.jpg" alt="กิจกรรม 4">
                        <h5 class="mt-3">โครงการร่วมมือพัฒนาเกาะสีชัง</h5>
                        <p><strong>วันที่:</strong> 20 เม.ย. 2568</p>
                        <p><strong>สถานที่:</strong> เกาะสีชัง</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event5.jpg" alt="กิจกรรม 5">
                        <h5 class="mt-3">ครูอาสาภาษาอังกฤษ ห้องเรียนริมน้ำ</h5>
                        <p><strong>วันที่:</strong> 13 ก.ค. 2568</p>
                        <p><strong>สถานที่:</strong> จังหวัดกาญจนบุรี</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
                <div class="col">
                    <div class="event-card p-3">
                        <img src="event6.jpg" alt="กิจกรรม 6">
                        <h5 class="mt-3">ค่ายสนุกคิดวิทยาศาสตร์</h5>
                        <p><strong>วันที่:</strong> 22 ธ.ค. 2568</p>
                        <p><strong>สถานที่:</strong> True Space - BTS</p>
                        <a href="#" class="btn btn-join">สนใจ</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>