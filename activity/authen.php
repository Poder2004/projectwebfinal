<?php

function login(string $username, string $password): array|bool
{
    $conn = getConnection();
    $sql = "SELECT * FROM User WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
       // echo "❌ ไม่พบอีเมลนี้ในฐานข้อมูล: $username";
        return false;
    }

    $row = $result->fetch_assoc();

    if (password_verify($password, $row['password'])) {
        unset($row['password']); // เอารหัสผ่านออกเพื่อความปลอดภัย
        return $row;
    } else {
        return false;
    }
}

function logout():void
{
    unset($_SESSION['username']);
}
