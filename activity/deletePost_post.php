<?php
require_once '../includes/db.php';

// ✅ ตรวจสอบว่ามีการส่ง `POST` Request
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $activity_id = $_POST['activity_id'] ?? null;

    // ✅ ตรวจสอบ `activity_id`
    if (!$activity_id) {
        die("<script>alert('❌ ไม่พบรหัสกิจกรรม!'); window.history.back();</script>");
    }

    // ✅ ลบกิจกรรม
    if (deleteActivity($activity_id)) {
        echo "<script>alert('✅ ลบกิจกรรมสำเร็จ!');</script>";
        render_view('profile_get');
        exit();
    } else {
        echo "<script>alert('❌ ไม่สามารถลบกิจกรรมได้!');</script>";
    }
}
?>
