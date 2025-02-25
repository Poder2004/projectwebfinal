<!-- Replace with your HTML Code 
(Leave empty if not needed) -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>

    <style>
    
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: url('bk.png') no-repeat center center fixed;
            /* Add this line */
            background-size: cover;
            /* Ensures the image covers the entire background */
        }

        .container {
            position: relative;
            width: 70vw;
            height: 80vh;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 4px 20px 0 rgba(0, 0, 0, 0.3), 0 6px 20px 0 rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .container::before {
            content: "";
            position: absolute;
            top: 0;
            left: -50%;
            width: 100%;
            height: 100%;
            background: linear-gradient(0deg, #FF99CC, #9900FF);
            z-index: 6;
            transform: translateX(100%);
            transition: 1s ease-in-out;
        }

        .signin-signup {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
            z-index: 5;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            width: 40%;
            min-width: 238px;
            padding: 0 10px;
        }

        form.sign-in-form {
            opacity: 1;
            transition: 0.5s ease-in-out;
            transition-delay: 1s;
        }

        form.sign-up-form {
            opacity: 0;
            transition: 0.5s ease-in-out;
            transition-delay: 1s;
        }

        .title {
            font-size: 35px;
            color: rgb(121, 108, 197);
            margin-bottom: 10px;
        }

        .input-field {
            width: 100%;
            height: 40px;
            background: #f0f0f0;
            margin: 10px 0;
            border: 2px solid rgb(121, 108, 197);
            border-radius: 50px;
            display: flex;
            align-items: center;
        }

        /* ปรับ select ให้ดูเหมือน input */
        .input-field select {
            width: 100%;
            border: none;
            outline: none;
            font-size: 16px;
            color: gray;
            background: transparent;
            padding-right: 30px;
            /* เว้นที่ให้ลูกศร */
            cursor: pointer;
            appearance: none;
            /* ลบ dropdown default */
        }

        .input-field i {
            flex: 1;
            text-align: center;
            color: #666;
            font-size: 18px;
        }

        .input-field input {
            flex: 5;
            background: none;
            border: none;
            outline: none;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            color: #444;
        }

        .input-field1 {

            width: 40%;
            height: 40px;
            background: #f0f0f0;
            margin: 10px 0;
            border: 2px solid rgb(121, 108, 197);
            border-radius: 50px;
            display: flex;
            align-items: center;
        }

        .input-field1 input {
            flex: 5;
            background: none;
            border: none;
            outline: none;
            width: 100%;
            font-size: 18px;
            font-weight: 600;
            color: #444;
        }

        .input-field-group {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            /* ระยะห่างระหว่างช่อง */
            width: 100%;
        }

        .input-field i {
            margin-right: 10px;
            color: #0000FF;
        }

        .btn {
            width: 150px;
            height: 40px;
            border: none;
            border-radius: 50px;
            background: rgb(121, 108, 197);
            color: #fff;
            font-weight: 600;
            margin: 10px 0;
            text-transform: uppercase;
            cursor: pointer;
        }

        .btn:hover {
            background: rgb(121, 108, 197);
        }

        .social-text {
            margin: 10px 0;
            font-size: 16px;
        }

        .social-media {
            display: flex;
            justify-content: center;
        }

        .social-icon {
            height: 45px;
            width: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #444;
            border: 1px solid #444;
            border-radius: 50px;
            margin: 0 5px;
        }

        a {
            text-decoration: none;
        }

        .social-icon:hover {
            color: rgb(121, 108, 197);
            border-color: rgb(121, 108, 197);
        }

        .panels-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-around;
        }

        .panel {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-around;
            width: 35%;
            min-width: 238px;
            padding: 0 10px;
            text-align: center;
            z-index: 6;
        }

        .left-panel {
            pointer-events: none;
        }

        .content {
            color: #fff;
            transition: 1.1s ease-in-out;
            transition-delay: 0.5s;
        }

        .panel h3 {
            font-size: 24px;
            font-weight: 600;
        }

        .panel p {
            font-size: 15px;
            padding: 10px 0;
        }

        .image {
            width: 100%;
            transition: 1.1s ease-in-out;
            transition-delay: 0.4s;
        }

        .left-panel .image,
        .left-panel .content {
            transform: translateX(-200%);
        }

        .right-panel .image,
        .right-panel .content {
            transform: translateX(0);
        }

        .account-text {
            display: none;
        }

        /*Animation*/
        .container.sign-up-mode::before {
            transform: translateX(0);
        }

        .container.sign-up-mode .right-panel .image,
        .container.sign-up-mode .right-panel .content {
            transform: translateX(200%);
        }

        .container.sign-up-mode .left-panel .image,
        .container.sign-up-mode .left-panel .content {
            transform: translateX(0);
        }

        .container.sign-up-mode form.sign-in-form {
            opacity: 0;
        }

        .container.sign-up-mode form.sign-up-form {
            opacity: 1;
        }

        .container.sign-up-mode .right-panel {
            pointer-events: none;
        }

        .container.sign-up-mode .left-panel {
            pointer-events: all;
        }

        /*Responsive*/
        @media (max-width:779px) {
            .container {
                width: 100vw;
                height: 100vh;
            }
        }

        @media (max-width:635px) {
            .container::before {
                display: none;
            }

            form {
                width: 80%;
            }

            form.sign-up-form {
                display: none;
            }

            .container.sign-up-mode2 form.sign-up-form {
                display: flex;
                opacity: 1;
            }

            .container.sign-up-mode2 form.sign-in-form {
                display: none;
            }

            .panels-container {
                display: none;
            }

            .account-text {
                display: initial;
                margin-top: 30px;
            }
        }

        @media (max-width:320px) {
            form {
                width: 90%;
            }
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #fddcc0;
            /* สีครีม/พีช */
            padding: 10px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            left: 0;
            z-index: 100;
        }

        /* Logo */
        .logo img {
            height: 40px;
        }

        /* Search Box */
        .search-box {
            display: flex;
            margin-left: 1000px;
            background: #fff;
            border-radius: 20px;
            padding: 5px 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-box input {
            border: none;
            outline: none;
            font-size: 16px;
            padding: 5px;
            background: transparent;
        }

        .search-box .search-btn {
            background: none;
            border: none;
            cursor: pointer;
            font-size: 18px;
            color: #999;
        }

        /* Buttons */
        .nav-buttons {
            display: flex;
            gap: 10px;
        }

        .login-btn,
        .signup-btn {
            background: #0a1f2b;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .login-btn:hover,
        .signup-btn:hover {
            background: #092029;
        }

        .hamburger {
            font-size: 24px;
            cursor: pointer;
            padding: 5px 10px;
        }

        /* Mobile Menu */
        .mobile-menu {
            display: none;
            flex-direction: column;
            position: absolute;
            top: 60px;
            right: 10px;
            background: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 10px;
            z-index: 99;
        }

        .mobile-menu button {
            width: 100%;
            margin: 5px 0;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .search-box {
                display: none;
                /* ซ่อนช่องค้นหา */
            }

            .nav-buttons {
                display: none;
                /* ซ่อนปุ่ม Login & Sign Up */
            }

            .hamburger {
                display: block;
                /* แสดง Hamburger Menu */
            }

            .mobile-menu.show {
                display: flex;
                /* แสดงเมนูเมื่อกด Hamburger */
            }
        }

        .content img {
            width: 200px;
            height: 200px;
            margin-top: -100px;
        }
    </style>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="logo">
            <img src="bbk.png" alt="Logo">
        </div>

        <div class="search-box">
            <input type="text" placeholder="ค้นหา">
            <button class="search-btn"><i class="fas fa-search"></i></button>
        </div>

        <div class="nav-buttons">
            <button class="login-btn">Login</button>
            <button class="signup-btn">Sign Up</button>
        </div>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>

    </nav>




    <div class="container">
        <div class="signin-signup">
            <form action="" class="sign-in-form">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <a href="">ลืมรหัสผ่าน?</a>
                <input type="submit" value="เข้าสู่ระบบ" class="btn">
                <p class="account-text">Don't have an account? <a href="#" id="sign-up-btn2">สมัครสมาชิก</a></p>
            </form>
            <form action="" class="sign-up-form">
                <h2 class="title">สมัครสมาชิก</h2>
                <div class="input-field-group">
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="First Name">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Last Name">
                    </div>
                </div>

                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password">
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="text" placeholder="Email">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="address" placeholder="address">
                </div>
                <div class="input-field-group">
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="date">
                    </div>
                    <div class="input-field">
                        <i class="fas fa-venus-mars"></i> <!-- ไอคอนเพศ -->
                        <select required>
                            <option value="" disabled selected>gender</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                    </div>
                </div>
                <input type="submit" value="สมัครสมาชิก" class="btn"><button class="btn"><a href="indexx.html">กลับสู่หน้าหลัก</a></button>

                <p class="account-text">Already have an account? <a href="#" id="sign-in-btn2">Sign in</a></p>
            </form>
        </div>
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <img src="bbk.png" alt="">
                    <h2>คุณเป็นสมาชิกท่องโลก</h2>
                    <h2>กิจกรรมใช่ไหม?</h2>
                    <button class="btn" id="sign-in-btn">ลงชื่อเข้าใช้</button>
                </div>
                <img src="signin.svg" alt="" class="image">
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <img src="bbk.png" alt="">
                    <h2>คุณเป็นผู้ใช้</h2>
                    <h2>ท่องโลกกิจกรรมใหม่ใช่หรือไม่</h2>
                    <button class="btn" id="sign-up-btn">สมัครสมาชิก</button>
                </div>
                <img src="signup.svg" alt="" class="image">
            </div>
        </div>
    </div>
    <script>
        /* Replace with your JS Code 
(Leave empty if not needed) */
        function toggleMenu() {
            var menu = document.getElementById("menu");
            menu.classList.toggle("show");
        }


        const sign_in_btn = document.querySelector("#sign-in-btn");
        const sign_up_btn = document.querySelector("#sign-up-btn");
        const container = document.querySelector(".container");
        const sign_in_btn2 = document.querySelector("#sign-in-btn2");
        const sign_up_btn2 = document.querySelector("#sign-up-btn2");
        sign_up_btn.addEventListener("click", () => {
            container.classList.add("sign-up-mode");
        });
        sign_in_btn.addEventListener("click", () => {
            container.classList.remove("sign-up-mode");
        });
        sign_up_btn2.addEventListener("click", () => {
            container.classList.add("sign-up-mode2");
        });
        sign_in_btn2.addEventListener("click", () => {
            container.classList.remove("sign-up-mode2");
        });
    </script>

</body>

</html>