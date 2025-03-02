<?php
require_once INCLUDES_DIR . '/db.php';
require_once INCLUDES_DIR . '/view.php';

// ✅ รับค่าจาก URL
$user_id = $_SESSION['user_id'] ?? null;
$activity_id = $_GET['activity_id'] ?? null;

if (!$user_id || !$activity_id) {
    die("<h1 style='text-align:center;color:red;'>❌ ไม่พบข้อมูลที่จำเป็น!</h1>");
}

// ✅ เรียกใช้ฟังก์ชัน insertRegistration() และรับค่าผลลัพธ์
$result = insertRegistration($user_id, $activity_id);

if ($result['status']) {

    echo "<script>alert('✅ {$result['message']}'); </script>";
    render_view('/home_get');
    exit();
} else {
    echo "<script>alert('❌ {$result['message']}'); </script>";
    render_view('/home_get');
}
?>
