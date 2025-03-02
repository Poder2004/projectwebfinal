<?php

declare(strict_types=1);


// ✅ 1️⃣ ฟังก์ชันเพิ่มข้อมูลการลงทะเบียนกิจกรรม (ให้ผู้ใช้สมัครเข้าร่วมกิจกรรม)
function insertRegistration($user_id, $activity_id): array {
    $conn = getConnection();

    // ตรวจสอบว่าผู้สมัครเป็นผู้สร้างกิจกรรมนี้หรือไม่
    $creator_check_sql = "SELECT uid FROM Activity WHERE aid = ?";
    $creator_check_stmt = $conn->prepare($creator_check_sql);
    $creator_check_stmt->bind_param("i", $activity_id);
    $creator_check_stmt->execute();
    $creator_check_result = $creator_check_stmt->get_result();

    if ($creator_check_result->num_rows > 0) {
        $row = $creator_check_result->fetch_assoc();
        if ($row['uid'] == $user_id) {
            return ['status' => false, 'message' => '❌ ไม่สามารถสมัครได้ เพราะคุณเป็นผู้สร้างกิจกรรมนี้!'];
        }
    }

    // ตรวจสอบว่าผู้ใช้เคยสมัครกิจกรรมนี้แล้วหรือยัง
    $check_sql = "SELECT * FROM Registration WHERE uid = ? AND aid = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ii", $user_id, $activity_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    if ($check_result->num_rows > 0) {
        return ['status' => false, 'message' => '❌ คุณได้สมัครเข้าร่วมกิจกรรมนี้แล้ว!'];
    }

    // เพิ่มข้อมูลลงใน Registration
    $sql = "INSERT INTO Registration (uid, aid, status, date_join) VALUES (?, ?, 'รออนุมัติ', NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user_id, $activity_id);

    if ($stmt->execute()) {
        return ['status' => true, 'message' => '✅ สมัครเข้าร่วมกิจกรรมสำเร็จ!'];
    } else {
        return ['status' => false, 'message' => '❌ เกิดข้อผิดพลาดในการสมัคร กรุณาลองใหม่!'];
    }
}



// ✅ 2️⃣ ฟังก์ชันอัปเดตสถานะของการลงทะเบียน (อนุมัติ/ไม่อนุมัติ)
function updateRegistrationStatus($registration_id, $status): bool {
    $conn = getConnection();
    $sql = "UPDATE Registration SET status = ? WHERE rid = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $registration_id);
    
    return $stmt->execute(); // ✅ ถ้าอัปเดตสำเร็จ return true
}

// ✅ 3️⃣ ฟังก์ชันดึงกิจกรรมที่ผู้ใช้เข้าร่วม
function getUserJoinedActivities($user_id): array {
    $conn = getConnection();
    $sql = "SELECT A.aid, A.name, A.start_date, A.location, R.status 
            FROM Registration R 
            JOIN Activity A ON R.aid = A.aid 
            WHERE R.uid = ? 
            ORDER BY A.start_date DESC";
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

// ✅ 4️⃣ ฟังก์ชันดึงรายชื่อผู้เข้าร่วมกิจกรรม (ดึงผู้สมัครเข้าร่วมกิจกรรม)
function getParticipantsByActivity($activity_id): array {
    $conn = getConnection();
    $sql = "SELECT U.uid, U.full_name, U.email, R.status 
            FROM Registration R 
            JOIN User U ON R.uid = U.uid 
            WHERE R.aid = ? 
            ORDER BY R.status";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $participants = [];
    while ($row = $result->fetch_assoc()) {
        $participants[] = $row;
    }
    return $participants;
}

// ✅ ฟังก์ชันดึงรายชื่อ "ผู้ขอเข้าร่วม" กิจกรรม
function getParticipantsPending($activity_id): array {
    $conn = getConnection();
    $sql = "SELECT U.uid, U.first_name, U.last_name FROM Registration R 
            JOIN User U ON R.uid = U.uid 
            WHERE R.aid = ? AND R.status = 'รออนุมัติ'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $participants = [];
    while ($row = $result->fetch_assoc()) {
        $participants[] = $row;
    }
    return $participants;
}

// ✅ ฟังก์ชันดึงรายชื่อ "ผู้ที่อนุมัติแล้ว"
function getParticipantsApproved($activity_id): array {
    $conn = getConnection();
    $sql = "SELECT U.uid, U.first_name, U.last_name FROM Registration R 
            JOIN User U ON R.uid = U.uid 
            WHERE R.aid = ? AND R.status = 'อนุมัติ'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $participants = [];
    while ($row = $result->fetch_assoc()) {
        $participants[] = $row;
    }
    return $participants;
}

// ✅ ฟังก์ชันดึงรายชื่อ "ผู้ที่ถูกปฏิเสธ"
function getParticipantsRejected($activity_id): array {
    $conn = getConnection();
    $sql = "SELECT U.uid, U.first_name, U.last_name FROM Registration R 
            JOIN User U ON R.uid = U.uid 
            WHERE R.aid = ? AND R.status = 'ไม่อนุมัติ'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $participants = [];
    while ($row = $result->fetch_assoc()) {
        $participants[] = $row;
    }
    return $participants;
}
