<?php
require_once INCLUDES_DIR . '/db.php';


// ตรวจสอบว่ามีการส่งข้อมูลมาหรือไม่
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $email = $_POST['email'] ?? '';
    $address = $_POST['address'] ?? '';
    $birthday = $_POST['birthday'] ?? '';
    $gender = $_POST['gender'] ?? '';

    // เข้ารหัสรหัสผ่านเพื่อความปลอดภัย
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    // จัดรูปแบบข้อมูลสำหรับการเพิ่มผู้ใช้
    $userData = [
        'email' => $email,
        'username' => $username,
        'password' => $hashed_password,
        'first_name' => $first_name,
        'last_name' => $last_name,
        'date_of_birth' => $birthday,
        'gender' => $gender,
        'address' => $address
    ];

    // เรียกใช้ฟังก์ชัน insertUser() เพื่อเพิ่มข้อมูลลงฐานข้อมูล
    $user = insertUser($userData);

    if ($user) {
        //พอสมัครสมาชิกเสร็จ ให้ไปหน้าล็อกอิน และให้ล็อกอิน
       // 
        echo "<script>alert('✅ สมัครสมาชิกสำเร็จ!'); </script>";
        render_view('login_get');
        exit();
    } else {
        echo "Something went wrong! on insert user ";
    }
}
