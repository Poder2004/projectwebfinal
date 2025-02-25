3. สร้างระบบการลงทะเบียนผู้ใช้
เมื่อมีผู้ใช้ใหม่ต้องการลงทะเบียน ให้ใช้คำสั่ง SQL ต่อไปนี้:
INSERT INTO User (email, username, password, full_name, date_of_birth, gender, address) 
VALUES ('newuser@example.com', 'newuser', 'newpass123', 'New User', '2000-01-01', 'Female', 'New Address');

4. สร้าง และ แก้ไขกิจกรรม
สร้างกิจกรรมใหม่
INSERT INTO Activity (name, start_date, start_time, location, description, uid, status) 
VALUES ('Tech Talk', '2025-07-10', '13:00:00', 'Online', 'Discussion on AI Trends', 2, 'ได้รับ');

แก้ไขกิจกรรมที่มีอยู่
UPDATE Activity 
SET name = 'Advanced Yoga Class', description = 'Advanced yoga poses for experts'
WHERE aid = 1;

5. ผู้ใช้สามารถดู และ ค้นหากิจกรรม
ดูกิจกรรมทั้งหมด
SELECT * FROM Activity;

ค้นหากิจกรรมโดยใช้ชื่อ
SELECT * FROM Activity WHERE name LIKE '%Yoga%';

ค้นหากิจกรรมที่จัดโดยผู้ใช้คนอื่น
SELECT * FROM Activity WHERE uid != 1;

6. ขอเข้าร่วมกิจกรรม
INSERT INTO Registration (uid, aid, status, date_join) 
VALUES (3, 1, 'รออนุมัติ', CURDATE());

7. ดูรายชื่อผู้ขอเข้าร่วมกิจกรรมที่เราสร้าง
SELECT r.rid, u.full_name, r.status, r.date_join
FROM Registration r
JOIN User u ON r.uid = u.uid
WHERE r.aid = (SELECT aid FROM Activity WHERE uid = 1);

สรุป
-เราสร้างฐานข้อมูลตาม ER Model
-เพิ่มข้อมูลจำลองครบทุกตาราง
-รองรับการลงทะเบียนผู้ใช้
-รองรับการสร้างและแก้ไขกิจกรรม
-รองรับการค้นหาและขอเข้าร่วมกิจกรรม
-รองรับการดูรายชื่อผู้ขอเข้าร่วมกิจกรรม
