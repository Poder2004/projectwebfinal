<?php
require_once '../includes/db.php';

// ✅ รับค่า activity_id จาก `POST`
$activity_id = $_POST['activity_id'] ?? null;

if (!$activity_id) {
    die("❌ ไม่พบรหัสกิจกรรม!");
}

// ✅ ตรวจสอบว่าเป็น `POST` Request และค่าฟอร์มไม่ว่าง
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // ✅ รับค่าจากฟอร์ม
    $updated_activity = [
        'name' => trim($_POST['name']),
        'start_date' => $_POST['start_date'],
        'start_time' => $_POST['start_time'],
        'location' => trim($_POST['location']),
        'description' => trim($_POST['description']),
        'status' => $_POST['status']
    ];
    // ✅ เรียกใช้ฟังก์ชันอัปเดตกิจกรรม
    if (updateActivity($activity_id, $updated_activity)) {
        echo "<script>alert('✅ อัปเดตกิจกรรมสำเร็จ!');</script>";
        render_view('showpost_get', ['activity_id' => $activity_id]);
        exit();
    } else {
        echo "<script>alert('❌ ไม่สามารถอัปเดตกิจกรรมได้!'); </script>";
    }
} 