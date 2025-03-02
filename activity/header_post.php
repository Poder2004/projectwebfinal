<?php
require_once INCLUDES_DIR . '/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // ✅ ตรวจสอบว่า $_POST['query'] มีค่าหรือไม่
    if (!isset($_POST['query']) || trim($_POST['query']) === '') {
        echo "<script>alert('❌ กรุณากรอกคำค้นหาก่อนกดค้นหา');</script>";
        render_view('search_get', ['query' => '', 'activities' => []]);
        exit();
    }

    $query = trim($_POST['query']);
    if (!empty($query)) {
        $activities = searchActivities($query);
    } else {
        $activities = [];
    }

    // ✅ ส่งค่าค้นหาไปที่ `search_get.php`
    render_view('search_get', ['query' => $query, 'activities' => $activities]);
    exit();
}
