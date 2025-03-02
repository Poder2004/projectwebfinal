<?php

declare(strict_types=1);

// ฟังก์ชันเพิ่มข้อมูลผู้ใช้
function insertUser($user): bool
{
    $conn = getConnection(); // เชื่อมต่อฐานข้อมูล
    $sql = 'INSERT INTO User (email, username, password, first_name, last_name, date_of_birth, gender, address) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssssss',
        $user['email'],
        $user['username'],
        $user['password'],
        $user['first_name'],
        $user['last_name'],
        $user['date_of_birth'],
        $user['gender'],
        $user['address']
    );
    $stmt->execute();
    if ($stmt->affected_rows > 0) { //ถ้าเพิ่มข้อมูลได้ก็จะเกิด affected_rows มากกว่า 0
        return true;
    } else {
        return false;
    }
}

// ✅ ฟังก์ชันดึงข้อมูลผู้ใช้ทั้งหมดจาก email หรือ username
function getUserByUsernameOrEmail(string $identifier): ?array
{
    $conn = getConnection();
    $sql = 'SELECT * FROM User WHERE email = ? OR username = ? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        return $row; // คืนค่าข้อมูลผู้ใช้ทั้งหมด
    } else {
        return null; // ถ้าไม่มีผู้ใช้ ให้คืนค่า null
    }
}

// ✅ ฟังก์ชันดึงเฉพาะ user_id (uid) จาก email หรือ username
function getUserIdByUsernameOrEmail(string $identifier): ?int
{
    $conn = getConnection();
    $sql = 'SELECT uid FROM User WHERE email = ? OR username = ? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $identifier, $identifier);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($row = $result->fetch_assoc()) {
        return (int) $row['uid']; // คืนค่า user_id (uid)
    } else {
        return null; // ถ้าไม่มี user_id คืนค่า null
    }
}