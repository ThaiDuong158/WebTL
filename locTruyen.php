<?php
session_start();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <?php
    include('link.php');
    ?>
    <title>Document</title>

</head>

<body class="page-home">
    <div id="app">
        <?php
        include('header.php');
        include('function.php');
        ?>
        <style>
            .main .container {
                border: 1px solid #666;
                box-shadow: 5px 5px 5px #666;
            }
        </style>

        <main class="main pb-4">
            <book-grid genre="-1" tag="-1" status="-1" props="-1" limit="20" sort_by="new_chap_at" page="1"
                keyword="-1">
            </book-grid>
            <div id="bookGrid" class="container">
                <!---->
                <div class="page-content rounded-2">
                    <div class="row">
                        <div class="col-3">
                            <aside>
                                <div class="py-2 border-bottom">
                                    <div class="font-weight-semibold mt-1 mb-2">Thể loại</div>
                                    <ul class="list-facet list-unstyled d-block flex-wrap m-0">
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
                                        $sql = "SELECT * FROM `theloai`";
                                        $result = $conn->query($sql);
                                        // Kiểm tra và xử lý kết quả trả về
                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                if (isset($_GET["theLoai"]) && $_GET["theLoai"] == $row["idTheLoai"]) {
                                                    echo "
                                                        <li>
                                                            <a href=\"javascript:void(0)\" class=\"item rounded active\" style=\"border:none;\" data-id=\"" . $row["idTheLoai"] . "\">
                                                                <small>" . $row["tenTheLoai"] . "</small>
                                                            </a>
                                                        </li>
                                                    ";
                                                } else {
                                                    echo "
                                                        <li>
                                                            <a href=\"javascript:void(0)\" class=\"item rounded\" style=\"border:none;\" data-id=\"" . $row["idTheLoai"] . "\">
                                                                <small>" . $row["tenTheLoai"] . "</small>
                                                            </a>
                                                        </li>
                                                    ";
                                                }

                                            }
                                            if (empty($_GET)) {
                                                echo "
                                                    <script>
                                                        document.addEventListener(\"DOMContentLoaded\", function() {
                                                            const links = document.querySelectorAll(\".item\");
                                                            links.forEach(link => {
                                                                link.addEventListener(\"click\", function(event) {
                                                                    event.preventDefault();
                                                        
                                                                    const id = this.getAttribute(\"data-id\");
                                                                    window.location.href = 'locTruyen.php?theLoai=' + id;
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                ";
                                            } else {
                                                $currentParams = http_build_query($_GET);
                                                echo "
                                                    <script>
                                                        document.addEventListener(\"DOMContentLoaded\", function() {
                                                            const links = document.querySelectorAll(\".item\");
                                                            links.forEach(link => {
                                                                link.addEventListener(\"click\", function(event) {
                                                                    event.preventDefault();
                                                                    const id = this.getAttribute(\"data-id\");
                                                                    const currentParams = '" . $currentParams . "';
                                                                    window.location.href = 'locTruyen.php?' + currentParams + '&theLoai=' + id;
                                                                });
                                                            });
                                                        });
                                                    </script>
                                                    ";
                                            }
                                        } else {
                                            echo "Không có dữ liệu";
                                        }

                                        $conn->close(); // Đóng kết nối
                                        ?>
                                    </ul>
                                </div>
                        </div>
                        <div class="col-9">
                            <div class="d-flex align-items-center mb-3">
                                <ul class="list-unstyled m-0 d-flex flex-wrap">
                                    <li class="nh-dropdown dropdown">
                                        <a href="javascript:void(0)" role="button" id="js-genres" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false"
                                            class="d-block dropdown-toggle pr-4 text-primary">
                                            <span class="ml-2 font-weight-semibold">Mới cập nhật</span>
                                        </a>
                                        <div aria-labelledby="js-genres" class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0);" class="dropdown-item active">
                                                Mới cập nhật
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                Mới đăng
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nh-dropdown dropdown">
                                        <a role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" class="d-block dropdown-toggle pr-4">
                                            <span class="ml-2 font-weight-semibold">Lượt đọc</span>
                                        </a>
                                        <div aria-labelledby="js-depute" class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                Lượt đọc [ngày]
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                Lượt đọc [tuần]
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                Lượt đọc [tháng]
                                            </a>
                                            <a href="javascript:void(0);" class="dropdown-item">
                                                Lượtđọc [toàn]
                                            </a>
                                        </div>
                                    </li>
                                    <li class="nh-dropdown dropdown">
                                        <a role="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" class="d-block dropdown-toggle pr-4">
                                            <span class="ml-2 font-weight-semibold">Điểm đánh giá</span>
                                        </a>
                                        <div aria-labelledby="js-depute" class="dropdown-menu dropdown-menu-right">
                                            <a href="javascript:void(0);" class="dropdown-item">Lượt đánh giá</a> <a
                                                href="javascript:void(0);" class="dropdown-item">Điểm đánh giá</a>
                                        </div>
                                    </li>
                                    <li class="nh-dropdown dropdown">
                                        <a href="javascript:void(0);" class="d-block pr-4 font-weight-semibold">
                                            Yêu thích
                                        </a>
                                    </li>
                                    <li class="nh-dropdown dropdown">
                                        <a href="javascript:void(0);" class="d-block pr-4 font-weight-semibold">
                                            Số chương
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row mb-3">
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
                                $rowsPerPage = 20;

                                // Trang hiện tại, mặc định là trang 1
                                if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                                    $currentPage = (int) $_GET['page'];
                                } else {
                                    $currentPage = 1;
                                }

                                $sql = "SELECT truyen.*,tenTheLoai, COUNT(chuongtruyen.idTruyen) AS SoChuong 
                                            FROM truyen 
                                            INNER JOIN truyen_theloai ON truyen.idTruyen = truyen_theloai.idTruyen 
                                            INNER JOIN theloai ON theloai.idTheLoai = truyen_theloai.idTheLoai 
                                            LEFT JOIN chuongtruyen ON truyen.idTruyen = chuongtruyen.idTruyen 
                                            GROUP BY truyen.idTruyen, tenTruyen, tacGia 
                                            ORDER BY chuongtruyen.ngayThem DESC
                                            LIMIT 10;";
                                $result = $conn->query($sql);

                                // Kiểm tra và xử lý kết quả trả về
                                if ($result->num_rows > 0) {
                                    // Lặp qua từng hàng dữ liệu
                                    $count = 1;
                                    while ($row = $result->fetch_assoc()) {

                                        echo "
                                        <div class=\"col-6\">
                                            <div class=\"media border-bottom py-4\">
                                                <a class=\"nh-thumb nh-thumb--72 shadow mr-3\" href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\">
                                                    <img src=\"" . $row["hinhAnh"] . "\" alt width=\"72\">
                                                </a>
                                                <div class=\"media-body\">
                                                    <h2 class=\"fz-body mb-2 \">
                                                        <a href=\"/truyen/" . convertToSlug($row["tenTruyen"]) . "/" . convertToSlug($row["tenTruyen"]) . ".php\" class=\"d-block\" name =\"value-$count\">" . $row["tenTruyen"] . "</a>
                                                    </h2>
                                                    <div class=\"text-secondary text-overflow-2-lines fz-14 mb-3\">
                                                        " . $row["tomTat"] . "
                                                    </div>
                                                    <div class=\"d-flex align-items-start\">
                                                        <div class=\"d-flex align-items-center mr-auto text-secondary\">
                                                        <div>
                                                        <div class=\"d-flex align-items-center fz-13 mr-4 mb-1\">
                                                        <span class=\"icon-wrapper mr-2\"><i class=\"nh-icon fa-regular fa-user mr-1\"></i>
                                                        </span> 
                                                        <span class=\"truncate-140\">
                                                            " . $row["tacGia"] . "
                                                        </span>
                                                    </div> 
                                                    <div class=\"d-flex align-items-center fz-13 mr-4\">
                                                        <span class=\"icon-wrapper mr-2\">
                                                            <i class=\"nh-icon fa-solid fa-bars fz-13 mr-2\"></i>
                                                        </span>
                                                        " . $row["SoChuong"] . " Chương
                                                    </div>
                                                </div>
                                                        </div>
                                                        <a href=\"/\">
                                                            <span
                                                                class=\"d-inline-block border border-primary small px-2 text-primary ml-auto truncate-100\">" . $row["tenTheLoai"] . "</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                    ";
                                    }
                                } else {
                                    echo "Không có dữ liệu";
                                }

                                $sqlCount = "SELECT COUNT(*) AS total FROM truyen"; // Truy vấn để tính tổng số dòng dữ liệu
                                $resultCount = $conn->query($sqlCount);
                                $rowCount = $resultCount->fetch_assoc();
                                $totalRows = $rowCount['total'];

                                $totalPages = ceil($totalRows / $rowsPerPage);

                                // Hiển thị các nút phân trang
                                echo'</div>';
                                echo '<nav aria-label="Pagination" class="d-flex justify-content-end">
                                        <ul data-v-82963a40="" class="pagination pagination-sm">
                                        <li data-v-82963a40="" class="disabled"><a data-v-82963a40="" tabindex="-1" class="page-link rounded">&lt;</a></li>';
                                for ($i = 1; $i <= $totalPages; $i++) {
                                    echo '
                                            <li data-v-82963a40="" class="page-item active">
                                                <a data-v-82963a40="" tabindex="0" class="page-link rounded"href="/locTruyen.php?page=' . $i . '">' . $i . '</a>
                                            </li>
                                    ';
                                }
                                echo '
                                        <li data-v-82963a40="" class=""><a data-v-82963a40="" tabindex="0" class="page-link rounded">&gt;</a></li>
                                    </ul>
                                </nav>';

                                $conn->close(); // Đóng kết nối
                                ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
        include("footer.php");
        ?>
</body>
<script>
    document.addEventListener('click', function (event) {
        var dropdownToggles = document.querySelectorAll(".dropdown-toggle");

        dropdownToggles.forEach((toggle) => {
            var parent = toggle.parentNode;
            var dropdownMenu = parent.querySelector(".dropdown-menu");

            var isClickInside = parent.contains(event.target);

            if (!isClickInside) {
                parent.classList.remove("show");
                dropdownMenu.classList.remove("show");
            }
        });
    });

    Array.from(document.querySelectorAll(".dropdown-toggle")).forEach((tab) => {
        tab.onclick = (e) => {
            e.currentTarget.parentNode.classList.toggle("show");
            e.currentTarget.parentNode.querySelector(".dropdown-menu").classList.toggle("show");
        };
    });
</script>

</html>