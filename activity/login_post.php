<?php
require_once INCLUDES_DIR . '/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // ✅ ใช้ฟังก์ชัน login() เพื่อตรวจสอบข้อมูล
    $isAuthenticated = login($username, $password);

    if ($isAuthenticated) {
        // ✅ ดึงข้อมูลผู้ใช้จากฟังก์ชัน getUserByUsernameOrEmail()
        $user = getUserByUsernameOrEmail($username);

        if ($user) {
            $_SESSION['user_id'] = $user['uid']; // ใช้ uid แทน user_id
            $_SESSION['username'] = $user['username'];
            $_SESSION['first_name'] = $user['first_name'];

            echo "<script>alert('✅ เข้าสู่ระบบสำเร็จ!');</script>";
            render_view('/home_get', $user);
            exit();
        } else {
            echo "<script>alert('❌ ล็อกอินอีกครั้ง!'); </script>";
            render_view('/login_get');
            exit();
        }
    } 
}
