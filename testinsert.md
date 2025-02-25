-- เพิ่มข้อมูลในตาราง User
INSERT INTO User (email, username, password, full_name, date_of_birth, gender, address) VALUES
('alice@example.com', 'alice123', 'password1', 'Alice Johnson', '1990-05-15', 'Female', '123 Maple St'),
('bob@example.com', 'bob456', 'password2', 'Bob Smith', '1985-08-22', 'Male', '456 Oak St'),
('charlie@example.com', 'charlie789', 'password3', 'Charlie Brown', '1993-12-10', 'Other', '789 Pine St'),
('david@example.com', 'david234', 'password4', 'David White', '1988-07-30', 'Male', '321 Birch St'),
('eva@example.com', 'eva567', 'password5', 'Eva Green', '1995-03-20', 'Female', '654 Cedar St');

-- เพิ่มข้อมูลในตาราง Activity
INSERT INTO Activity (name, start_date, start_time, location, description, uid, status) VALUES
('Yoga Class', '2025-03-10', '07:00:00', 'Community Center', 'Morning yoga session for relaxation.', 1, 'ได้รับ'),
('Coding Bootcamp', '2025-04-05', '09:00:00', 'Tech Hub', 'Learn Python and JavaScript.', 2, 'ได้รับ'),
('Cooking Workshop', '2025-04-12', '14:00:00', 'Downtown Kitchen', 'Hands-on cooking experience.', 3, 'ไม่ได้รับ'),
('Art Exhibition', '2025-05-01', '10:00:00', 'City Gallery', 'Showcase of local artists.', 4, 'ไม่ได้รับ'),
('Music Festival', '2025-06-15', '18:00:00', 'Central Park', 'Live music from various artists.', 5, 'ได้รับ');

-- เพิ่มข้อมูลในตาราง Registration
INSERT INTO Registration (uid, aid, status, date_join) VALUES
(1, 1, 'อนุมัติ', '2025-02-01'),
(2, 2, 'รออนุมัติ', '2025-02-05'),
(3, 3, 'ไม่อนุมัติ', '2025-02-10'),
(4, 4, 'อนุมัติ', '2025-02-15'),
(5, 5, 'รออนุมัติ', '2025-02-20');
