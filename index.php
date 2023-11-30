<!DOCTYPE html>
<html lang="vi">
<?php
session_start();
?>

<head>
    <?php
    include('link.php');
    ?>
    <title>Document</title>
</head>

<body class="page-home" method="post">
    <div id="app">
        <?php
        include('header.php');
        include('function.php');
        ?>
        <style>
            .main .shadow--hover:hover {
                border: 1px solid #666;
                box-shadow: 0px 0px 5px #666;
            }
        </style>
        <main class="main pb-4">
            <div class="container">
                <div class="page-content rounded-2">
                    <div class="row py-4 shadow--hover">
                        <div class="col-8">
                            <section class="nh-section">
                                <div class="d-flex align-items-center mb-4">
                                    <h2 class="h4 mb-0">Biên tập viên đề cử</h2>
                                    <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                </div>
                                <?php
                                // Thông tin kết nối đến cơ sở dữ liệu MySQL
                                $servername = "localhost"; // Địa chỉ server MySQL
                                $username = "root"; // Tên đăng nhập MySQL
                                $password = ""; // Mật khẩu MySQL
                                $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                                
                                // Tạo kết nối đến cơ sở dữ liệu
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                }
                                $limit = 8;
                                $col = 2;
                                $sql = "SELECT * FROM truyen,truyen_theloai, theloai WHERE truyen_theloai.idTruyen = truyen.idTruyen and truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY truyen.idTruyen LIMIT " . $limit . ";";
                                $result = $conn->query($sql);

                                // Kiểm tra và xử lý kết quả trả về
                                if ($result->num_rows > 0) {
                                    // Lặp qua từng hàng dữ liệu
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {
                                        // Xử lý dữ liệu ở đây
                                        if ($count % $col == 1) {
                                            echo "<div class=\"row\">";
                                        }
                                        echo "
                                                    <div class=\"col-6\">
                                                        <div class=\"media\">
                                                            <a class=\"nh-thumb nh-thumb--72 shadow mr-3\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\">
                                                                <img src=\"" . $row["hinhAnh"] . "\" alt width=\"72\">
                                                            </a>
                                                            <div class=\"media-body\">
                                                                <h2 class=\"fz-body text-overflow-1-lines mb-2 \">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\" name =\"value-$count\" >" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"text-secondary fz-14 text-overflow-2-lines\">
                                                                    " . $row["tomTat"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center mt-2 py-1\">
                                                                    <div class=\"d-flex align-items-center mr-auto text-secondary\">
                                                                        <span class=\"truncate-140 text-left\">
                                                                            <i class=\"fa-regular fa-user mr-1\">
                                                                            </i>
                                                                            " . $row["tacGia"] . "
                                                                        </span>
                                                                    </div>
                                                                    <a href=\"/\">
                                                                        <span
                                                                            class=\"d-inline-block border border-primary small px-2 text-primary truncate-100\">" . $row["tenTheLoai"] . "</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                ";
                                        if ($count == $limit) {
                                            echo "</div>";
                                        } else if ($count % $col == 0) {
                                            echo "</div><hr>";
                                        }
                                        $count++;
                                        createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                    }
                                } else {
                                    echo "Không có dữ liệu";
                                }
                                $conn->close();
                                ?>
                            </section>
                        </div>
                        <div class="col-4">
                            <section class="nh-section" id="continue-reading">
                                <div id="continue-reading-template">
                                    <div class="d-flex align-items-center mb-3">
                                        <h2 class="h4 mb-0">Đang đọc</h2>
                                        <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                    </div>
                                    <ul class="list-unstyled m-0">
                                        <continue-reading>

                                        </continue-reading>
                                        <li class="media align-items-center py-2 mb-1" id="item-reading-0">
                                            <a class="nh-thumb nh-thumb--32 shadow mr-3" href="/">
                                                <img src="./asset/images/test" width="32">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="fz-body mb-1">
                                                    <a href="/" class="text-overflow-1-lines">Yêu Ma Loạn Thế, Ta Có
                                                        Thể Ưu
                                                        Hóa Vạn Vật </a>
                                                </h2>
                                                <div class="text-muted text-overflow-1-lines">Đã đọc: 0/158 </div>
                                            </div>
                                        </li>
                                        <li class="media align-items-center py-2 mb-1" id="item-reading-1">
                                            <a class="nh-thumb nh-thumb--32 shadow mr-3" href="/">
                                                <img src="./asset/images/test.jpg" width="32">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="fz-body mb-1">
                                                    <a href="/" class="text-overflow-1-lines">Hệ Thống Phú Ta Trường
                                                        Sinh, Ta
                                                        Chịu Chết Tất Cả Mọi Người </a>
                                                </h2>
                                                <div class="text-muted text-overflow-1-lines">Đã đọc: 0/407 </div>
                                            </div>
                                        </li>
                                        <li class="media align-items-center py-2 mb-1" id="item-reading-2">
                                            <a class="nh-thumb nh-thumb--32 shadow mr-3" href="/">
                                                <img src="./asset/images/test.jpg" width="32">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="fz-body mb-1">
                                                    <a href="/" class="text-overflow-1-lines">Ta Tại Loạn Thế Dòng Vô
                                                        Hạn Hợp
                                                        Thành </a>
                                                </h2>
                                                <div class="text-muted text-overflow-1-lines">Đã đọc: 0/152 </div>
                                            </div>
                                        </li>
                                        <li class="media align-items-center py-2 mb-1" id="item-reading-3">
                                            <a class="nh-thumb nh-thumb--32 shadow mr-3" href="/">
                                                <img src="./asset/images/test.jpg">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="fz-body mb-1">
                                                    <a href="/" class="text-overflow-1-lines">Liệp Mệnh Nhân </a>
                                                </h2>
                                                <div class="text-muted text-overflow-1-lines">Đã đọc: 0/926 </div>
                                            </div>
                                        </li>
                                        <li class="media align-items-center py-2 mb-1" id="item-reading-4">
                                            <a class="nh-thumb nh-thumb--32 shadow mr-3" href="/">
                                                <img src="./asset/images/test.jpg" width="32">
                                            </a>
                                            <div class="media-body">
                                                <h2 class="fz-body mb-1">
                                                    <a href="/" class="text-overflow-1-lines">Đấu La: Hố Ngọc Tiểu Cương
                                                        Liền Có
                                                        Thể Trở Nên Mạnh </a>
                                                </h2>
                                                <div class="text-muted text-overflow-1-lines">Đã đọc: 0/40 </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <hr class="my-3">
                            <section class="nh-section">
                                <div class="d-flex align-items-center mb-3">
                                    <h2 class="h4 mb-0">Hướng dẫn</h2>
                                    <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                </div>
                                <ul class="list-unstyled m-0 nh-list">
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">Tôi thấy số &quot;Đã đọc
                                            &quot;trong
                                            đánh giá của tôi không chính xác?</a>
                                    </li>
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">Thế còn đánh giá ở cuối
                                            chương truyện là gì?</a>
                                    </li>
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">
                                            Tôi muốn xem điểm hâm mộ của mình, vào đâu để xem?</a>
                                    </li>
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">
                                            Làm sao đổi màu nền, cỡ chữ,font chữ
                                        </a>
                                    </li>
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">Quy định khi tặng Hoa</a>
                                    </li>
                                    <li class>
                                        <a href="/" class="d-block py-1 mb-1 text-truncate">Tôi còn thắc mắc khác?</a>
                                    </li>
                                </ul>
                            </section>
                        </div>
                    </div>
                </div>
                <section class="nh-section py-3 shadow--hover">
                    <div class="d-flex align-items-center mb-3 ">
                        <h2 class="h4 mb-0">Mới cập nhật </h2>
                        <a href="/" class="link--see-more ml-3 text-primary">Xem tất cả </a>
                    </div>
                    <table class="table table-striped table-borderless table-hover border-top fz-14">
                        <?php
                        // Thông tin kết nối đến cơ sở dữ liệu MySQL
                        $servername = "localhost"; // Địa chỉ server MySQL
                        $username = "root"; // Tên đăng nhập MySQL
                        $password = ""; // Mật khẩu MySQL
                        $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                        
                        // Tạo kết nối đến cơ sở dữ liệu
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Kiểm tra kết nối
                        if ($conn->connect_error) {
                            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                        }
                        $limit = 10;
                        $sql = "SELECT truyen.idTruyen,tenTruyen,tacGia,tieuDe,ngayThem,tenTheLoai FROM truyen,chuongtruyen, truyen_theloai, theloai WHERE truyen_theloai.idTruyen = truyen.idTruyen and truyen_theloai.idTheLoai = theloai.idTheLoai and truyen.idTruyen = chuongtruyen.idTruyen ORDER BY ngayThem DESC LIMIT " . $limit . ";";
                        $result = $conn->query($sql);
                        // Kiểm tra và xử lý kết quả trả về
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "
                                    <tr>
                                    <td class=\"align-middle text-tertiary\">
                                        <span class=\"text-overflow-1-lines\">" . $row["tenTheLoai"] . "</span>
                                    </td>
                                    <td class=\"align-middle w-25\">
                                        <h2 class=\"fz-body m-0 text-overflow-1-lines\">
                                            <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\">" . $row["tenTruyen"] . "</a>
                                        </h2>
                                    </td>
                                    <td class=\"align-middle w-25\">
                                        <a class=\"text-overflow-1-lines\" href=\"/\">" . $row["tieuDe"] . "</a>
                                    </td>
                                    <td class=\"align-middle\">
                                        <span class=\"text-overflow-1-lines\">" . $row["tacGia"] . "</span>
                                    </td>
                                    <td class=\"align-middle text-tertiary text-right\">" . compareTime('' . $row["ngayThem"] . '') . "</td>
                                    </tr>
                                    ";
                                createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                            }
                        } else {
                            echo "Không có dữ liệu";
                        }
                        $conn->close();
                        ?>
                    </table>
                </section>
            </div>
            <div class="home-ranking py-4">
                <div class="container py-2">
                    <div class="row">
                        <div class="col-4">
                            <section class="nh-section home-ranking-block bg-white rounded-2 px-4 pt-3 pb-2">
                                <div class="d-flex align-items-center py-1">
                                    <h2 class="h4 m-0 font-weight-semibold">Đọc nhiều tuần </h2>
                                    <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                </div>
                                <?php
                                $servername = "localhost"; // Địa chỉ server MySQL
                                $username = "root"; // Tên đăng nhập MySQL
                                $password = ""; // Mật khẩu MySQL
                                $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                                
                                // Tạo kết nối đến cơ sở dữ liệu
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                }
                                $sql = "SELECT * FROM truyen,truyen_theloai,theloai WHERE truyen.idTruyen = truyen_theloai.idTruyen AND truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY soLuotXem DESC LIMIT 10;";

                                $result = $conn->query($sql);

                                // Kiểm tra và xử lý kết quả trả về
                                if ($result->num_rows > 0) {
                                    // Lặp qua từng hàng dữ liệu
                                    $count = 1;
                                    echo "<ul class=\"list-unstyled list-ranking m-0\">";
                                    while ($row = $result->fetch_assoc()) {
                                        // Xử lý dữ liệu ở đây
                                        echo "
                                                <li class=\"item item-featured\">
                                                    <div class=\"index index-$count\">";
                                        if ($count < 4) {
                                            echo "<i class=\"svg-icon icon-medal-$count\"></i>";
                                        } else {
                                            echo $count;
                                        }
                                        echo "
                                                    </div>";
                                        if ($count == 1)
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"info py-3\">
                                                                <h2 class=\"mb-1 fz-body text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"d-flex align-items-center mb-2 text-success\">
                                                                    <span class=\"mr-2\">" . $row["soLuotXem"] . "</span>
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 mb-1 text-overflow-1-lines\">
                                                                    <i class=\"fa-regular fa-user mr-2\"></i>
                                                                    " . $row["tacGia"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 text-overflow-1-lines\">
                                                                    <i class=\"fa-solid fa-book mr-2\"></i>
                                                                    " . $row["tenTheLoai"] . "
                                                                </div>
                                                            </div>
                                                            <div class=\"thumb ml-auto pr-3 py-3\">
                                                                <div class=\"book-cover\">
                                                                    <a class=\"book-cover-link\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\" title=\"" . $row["tenTruyen"] . "\">
                                                                        <img src=\"" . $row["hinhAnh"] . "\" alt=\"" . $row["tenTruyen"] . "\">
                                                                    </a>
                                                                    <span class=\"book-cover-shadow\"></span>
                                                                </div>
                                                            </div>
                                                        </div>";
                                        else
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"media-body py-2\">
                                                                <h2 class=\"m-0 fz-body font-weight-normal pr-3 text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                            </div>
                                                            <span class=\"text-secondary\">" . $row["soLuotXem"] . "</span>
                                                        </div>";
                                        echo "
                                                </li>";
                                        $count++;
                                        createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không có dữ liệu";
                                }
                                $conn->close();
                                ?>
                            </section>
                        </div>
                        <div class="col-4">
                            <section class="nh-section home-ranking-block bg-white rounded-2 px-4 pt-3 pb-2">
                                <div class="d-flex align-items-center py-1">
                                    <h2 class="h4 m-0 font-weight-semibold">Thịnh hành tuần </h2>
                                    <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                </div>
                                <?php
                                $servername = "localhost"; // Địa chỉ server MySQL
                                $username = "root"; // Tên đăng nhập MySQL
                                $password = ""; // Mật khẩu MySQL
                                $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                                
                                // Tạo kết nối đến cơ sở dữ liệu
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                }
                                $sql = "SELECT * FROM truyen,truyen_theloai,theloai WHERE truyen.idTruyen = truyen_theloai.idTruyen AND truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY soLuotXem DESC LIMIT 10;";
                                $result = $conn->query($sql);

                                // Kiểm tra và xử lý kết quả trả về
                                if ($result->num_rows > 0) {
                                    // Lặp qua từng hàng dữ liệu
                                    $count = 1;
                                    echo "<ul class=\"list-unstyled list-ranking m-0\">";
                                    while ($row = $result->fetch_assoc()) {
                                        // Xử lý dữ liệu ở đây
                                        echo "
                                                <li class=\"item item-featured\">
                                                    <div class=\"index index-$count\">";
                                        if ($count < 4) {
                                            echo "<i class=\"svg-icon icon-medal-$count\"></i>";
                                        } else {
                                            echo $count;
                                        }
                                        echo "
                                                    </div>";
                                        if ($count == 1)
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"info py-3\">
                                                                <h2 class=\"mb-1 fz-body text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"d-flex align-items-center mb-2 text-success\">
                                                                    <span class=\"mr-2\">" . $row["soLuotXem"] . "</span>
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 mb-1 text-overflow-1-lines\">
                                                                    <i class=\"fa-regular fa-user mr-2\"></i>
                                                                    " . $row["tacGia"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 text-overflow-1-lines\">
                                                                    <i class=\"fa-solid fa-book mr-2\"></i>
                                                                    " . $row["tenTheLoai"] . "
                                                                </div>
                                                            </div>
                                                            <div class=\"thumb ml-auto pr-3 py-3\">
                                                                <div class=\"book-cover\">
                                                                    <a class=\"book-cover-link\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\" title=\"" . $row["tenTruyen"] . "\">
                                                                        <img src=\"" . $row["hinhAnh"] . "\" alt=\"" . $row["tenTruyen"] . "\">
                                                                    </a>
                                                                    <span class=\"book-cover-shadow\"></span>
                                                                </div>
                                                            </div>
                                                        </div>";
                                        else
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"media-body py-2\">
                                                                <h2 class=\"m-0 fz-body font-weight-normal pr-3 text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                            </div>
                                                            <span class=\"text-secondary\">" . $row["soLuotXem"] . "</span>
                                                        </div>";
                                        echo "
                                                </li>";
                                        $count++;
                                        createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không có dữ liệu";
                                }
                                $conn->close();
                                ?>
                            </section>
                        </div>
                        <div class="col-4">
                            <section class="nh-section home-ranking-block bg-white rounded-2 px-4 pt-3 pb-2">
                                <div class="d-flex align-items-center py-1">
                                    <h2 class="h4 m-0 font-weight-semibold">Đề cử tuần </h2>
                                    <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                                </div>
                                <?php
                                $servername = "localhost"; // Địa chỉ server MySQL
                                $username = "root"; // Tên đăng nhập MySQL
                                $password = ""; // Mật khẩu MySQL
                                $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                                
                                // Tạo kết nối đến cơ sở dữ liệu
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                }
                                $sql = "SELECT * FROM truyen,truyen_theloai,theloai WHERE truyen.idTruyen = truyen_theloai.idTruyen AND truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY soLuotXem DESC LIMIT 10;";

                                $result = $conn->query($sql);

                                // Kiểm tra và xử lý kết quả trả về
                                if ($result->num_rows > 0) {
                                    // Lặp qua từng hàng dữ liệu
                                    $count = 1;
                                    echo "<ul class=\"list-unstyled list-ranking m-0\">";
                                    while ($row = $result->fetch_assoc()) {
                                        // Xử lý dữ liệu ở đây
                                        echo "
                                                <li class=\"item item-featured\">
                                                    <div class=\"index index-$count\">";
                                        if ($count < 4) {
                                            echo "<i class=\"svg-icon icon-medal-$count\"></i>";
                                        } else {
                                            echo $count;
                                        }
                                        echo "
                                                    </div>";
                                        if ($count == 1)
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"info py-3\">
                                                                <h2 class=\"mb-1 fz-body text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"d-flex align-items-center mb-2 text-success\">
                                                                    <span class=\"mr-2\">" . $row["soLuotXem"] . "</span>
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 mb-1 text-overflow-1-lines\">
                                                                    <i class=\"fa-regular fa-user mr-2\"></i>
                                                                    " . $row["tacGia"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center text-secondary fz-13 text-overflow-1-lines\">
                                                                    <i class=\"fa-solid fa-book mr-2\"></i>
                                                                    " . $row["tenTheLoai"] . "
                                                                </div>
                                                            </div>
                                                            <div class=\"thumb ml-auto pr-3 py-3\">
                                                                <div class=\"book-cover\">
                                                                    <a class=\"book-cover-link\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\" title=\"" . $row["tenTruyen"] . "\">
                                                                        <img src=\"" . $row["hinhAnh"] . "\" alt=\"" . $row["tenTruyen"] . "\">
                                                                    </a>
                                                                    <span class=\"book-cover-shadow\"></span>
                                                                </div>
                                                            </div>
                                                        </div>";
                                        else
                                            echo "
                                                        <div class=\"content media align-items-center py-1\">
                                                            <div class=\"media-body py-2\">
                                                                <h2 class=\"m-0 fz-body font-weight-normal pr-3 text-overflow-1-lines\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                            </div>
                                                            <span class=\"text-secondary\">" . $row["soLuotXem"] . "</span>
                                                        </div>";
                                        echo "
                                                </li>";
                                        $count++;
                                        createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không có dữ liệu";
                                }
                                $conn->close();
                                ?>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row py-4 shadow--hover">
                    <div class="col-12">
                        <section class="nh-section">
                            <div class="d-flex align-items-center mb-4">
                                <h2 class="h4 mb-3">Đánh giá cao </h2>
                                <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                            </div>
                            <?php
                            // Thông tin kết nối đến cơ sở dữ liệu MySQL
                            $servername = "localhost"; // Địa chỉ server MySQL
                            $username = "root"; // Tên đăng nhập MySQL
                            $password = ""; // Mật khẩu MySQL
                            $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                            
                            // Tạo kết nối đến cơ sở dữ liệu
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }
                            $limit = 9;
                            $col = 3;
                            $sql = "SELECT * FROM truyen,truyen_theloai,theloai WHERE truyen.idTruyen = truyen_theloai.idTruyen AND truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY soLuotXem DESC LIMIT $limit;";
                            $result = $conn->query($sql);

                            // Kiểm tra và xử lý kết quả trả về
                            if ($result->num_rows > 0) {
                                // Lặp qua từng hàng dữ liệu
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                    // Xử lý dữ liệu ở đây
                                    if ($count % $col == 1) {
                                        echo "<div class=\"row\">";
                                    }
                                    echo "
                                                    <div class=\"col-4\">
                                                        <div class=\"media\">
                                                            <a class=\"nh-thumb nh-thumb--72 shadow mr-3\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\">
                                                                <img src=\"" . $row["hinhAnh"] . "\" alt width=\"72\">
                                                            </a>
                                                            <div class=\"media-body\">
                                                                <h2 class=\"fz-body text-overflow-1-lines mb-2\">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"d-flex align-items-center mb-2\">
                                                                    <div class=\"bg-danger rounded-3 h6 my-0 mr-3 text-white px-2 py-1\">5.00</div>
                                                                    <div class=\"text-success\">5 đánh giá </div>
                                                                </div>
                                                                <div class=\"text-secondary fz-14 text-overflow-2-lines\">
                                                                    " . $row["tomTat"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center mt-2 py-1\">
                                                                    <div class=\"d-flex align-items-center mr-auto text-secondary\">
                                                                        <span class=\"truncate-140 text-left\">
                                                                            <i class=\"fa-regular fa-user mr-1\">
                                                                            </i>
                                                                            " . $row["tacGia"] . "
                                                                        </span>
                                                                    </div>
                                                                    <a href=\"/\">
                                                                        <span
                                                                            class=\"d-inline-block border border-primary small px-2 text-primary truncate-100\">" . $row["tenTheLoai"] . "</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                ";
                                    if ($count == $limit) {
                                        echo "</div>";
                                    } else if ($count % $col == 0) {
                                        echo "</div><hr>";
                                    }
                                    $count++;
                                    createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                            $conn->close();
                            ?>
                        </section>
                    </div>
                </div>
                <div class="row py-4 shadow--hover">
                    <div class="col-12">
                        <section class="nh-section">
                            <div class="d-flex align-items-center my-4">
                                <h2 class="h4 m-0 font-weight-semibold">Mới hoàn thành </h2>
                                <a href="/" class="link--see-more ml-auto text-primary">Xem tất cả </a>
                            </div>
                            <?php
                            // Thông tin kết nối đến cơ sở dữ liệu MySQL
                            $servername = "localhost"; // Địa chỉ server MySQL
                            $username = "root"; // Tên đăng nhập MySQL
                            $password = ""; // Mật khẩu MySQL
                            $dbname = "web_truyen"; // Tên cơ sở dữ liệu MySQL
                            
                            // Tạo kết nối đến cơ sở dữ liệu
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Kiểm tra kết nối
                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }
                            $limit = 9;
                            $col = 3;
                            $sql = "SELECT * FROM truyen,truyen_theloai,theloai WHERE truyen.idTruyen = truyen_theloai.idTruyen AND truyen_theloai.idTheLoai = theloai.idTheLoai ORDER BY soLuotXem LIMIT $limit;";
                            $result = $conn->query($sql);

                            // Kiểm tra và xử lý kết quả trả về
                            if ($result->num_rows > 0) {
                                // Lặp qua từng hàng dữ liệu
                                $count = 1;
                                while ($row = $result->fetch_assoc()) {
                                    // Xử lý dữ liệu ở đây
                                    if ($count % $col == 1) {
                                        echo "<div class=\"row\">";
                                    }
                                    echo "
                                                    <div class=\"col-4\">
                                                        <div class=\"media\">
                                                            <a class=\"nh-thumb nh-thumb--72 shadow mr-3\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\">
                                                                <img src=\"" . $row["hinhAnh"] . "\" alt width=\"72\">
                                                            </a>
                                                            <div class=\"media-body\">
                                                                <h2 class=\"fz-body text-overflow-1-lines mb-2 \">
                                                                    <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php?isUser=".(isset($_GET["isUser"])?$_GET["isUser"]:'false')."\" class=\"d-block\">" . $row["tenTruyen"] . "</a>
                                                                </h2>
                                                                <div class=\"text-secondary fz-14 text-overflow-2-lines\">
                                                                    " . $row["tomTat"] . "
                                                                </div>
                                                                <div class=\"d-flex align-items-center mt-2 py-1\">
                                                                    <div class=\"d-flex align-items-center mr-auto text-secondary\">
                                                                        <span class=\"truncate-140 text-left\">
                                                                            <i class=\"fa-regular fa-user mr-1\">
                                                                            </i>
                                                                            " . $row["tacGia"] . "
                                                                        </span>
                                                                    </div>
                                                                    <a href=\"/\">
                                                                        <span
                                                                            class=\"d-inline-block border border-primary small px-2 text-primary truncate-100\">" . $row["tenTheLoai"] . "</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                ";
                                    if ($count == $limit) {
                                        echo "</div>";
                                    } else if ($count % $col == 0) {
                                        echo "</div><hr>";
                                    }
                                    $count++;
                                    createTemporaryHTMLFile("/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php",$row["idTruyen"]);
                                }
                            } else {
                                echo "Không có dữ liệu";
                            }
                            $conn->close();
                            ?>
                        </section>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include("footer.php");
        ?>
    </div>
</body>

</html>