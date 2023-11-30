<header class="header--read" style="z-index:999999;">
    <nav class="navbar navbar--read navbar-light navbar-expand">
        <div class="container px-3">
            <?php
            if (isset($_GET["isUser"])) {
                echo "<a class=\"navbar-brand mr-4\" href=\" http://localhost/?isUser=" . $_GET["isUser"] . " \">";
            } else {
                echo "<a class=\"navbar-brand mr-4\" href=\" http://localhost/ \">";
            }
            ?>
            <img src="../asset/images/logo.png" alt height="48">
            </a>
            <ul class="list-unstyled mb-0 mr-auto d-flex justify-content-center">
                <li class="nav-item mr-4">
                    <?php
                    if (isset($_GET["isUser"])) {
                        echo "<a class=\"nav-link d-flex align-items-center\" href=\" http://localhost/locTruyen.php?isUser=" . $_GET["isUser"] . " \">";
                    } else {
                        echo "<a class=\"nav-link d-flex align-items-center\" href=\" http://localhost/locTruyen.php \">";
                    }
                    ?>
                        <i class="fa-solid fa-bars fz-13 mr-2"></i>
                        Danh sách
                    </a>
                </li>
            </ul>
            <div class="header__search-form ml-auto w-25" method="post">
                <input type="text" class="form-control border-primary" name="q" placeholder="Tìm kiếm">
                <button class="btn bg-transparent text-primary shadow-none" @click="searchKeyword()">
                    <i class="fa-solid fa-magnifying-glass float-left"></i>
                </button>
            </div>
            <?php
            // Kiểm tra xem có tham số 'isUser' được gửi qua URL không
            if (isset($_GET['isUser']) && $_GET['isUser'] == 'true') {
                if (isset($_SESSION['user'])) {
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
                    $sql = "SELECT * FROM nguoidung WHERE idNguoiDung = " . $_SESSION['user'] . " ";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        echo "
                                <ul id=\"info-user\" class=\"navbar-nav navbar-nav--auth ml-auto\" style=\"z-index: 9999;\">
                                    <li class=\"nav-item mr-4\">
                                        <a href=\"http://localhost/dangTruyen.php\" target=\"_blank\"
                                            class=\"nav-link d-flex align-items-center\">
                                                <i class=\"fa-solid fa-circle-arrow-up fz-13 mr-2\"></i>
                                                Đăng truyện 
                                        </a>
                                    </li>
                                    <li class=\"dropdown py-3\"><a href=\"javascript:void(0)\" role=\"button\" id=\"dropdown-notification\"
                                            data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"
                                            class=\"d-block text-body px-3 py-2\">
                                            <i class=\"fa-solid fa-bell \"></i>
                                            <span class=\"counter badge badge-primary rounded-circle\">6</span></a>
                                        <div aria-labelledby=\"dropdown-notification\"
                                            class=\"dropdown-menu dropdown-menu-right dropdown-menu--notification pb-0 rounded-0\">
                                            <ul class=\"list-unstyled mb-2 nh-list px-4\"><!---->
                                                <li><a href=\"javascript:void(0)\" class=\"d-block py-2 text-truncate\">Hướng dẫn sửa
                                                        lỗi bị đứng ở 99% khi nghe audio trên Android</a></li>
                                                <li><a href=\"javascript:void(0)\" class=\"d-block py-2 text-truncate\">Hướng dẫn sửa
                                                        lỗi bị đứng ở 99% khi nghe audio trên Android</a></li>
                                                <li><a href=\"javascript:void(0)\" class=\"d-block py-2 text-truncate\">Hướng dẫn sửa
                                                        lỗi bị đứng ở 99% khi nghe audio trên Android</a></li>
                                                <li><a href=\"javascript:void(0)\" class=\"d-block py-2 text-truncate\">Nhân dịp năm
                                                        mới, thân chúc chư vị đạo hữu một năm mới An Khang, Thịnh Vượng</a></li>
                                                <li><a href=\"javascript:void(0)\" class=\"d-block py-2 text-truncate\">Nhân dịp năm
                                                        mới, thân chúc chư vị đạo hữu một năm mới An Khang, Thịnh Vượng</a></li>
                                            </ul>
                                            <div class=\"bg-light border-top\"><a href=\"javascript:void(0)\"
                                                    class=\"d-block text-primary py-2 pl-4\">Xem tất cả</a></div>
                                        </div>
                                    </li>
                                    <li class=\"dropdown py-3\">
                                        <a role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\"
                                            aria-expanded=\"false\" class=\"d-flex align-items-center text-body px-3 py-2\"
                                            style=\"cursor: pointer;\" id=\"dropdown-user\">
                                            <div class=\"nh-avatar nh-avatar--24 mr-2\">
                                            <img src=\"../user/none.svg\" lazy=\"loaded\">
                                            </div> 
                                            " . $row["tenDangNhap"] . "
                                        </a>
                                        <div aria-labelledby=\"dropdown-profile\"
                                            class=\"dropdown-menu dropdown-menu-right dropdown-menu--profile px-4 rounded-0\">
                                            <div class=\"media mb-4\">
                                                <div class=\"nh-avatar nh-avatar--45 mr-3\">
                                                    <img src=\"../user/none.svg\"lazy=\"loading\"></div>
                                                <div class=\"media-body\" style=\"margin: auto;\">
                                                    <div class=\"font-weight-semibold mb-1\">
                                                    " . $row["tenDangNhap"] . "
                                                    </div>
                                                </div>
                                            </div>
                                            <ul class=\"list-unstyled m-0\">
                                                <li class=\"mt-2\"><a href=\"/tai-khoan\" class=\"d-block py-2\"> Hồ sơ </a></li>
                                                <li class=\"mt-2\"><a href=\"/tai-khoan/tu-truyen\" class=\"d-block py-2\"> Tủ truyện </a>
                                                </li>
                                                <li class=\"mt-2\"><a href=\"/tai-khoan/cai-dat\" class=\"d-block py-2\"> Cài đặt </a>
                                                </li>
                                                <!----><!---->
                                                <li class=\"dropdown-divider\"></li>
                                                <li>
                                                    <a href=\"javascript:void(0)\" class=\"d-block py-2\"> Thoát </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                                <script>
                                    var logoutLink = document.querySelector('#info-user .dropdown-menu--profile li:last-child a');
                                    if (logoutLink) {
                                        logoutLink.onclick = function(e) {
                                            e.preventDefault();
                                            window.location.href = 'http://localhost/index.php?isUser=false';
                                        };
                                    }
    
                                    document.addEventListener('click', function(event) {
                                        var dropdownNotification = document.querySelector('#info-user #dropdown-notification');
                                        var dropdownMenuNotification = document.querySelector('#info-user .dropdown-menu--notification');
                                        var dropdownUser = document.querySelector('#info-user #dropdown-user'); // Thêm dropdownUser
                                    
                                        if (!dropdownNotification || !dropdownMenuNotification || !dropdownUser) return;
                                    
                                        var isClickInsideNotification = dropdownNotification.contains(event.target);
                                        var isClickInsideUser = dropdownUser.contains(event.target); // Kiểm tra xem click có xảy ra trong dropdownUser hay không
                                    
                                        if (!isClickInsideNotification) {
                                            dropdownNotification.parentNode.classList.remove('show');
                                            dropdownMenuNotification.classList.remove('show');
                                        }
                                    
                                        if (!isClickInsideUser) { // Nếu click không xảy ra trong dropdownUser
                                            dropdownUser.classList.remove('show'); // Ẩn dropdownUser
                                            var dropdownMenuProfile = document.querySelector('#info-user .dropdown-menu--profile');
                                            if (dropdownMenuProfile) {
                                                dropdownMenuProfile.classList.remove('show');
                                            }
                                        }
                                    });
                                    
                                    var dropdownNotification = document.querySelector('#info-user #dropdown-notification');
                                    if (dropdownNotification) {
                                        dropdownNotification.onclick = function(e) {
                                            e.preventDefault();
                                            this.parentNode.classList.toggle('show');
                                            var dropdownMenuNotification = document.querySelector('#info-user .dropdown-menu--notification');
                                            if (dropdownMenuNotification) {
                                                dropdownMenuNotification.classList.toggle('show');
                                            }
                                        };
                                    }
                                    
                                    var dropdownUser = document.querySelector('#info-user #dropdown-user');
                                    if (dropdownUser) {
                                        dropdownUser.onclick = function(e) {
                                            e.preventDefault();
                                            this.classList.toggle('show');
                                            var dropdownMenuProfile = document.querySelector('#info-user .dropdown-menu--profile');
                                            if (dropdownMenuProfile) {
                                                dropdownMenuProfile.classList.toggle('show');
                                            }
                                        };
                                    }                            
                                </script>
                            ";

                    } else {
                        echo "Không có dữ liệu";
                    }
                    $conn->close();
                }
            } else {
                echo '
                        <ul class="list-unstyled mb-0 ml-auto d-flex justify-content-center" id="notUser">
                            <li class="mr-4">
                                <a class="d-flex align-items-center px-3 py-2" href="http://localhost/dangTruyen.php" target="_blank">
                                    <i class="fa-solid fa-circle-arrow-up fz-13 mr-2"></i>
                                    Đăng truyện
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo $loginUrl; ?>" id="login" class="d-block px-3 py-2">Đăng nhập </a>
                            </li>
                            <li>
                                <a href="http://localhost/web/register.php" id="register" class="d-block px-3 py-2">Đăng ký </a>
                            </li>
                        </ul>
                        <script src="./asset/js/navbar.js"></script>
                        <script>
                            document.getElementById(\'login\').addEventListener(\'click\', function(event) {
                                event.preventDefault();
                                var currentLocation = window.location.href; // Lấy URL hiện tại
                                var loginUrl = "http://localhost/web/login.php?currentLocation=" + encodeURIComponent(currentLocation); // Bao gồm location hiện tại trong URL
                                window.location.href = loginUrl; // Chuyển hướng đến trang login với URL được tạo
                            });
                    
                        </script>
                        ';
            }
            ?>
        </div>
    </nav>
</header>