<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>

<!-- Head -->

<head>

    <title>Existing Login Form a Flat Responsive Widget Template :: W3layouts</title>

    <!-- Meta-Tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="keywords"
        content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
    <script
        type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //Meta-Tags -->

    <link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all">

    <!-- Fonts -->
    <link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
    <!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->

<body>

    <h1>Register Form</h1>
    <div class="w3layoutscontaineragileits">
        <form action="./register.php" method="post">
            <input placeholder="User Name" type="text" required="" name="user">
            <div class="icon-agile">
                <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <input placeholder="Email" class="mail" type="email" required="" name="email">
            <div class="icon-agile">
                <i class="fa fa-envelope-o" aria-hidden="true"></i>
            </div>
            <input placeholder="Password" type="password" required="" name="password">
            <div class="icon-agile">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </div>
            <input placeholder="Confirm Password" type="password" required="">
            <div class="icon-agile">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </div>
            <ul class="agileinfotickwthree">
                <li>
                    <input type="checkbox" id="brand1" value="" Name="btnSubmit">
                    <label for="brand1"><span></span>I Accept Terms & Conditions</label>
                </li>
            </ul>
            <div class="aitssendbuttonw3ls">
                <input type="submit" value="ĐĂNG KÝ">
            </div>
        </form>

        <?php
        // Kiểm tra nếu có tham số error trên URL và hiển thị thông báo
        if (isset($_GET['error']) && $_GET['error'] == 'email_existed') {
            echo "<script>alert('Email đã tồn tại trong cơ sở dữ liệu');</script>";
        }

        if (isset($_POST["btnSubmit"])) {

            $servername = "localhost"; // Địa chỉ server MySQL
            $username = "root"; // Tên đăng nhập MySQL
            $password = ""; // Mật khẩu MySQL
            $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
        
            // Tạo kết nối đến MySQL
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối không thành công: " . $conn->connect_error);
            }

            // Lấy dữ liệu từ biểu mẫu
            $user = $_POST["user"];
            $email = $_POST["email"];
            $password = $_POST["password"];

            $stmt_check_email = $conn->prepare("SELECT email FROM nguoidung WHERE email = ?");
            $stmt_check_email->bind_param("s", $email);
            $stmt_check_email->execute();
            $result = $stmt_check_email->get_result();

            if ($result->num_rows > 0) {
                header("Location: ./register.php?error=email_existed");
                exit();
            } else {
                // Email không tồn tại, thực hiện INSERT
                $stmt_insert = $conn->prepare("INSERT INTO nguoidung 
                    (tenDangNhap, matKhau, email, ngayDangKy, idMau, fontChu, coChu, chieuRong, gianDong) 
                    VALUES (?, ?, ?, NOW(), 2, 'Palatino Linotype', 14, 1000, 1.5)");
                $stmt_insert->bind_param("sss", $user, $password, $email);
                $stmt_insert->execute();

                if ($stmt_insert->affected_rows > 0) {
                    $last_id = $conn->insert_id;
                    // Thêm dữ liệu vào bảng phanquyen
                    $stmt_insert_phanquyen = $conn->prepare("INSERT INTO phanquyen (idNguoiDung, idQuyen) VALUES (?, 2)");
                    $stmt_insert_phanquyen->bind_param("i", $last_id);
                    $stmt_insert_phanquyen->execute();

                    if ($stmt_insert_phanquyen->affected_rows > 0) {
                        // Thành công
                        header("Location: ./login.php");
                        exit();
                    } else {
                        echo "<script>alert('Có lỗi khi thêm dữ liệu vào bảng phanquyen');</script>";
                    }

                    $stmt_insert_phanquyen->close();
                } else {
                    echo "<script>alert('Có lỗi khi thêm dữ liệu vào bảng nguoidung');</script>";
                }

            }
            $stmt_check_email->close();
            $stmt_insert->close();

            $conn->close(); // Đóng kết nối CSDL
        }
        ?>

    </div>

    <script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

    <!-- pop-up-box-js-file -->
    <script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
    <!--//pop-up-box-js-file -->
    <script>
        $(document).ready(function () {
            $('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
                type: 'inline',
                fixedContentPos: false,
                fixedBgPos: true,
                overflowY: 'auto',
                closeBtnInside: true,
                preloader: false,
                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

        });
    </script>

</body>
<!-- //Body -->

</html>