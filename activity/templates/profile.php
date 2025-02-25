<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โปรไฟล์</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        /* Global Styles */
        body {
            font-family: 'Poppins', sans-serif;
            background: url('bk.png') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
        }
          /* Navbar */
          .navbar {
            display: flex;
            align-items: center;
            background: #fddcc0;
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }
        .logo img {
            height: 40px;
        }
        .nav-right {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-grow: 1;
        }
        .search-box {
            display: flex;
            align-items: center;
            background: white;
            border-radius: 20px;
            padding: 5px 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 200px;
            margin-right: 20px; /* เพิ่มระยะห่างด้านขวา */
            margin-left: 1030px; /* ดันช่องค้นหาไปขวาสุด */
        }
        .search-box input {
            border: none;
            outline: none;
            font-size: 14px;
            background: transparent;
            padding: 5px;
            flex: 1;
        }
        .nav-profile {
            display: flex;
            align-items: center;
            background: #add8e6;
            padding: 5px 15px;
            border-radius: 20px;
            color: white;
            font-weight: bold;
            margin-right: 20px; /* เพิ่มระยะห่างด้านขวา */
        }
        .hamburger {
            font-size: 24px;
            cursor: pointer;
            padding: 5px 10px;
        }
        .profile-container {
            display: flex;
            max-width: 1100px;
            margin: 80px auto;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
        }
        .profile-sidebar {
            width: 30%;
            background: #dcdcdc;
            padding: 20px;
            border-radius: 10px;
        }
        .profile-info {
            margin-bottom: 15px;
        }
        .profile-content {
            width: 70%;
            padding: 20px;
        }
        .content-card {
            background: #dcdcdc;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .tab-container {
            display: flex;
            justify-content: space-between;
            background: #add8e6;
            border-radius: 10px;
            padding: 10px;
        }
        .tab {
            width: 150px;
            text-align: center;
            padding: 10px;
            cursor: pointer;
            font-weight: bold;
        }
        .tab.active {
            background: #ff69b4;
            color: white;
            border-radius: 10px;
        }
        .activity-grid {
            display: flex;
            gap: 20px;
            margin-top: 20px;
        }
        .activity-card {
            width: 48%;
            background: #f0f0f0;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
        }
        .btn-primary {
            background: #2196F3;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-add {
            background: #ff8c00;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
      <!-- Navbar -->
      <nav class="navbar">
        <div class="logo">
            <img src="logo.png" alt="Logo">
        </div>
        <div class="search-box">
            <input type="text" placeholder="ค้นหา">
            <i class="fas fa-search"></i>
        </div>
        <div class="nav-profile">
            <i class="fas fa-user"></i>
            แพรไหม
        </div>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </nav>
    
    <!-- Profile Section -->
    <div class="profile-container">
        <div class="profile-sidebar">
            <h2>โปรไฟล์</h2>
            <div class="profile-info"><strong>ชื่อ:</strong> แพรไหม ผ้าม่าน</div>
            <div class="profile-info"><strong>อีเมล:</strong> pear14562@gmail.com</div>
            <div class="profile-info"><strong>ที่อยู่:</strong> นครราชสีมา</div>
            <div class="profile-info"><strong>วันเกิด:</strong> 10/01/2003</div>
            <div class="profile-info"><strong>เพศ:</strong> หญิง</div>
        </div>
        <div class="profile-content">
            <div class="tab-container">
                <div class="tab active">กิจกรรมของคุณ</div>
                <div class="tab active">กิจกรรมที่เข้าร่วม</div>
                <div class="tab active">สถิติกิจกรรม</div>
            </div>
            <div class="activity-grid">
                <div class="activity-card">
                    <h4>กิจกรรม 1</h4>
                    <button class="btn-primary">ดูโพสต์</button>
                </div>
                <div class="activity-card">
                    <h4>กิจกรรม 2</h4>
                    <button class="btn-primary">ดูโพสต์</button>
                </div>
            </div>
            <button class="btn-add">เพิ่มกิจกรรม</button>
        </div>
    </div>
</body>
</html>
