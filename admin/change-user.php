<?php
include("header.php");
?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item active">
    <a class="nav-link" href="user.php">
        <i class="fa-solid fa-user"></i>
        <span>Người dùng</span></a>
</li>

<li class="nav-item">
    <a class="nav-link" href="truyen.php">
        <i class="fa-solid fa-book"></i>
        <span>Truyện</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <?php
        include("taiKhoan.php");
        ?>

        <style>
            .content {
                display: flex;
                flex-direction: column;
                width: 400px;
                max-width: 1200px;
                margin: 0 auto;
            }

            label {
                width: 140px;
            }

            input {
                width: 250px;
            }

            .button {
                display: flex;
                justify-content: space-around;
            }

            .btn {
                margin-top: 16px;
                border: 1px #666 solid;
                color: #000;
                opacity: 0.8;
                padding: 8px 24px;

            }
            .btn:hover {
                opacity: 1;
                background-color: rgb(78, 115, 223);
                color: #fff;
            }
        </style>

        <div class="content" method="post">
            <form method="post">
                <?php
                if (isset($_GET["id"])) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "web_truyen";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Kiểm tra kết nối
                    if ($conn->connect_error) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM nguoidung WHERE nguoidung.idNguoiDung = " . $_GET["id"] . " ;";
                    $result = $conn->query($sql);
                    // Kiểm tra và xử lý kết quả trả về
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '
                                        <div class="line">
                                            <label for="user">Tên Người Dùng:</label>
                                            <input type="text" id="user" value = "' . $row["tenDangNhap"] . '" name="user">
                                        </div>
                                        <div class="line">
                                            <label for="email">Mail:</label>
                                            <input type="text" id="email" value = "' . $row["email"] . '" name="email">
                                        </div>
                                        <div class="line">
                                            <label for="password">Mật Khẩu:</label>
                                            <input type="text" id="password" value = "' . $row["matKhau"] . '" name="password">
                                        </div>
                                    ';

                        }
                    } else {
                        echo "Không có dữ liệu";
                    }
                    $conn->close();
                } else {
                    echo '
                                <div class="line">
                                    <label for="user">Tên Người Dùng:</label>
                                    <input type="text" id="user">
                                </div>
                                <div class="line">
                                    <label for="email">Mail:</label>
                                    <input type="text" id="email">
                                </div>
                                <div class="line">
                                    <label for="password">Mật Khẩu:</label>
                                    <input type="text" id="password">
                                </div>
                                <div class="line">
                                    <label for="date">Ngày Đăng Ký:</label>
                                    <input type="date" id="date">
                                </div>
                            ';
                }
                ?>
                <div class="line button">
                    <button class="btn" name="btnSua">Sửa</button>
                </div>

                <?php
                if (isset($_POST['btnSua'])) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "web_truyen";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    // Kiểm tra kết nối
                    if ($conn->connect_error) {
                        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                    }

                    // Lấy dữ liệu từ form
                    $user = $_POST["user"];
                    $password = $_POST["password"];
                    $email = $_POST["email"];

                    $checkQuery = "SELECT * FROM nguoidung WHERE `email` = '$email' AND `idNguoiDung` != " . $_GET["id"];
                    $checkResult = $conn->query($checkQuery);

                    if ($checkResult->num_rows > 0) {
                        // Email đã tồn tại trong một bản ghi khác
                        echo "
                            <script>
                                alert('Email đã tồn tại trong hệ thống!');
                            </script>
                        ";
                    } else {
                        // Thực hiện truy vấn UPDATE
                        $query = "UPDATE `nguoidung` 
                            SET 
                            `tenDangNhap` = '$user', 
                            `matKhau` = '$password', 
                            `email` = '$email'
                            WHERE `nguoidung`.`idNguoiDung` = " . $_GET["id"];

                        // Thực thi truy vấn UPDATE
                        if ($conn->query($query) === TRUE) {
                            echo "
                                <script>
                                    alert('Cập nhật thành công!');
                                    window.location.href = 'http://localhost/admin/user.php';
                                </script>
                                ";
                        } else {
                            echo "
                                <script>
                                    alert('Cập nhật Thất Bại!" . $conn->error . "');
                                </script>
                            ";
                        }
                    }

                    // Đóng kết nối
                    $conn->close();
                }
                ?>

            </form>
        </div>

    </div>
    <!-- End of Main Content -->
    <?php
    include("footer.php");
    ?>