CREATE TABLE user (
    uid INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    gender ENUM('Male', 'Female', 'Other'),
    address VARCHAR(255)
);

CREATE TABLE activity (
    aid INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    start_date DATE NOT NULL,
    start_time TIME NOT NULL,
    location VARCHAR(255) NOT NULL,
    description TEXT,
    uid INT NOT NULL,
    status ENUM('เปิดรับ', 'ปิดรับ') NOT NULL DEFAULT 'เปิดรับ',
    image VARCHAR(255),
    FOREIGN KEY (uid) REFERENCES User(uid) ON DELETE CASCADE
);

CREATE TABLE registration (
    rid INT PRIMARY KEY AUTO_INCREMENT,
    uid INT NOT NULL,
    aid INT NOT NULL,
    status ENUM('รออนุมัติ', 'อนุมัติ', 'ไม่อนุมัติ') NOT NULL DEFAULT 'รออนุมัติ',
    date_join DATE NOT NULL,
    verify ENUM('ยืนยัน', 'ไม่ยืนยัน') NOT NULL DEFAULT 'ไม่ยืนยัน',
    datetime_verify DATETIME NULL,
    FOREIGN KEY (uid) REFERENCES user(uid) ON DELETE CASCADE,
    FOREIGN KEY (aid) REFERENCES activity(aid) ON DELETE CASCADE
);


