<?php
include("header.php");
?>

<!-- Nav Item - Pages Collapse Menu -->

<li class="nav-item">
    <a class="nav-link" href="user.php">
        <i class="fa-solid fa-user">
        </i>
        <span>Người dùng
        </span>
    </a>
</li>


<li class="nav-item active">
    <a class="nav-link" href="truyen.php">
        <i class="fa-solid fa-book">
        </i>
        <span>Truyện</span>
    </a>
</li>



<!-- Divider -->

<hr class="sidebar-divider d-none d-md-block">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle">
    </button>
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

        <form method="post">
            <div class="col-md-8 col-12" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <?php
                            if (isset($_GET["id"])) {
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "web_truyen";
                                $conn = new mysqli($servername, $username, $password, $dbname);

                                if ($conn->connect_error) {
                                    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                }
                                $sql = "SELECT * FROM truyen
                                            WHERE idTruyen = " . $_GET["id"] . " ";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo '
                                    <div class="vue-avatar-cropper text-center mb-2">
                                        <div style="height: 200px;">
                                            <img id="previewImage" src=".' . $row["hinhAnh"] . '"
                                                width="150" height="200" class="">
                                        </div>
                                        <button type="button" class="btn my-1 btn-primary btn-sm mt-2" style="width: 150px;"
                                            onclick="triggerFileInput()">
                                            <span>Cập Nhật Ảnh Bìa</span>
                                        </button>
                                        <input accept="image/png, image/gif, image/jpeg, image/bmp, image/x-icon" type="file"
                                            id="fileInput" class="avatar-cropper-img-input" style="display: none;"
                                            onchange="previewFile()">
                                    </div>
                                    <script>
                                        function triggerFileInput() {
                                            var fileInput = document.getElementById(\'fileInput\');
                                            fileInput.click();
                                        }
            
                                        function previewFile() {
                                            var preview = document.getElementById(\'previewImage\');
                                            var file = document.getElementById(\'fileInput\').files[0];
                                            var reader = new FileReader();
            
                                            reader.onloadend = function () {
                                                preview.src = reader.result;
                                            };
            
                                            if (file) {
                                                reader.readAsDataURL(file);
                                            } else {
                                                preview.src = "";
                                            }
                                        }
                                    </script>
                                    ';
                                    }
                                }
                                $conn->close();
                            }
                            ?>

                        </div>

                        <form class="">
                            <div role="group" class="form-group" id="__BVID__2022">
                                <label for="bookName" class="d-block" id="__BVID__2022__BV_label_">
                                    Tên truyện
                                </label>
                                <div>
                                    <div role="group" class="input-group">
                                        <?php
                                        if (isset($_GET["id"])) {
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "web_truyen";
                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                            }
                                            $sql = "SELECT * FROM truyen
                                            WHERE idTruyen = " . $_GET["id"] . " ";

                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                <input id="bookName" name="bookName" type="text" value="' . $row["tenTruyen"] . '"
                                                    placeholder="Viết hoa chữ đầu mỗi từ: Giống Như Thế Này" class="form-control">
                                                ';
                                                }
                                            }
                                            $conn->close();
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div role="group" class="form-group" id="__BVID__2026">
                                <label for="bookDescription" class="d-block" id="__BVID__2026__BV_label_">Giới
                                    thiệu</label>
                                <div>
                                    <div role="group" class="input-group">
                                        <?php
                                        if (isset($_GET["id"])) {
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "web_truyen";
                                            $conn = new mysqli($servername, $username, $password, $dbname);

                                            if ($conn->connect_error) {
                                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                            }
                                            $sql = "SELECT * FROM truyen
                                            WHERE idTruyen = " . $_GET["id"] . " ";

                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                <textarea data-v-48a34928="" id="bookDescription" name="bookDescription"
                                                    placeholder="Tóm tắt cho truyện không nên quá dài mà nên ngắn gọn, tập trung, thú vị. Phần này rất quan trọng vì nó quyết định độc giả có đọc hay không. Tối đa 700 từ"
                                                    wrap="soft" class="form-control"
                                                    style="resize: none; overflow-y: scroll; height: 114px;"
                                                    spellcheck="false" >' . $row["tomTat"] . '</textarea>
                                                ';
                                                }
                                            }
                                            $conn->close();
                                        }
                                        ?>

                                    </div>
                                </div>
                                <div role="group" class="form-group" id="__BVID__2028">
                                    <label for="bookStatus" class="d-block" id="__BVID__2028__BV_label_">Tình trạng
                                    </label>
                                    <div>
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_truyen";
                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                        if ($conn->connect_error) {
                                            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                        }

                                        // Lấy tất cả các tình trạng từ bảng 'tinh_trang'
                                        $sql_all_statuses = "SELECT * FROM tinh_trang";
                                        $result_all_statuses = $conn->query($sql_all_statuses);

                                        // Lấy idTinhTrang từ bảng 'truyen' dựa trên idTruyen
                                        $idTruyen = $_GET["id"]; // Giả sử bạn có idTruyen từ URL
                                        $sql_truyen_tinhtrang = "SELECT idTinhTrang FROM truyen WHERE idTruyen = " . $idTruyen;
                                        $result_truyen_tinhtrang = $conn->query($sql_truyen_tinhtrang);

                                        $selected_status_id = null;

                                        // Nếu có kết quả từ bảng 'truyen', lấy idTinhTrang
                                        if ($result_truyen_tinhtrang->num_rows > 0) {
                                            $row_truyen_tinhtrang = $result_truyen_tinhtrang->fetch_assoc();
                                            $selected_status_id = $row_truyen_tinhtrang["idTinhTrang"];
                                        }

                                        // Hiển thị dropdown list
                                        if ($result_all_statuses->num_rows > 0) {
                                            echo '<select class="custom-select" id="bookStatus" name="bookStatus">';
                                            while ($row = $result_all_statuses->fetch_assoc()) {
                                                $option_value = $row["idTinhTrang"];
                                                $option_text = $row["tinhTrang"];
                                                $selected = ($option_value == $selected_status_id) ? "selected" : "";
                                                echo '<option value="' . $option_value . '" ' . $selected . '>' . $option_text . '</option>';
                                            }
                                            echo '</select>';
                                        }

                                        $conn->close();
                                        ?>
                                    </div>
                                </div>
                                <div role="group" class="form-group" id="__BVID__2030">
                                    <label for="bookGenre" class="d-block" id="__BVID__2030__BV_label_">Thể loại
                                    </label>
                                    <div>
                                        <?php
                                        $servername = "localhost";
                                        $username = "root";
                                        $password = "";
                                        $dbname = "web_truyen";
                                        $conn = new mysqli($servername, $username, $password, $dbname);

                                        if ($conn->connect_error) {
                                            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                                        }

                                        // Lấy tất cả thể loại từ bảng 'theloai'
                                        $sql_all_categories = "SELECT * FROM theloai";
                                        $result_all_categories = $conn->query($sql_all_categories);

                                        // Lấy idTheLoai từ bảng 'truyen_theloai' dựa trên idTruyen
                                        $idTruyen = $_GET["id"]; // Giả sử bạn có idTruyen từ URL
                                        $sql_truyen_theloai = "SELECT idTheLoai FROM truyen_theloai WHERE idTruyen = " . $idTruyen;
                                        $result_truyen_theloai = $conn->query($sql_truyen_theloai);

                                        $selected_category_id = null;

                                        // Nếu có kết quả từ bảng 'truyen_theloai', lấy idTheLoai
                                        if ($result_truyen_theloai->num_rows > 0) {
                                            $row_truyen_theloai = $result_truyen_theloai->fetch_assoc();
                                            $selected_category_id = $row_truyen_theloai["idTheLoai"];
                                        }

                                        // Hiển thị dropdown list
                                        if ($result_all_categories->num_rows > 0) {
                                            echo '<select class="custom-select" id="bookGenre" name="bookGenre" >';
                                            while ($row = $result_all_categories->fetch_assoc()) {
                                                $option_value = $row["idTheLoai"];
                                                $option_text = $row["tenTheLoai"];
                                                $selected = ($option_value == $selected_category_id) ? "selected" : "";
                                                echo '<option value="' . $option_value . '" ' . $selected . '>' . $option_text . '</option>';
                                            }
                                            echo '</select>';
                                        }

                                        $conn->close();
                                        ?>


                                    </div>
                                </div>
                                <button type="submit" name="btnSubmit" class="btn btn-primary btn-block">
                                    <span>Cập Nhật</span>
                                </button>
                        </form>
                        <?php
                        if (isset($_POST["btnSubmit"])) {
                            $bookName = $_POST["bookName"];
                            $bookDescription = $_POST["bookDescription"];
                            $selectedStatus = $_POST["bookStatus"];
                            $selectedGenre = $_POST["bookGenre"];

                            // Thực hiện kết nối đến cơ sở dữ liệu
                            $servername = "localhost";
                            $username = "root";
                            $password = "";
                            $dbname = "web_truyen";
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            if ($conn->connect_error) {
                                die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
                            }

                            // Truy vấn cập nhật dữ liệu trong bảng 'truyen' với các giá trị đã nhận được từ form
                            $sql_update_truyen = "UPDATE truyen SET tenTruyen = '$bookName', tomTat = '$bookDescription' WHERE idTruyen = " . $_GET["id"];
                            $result_update_truyen = $conn->query($sql_update_truyen);

                            // Truy vấn cập nhật dữ liệu trong bảng 'truyen_theloai'
                            $sql_update_truyen_theloai = "UPDATE truyen_theloai SET idTheLoai = $selectedGenre WHERE idTruyen = " . $_GET["id"];
                            $result_update_truyen_theloai = $conn->query($sql_update_truyen_theloai);

                            // Truy vấn cập nhật dữ liệu trong bảng 'truyen' với tình trạng được chọn từ form
                            $sql_update_truyen_status = "UPDATE truyen SET idTinhTrang = $selectedStatus WHERE idTruyen = " . $_GET["id"];
                            $result_update_truyen_status = $conn->query($sql_update_truyen_status);

                            // Kiểm tra và thông báo cập nhật thành công hoặc thất bại
                            if ($result_update_truyen && $result_update_truyen_theloai && $result_update_truyen_status) {
                                echo '<script>
                                    alert("Cập nhật thành công!");
                                    window.location.href = "./truyen.php";
                                </script>';
                                header("Location: truyen.php");
                                exit(); 
                            } else {
                                echo "Cập nhật thất bại: " . $conn->error;
                            }

                            // Đóng kết nối
                            $conn->close();
                        }

                        ?>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <!-- End of Main Content -->

    <?php
    include("footer.php");
    ?>