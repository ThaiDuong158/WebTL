<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/table.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon ">
                    <img src="../asset/images/logo.png" alt="" height="48">
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">admin</span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>

                <table>
                    <tr>
                        <td class="user">Tên Người Dùng</td>
                        <td class="mail">Gmail</td>
                        <td class="password">Mật khẩu</td>
                        <td class="date">Ngày Đăng Ký</td>
                        <th class="setting"></th>
                        <th class="setting"></th>
                    </tr>
                    <?php
                    $servername = "localhost"; // Địa chỉ server MySQL
                    $username = "root"; // Tên đăng nhập MySQL
                    $password = ""; // Mật khẩu MySQL
                    $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                    
                    // Tạo kết nối đến cơ sở dữ liệu
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    $records_per_page = 14;
                    if (isset($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 1;
                    }
                    $start_from = ($page - 1) * $records_per_page;
                    $sql = "SELECT * FROM nguoidung, phanquyen WHERE idQuyen = 2 and phanquyen.idNguoiDung = nguoidung.idNguoiDung LIMIT $start_from, $records_per_page";
                    $result = $conn->query($sql);
                    // Kiểm tra và xử lý kết quả trả về
                    if ($result->num_rows > 0) {
                        // Lặp qua từng dòng dữ liệu và xử lý
                        while ($row = $result->fetch_assoc()) {
                            // Xử lý dữ liệu ở đây, ví dụ:
                            echo '
                                <tr>
                                    <td class="user">' . $row["tenDangNhap"] . '</td>
                                    <td class="mail">' . $row["email"] . '</td>
                                    <td class="password">' . $row["matKhau"] . '</td>
                                    <td class="date">' . $row["ngayDangKy"] . '</td>
                                    <th class="setting"><a href="http://localhost/admin/change-user.php?id=' . $row["idNguoiDung"] . '">Sửa</a></th>
                                    <th class="setting"><a href="http://localhost/admin/delete-user.php?id=' . $row['idNguoiDung'] . '">Xóa</a></th>
                                </tr>
                            ';
                        }
                    } else {
                        echo "Không có dữ liệu";
                    }
                    echo "
                    </table>";
                    $sql = "SELECT COUNT(*) AS total_records FROM nguoidung, phanquyen WHERE idQuyen = 2 and phanquyen.idNguoiDung = nguoidung.idNguoiDung";
                    $result = $conn->query($sql);
                    $row = $result->fetch_assoc();
                    $total_records = $row['total_records'];
                    $total_pages = ceil($total_records / $records_per_page);

                    // Tạo các nút phân trang
                    echo '<div class="pagination" style="
                    display: flex;
                    justify-content: flex-end;
                    max-width: 1200px;
                    margin: auto;
                ">';
                    for ($i = 1; $i <= $total_pages; $i++) {
                        echo '<a href="?page=' . $i . '" style="
                        padding: 8px;
                    ">' . $i . '</a>';
                    }
                    echo '</div>';
                    $conn->close(); // Đóng kết nối
                    ?>

            </div>
            <!-- End of Main Content -->
<?php 
    include'footer.php';
?>