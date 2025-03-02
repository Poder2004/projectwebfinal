<?php

declare(strict_types=1);

// ฟังก์ชันเพิ่มข้อมูลผู้ใช้
function insertActivity(array $activity): array|bool
{
    $conn = getConnection();

    // ✅ คำสั่ง SQL สำหรับเพิ่มกิจกรรม
    $sql = 'INSERT INTO Activity (name, start_date, start_time, location, description, uid, status) 
            VALUES (?, ?, ?, ?, ?, ?, ?)';

    $stmt = $conn->prepare($sql);
    $stmt->bind_param( 'sssssis',
        $activity['event_name'],
        $activity['event_date'],
        $activity['event_time'],
        $activity['event_location'],
        $activity['event_description'],
        $activity['uid'],
        $activity['status']
    );
    if ($stmt->execute()) {
        return true; // ✅ เพิ่มสำเร็จ
    } else {
        return false; // ❌ เกิดข้อผิดพลาด
    }
}

// ✅ ฟังก์ชันดึงข้อมูลกิจกรรมจาก `activity_id`
function getActivityById(int $activity_id): ?array
{
    $conn = getConnection();

    $sql = 'SELECT * FROM Activity WHERE aid = ? LIMIT 1';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        return $row; // คืนค่าข้อมูลกิจกรรมที่พบ
    } else {
        return null; // ถ้าไม่พบข้อมูลให้คืนค่า null
    }
}

// ✅ ฟังก์ชันดึงกิจกรรมที่ผู้ใช้สร้าง
function getUserCreatedActivities(int $user_id): array
{
    $conn = getConnection();
    $sql = 'SELECT aid, name, start_date, location FROM Activity WHERE uid = ? ORDER BY start_date DESC';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $activities = [];
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
    return $activities;
}

// ✅ ฟังก์ชันดึงข้อมูลกิจกรรมทั้งหมด
function getAllActivities(): array
{
    $conn = getConnection();

    $sql = 'SELECT * FROM Activity ORDER BY start_date DESC';
    $result = $conn->query($sql);

    $activities = [];
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }

    return $activities; // คืนค่าข้อมูลกิจกรรมทั้งหมดในรูปแบบอาร์เรย์
}

function searchActivities(string $query): array
{
    $conn = getConnection();
    $sql = "SELECT * FROM Activity 
            WHERE name LIKE ? 
               OR location LIKE ? 
               OR description LIKE ? 
            ORDER BY start_date DESC";
    
    $stmt = $conn->prepare($sql);
    $searchTerm = "%$query%";
    $stmt->bind_param("sss", $searchTerm, $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    $activities = [];
    while ($row = $result->fetch_assoc()) {
        $activities[] = $row;
    }
    
    return $activities;
}

// ✅ ฟังก์ชันอัปเดตกิจกรรม
function updateActivity(int $activity_id, array $activity_data): bool {
    $conn = getConnection();
    
    $sql = "UPDATE Activity 
            SET name = ?, start_date = ?, start_time = ?, location = ?, description = ?, status = ?
            WHERE aid = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        'ssssssi',
        $activity_data['name'],
        $activity_data['start_date'],
        $activity_data['start_time'],
        $activity_data['location'],
        $activity_data['description'],
        $activity_data['status'],
        $activity_id
    );

    return $stmt->execute();
}

// ✅ ฟังก์ชันลบกิจกรรม
function deleteActivity($activity_id): bool {
    $conn = getConnection();
    $sql = "DELETE FROM Activity WHERE aid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);
    
    return $stmt->execute(); // ✅ ถ้าลบสำเร็จ return true
}