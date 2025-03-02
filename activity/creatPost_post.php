<?php
require_once INCLUDES_DIR . '/db.php';


// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // ✅ ดึง user_id จากฟังก์ชัน แทนการดึงตรงจาก $_SESSION
    $uid = isset($_SESSION['username']) ? getUserIdByUsernameOrEmail($_SESSION['username']) : null;
    $status = "เปิดรับ";

    // // ✅ ตั้งค่าโฟลเดอร์เก็บรูป
    // $target_dir = "uploads/";
    // if (!is_dir($target_dir)) {
    //     mkdir($target_dir, 0777, true);
    // }

    // $image_paths = []; // ✅ เก็บรายการรูปภาพเป็น array

    // // ✅ อัปโหลดรูปภาพหลายไฟล์
    // foreach ($_FILES['imageUpload']['name'] as $key => $file_name) {
    //     if ($_FILES['imageUpload']['error'][$key] === UPLOAD_ERR_OK) {
    //         $file_tmp = $_FILES['imageUpload']['tmp_name'][$key];
    //         $new_file_name = time() . "_" . basename($file_name);
    //         $target_file = $target_dir . $new_file_name;

    //         if (move_uploaded_file($file_tmp, $target_file)) {
    //             $image_paths[] = $new_file_name; // ✅ เก็บเฉพาะชื่อไฟล์
    //         }
    //     }
    // }

    // // ✅ แปลง array ของรูปเป็น JSON string
    // $image_paths_json = json_encode($image_paths);

    // ✅ รับค่าจากฟอร์ม
    $event_name = $_POST['event_name'];
    $event_description = $_POST['event_description'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['event_time'];
    $event_location = $_POST['event_location'];

    // ✅ จัดรูปแบบข้อมูลสำหรับการเพิ่มกิจกรรม
    $activityData = [
        'event_name' => $event_name,
        'event_description' => $event_description,
        'event_date' => $event_date,
        'event_time' => $event_time,
        'event_location' => $event_location,
        'uid' => $uid,
        'status' => $status,
        // 'image' => $image_paths_json // ✅ เก็บ JSON ของรูปภาพ
    ];

    // ✅ เรียกใช้ฟังก์ชัน insertActivity() พร้อมส่งไฟล์รูป
    $activity = insertActivity($activityData);

    if ($activity) {
        echo "<script>alert('✅ สร้างกิจกรรมสำเร็จ!');</script>";
        render_view('home_get', ['latest_activity' => $activity]); // ✅ ส่งข้อมูลไปยัง `home_get.php`
        exit();
    } else {
        echo "Something went wrong! on insert user ";
    }
}
