<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include("link.php");
    ?>
    <title>Document</title>
</head>

<body>
    <?php
    include("header.php");
    include("function.php");
    ?>
    <div id="content" style="max-width:1200px; margin: 100px auto 0;">
        <form method="post">
            <div class="col-md-8 col-12" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <div class="vue-avatar-cropper text-center mb-2">
                                <div style="height: 200px;">
                                    <img id="previewImage" src="./asset/images/test.jpg" width="150" height="200"
                                        class="">
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
                                    var fileInput = document.getElementById('fileInput'); fileInput.click();
                                }
                                function previewFile() {
                                    var preview = document.getElementById('previewImage');
                                    var file = document.getElementById('fileInput').files[0];
                                    var reader = new FileReader();
                                    reader.onloadend = function () { preview.src = reader.result; };
                                    if (file) { reader.readAsDataURL(file); } else { preview.src = ""; }
                                } 
                            </script>
                        </div>

                        <form class="">
                            <div role="group" class="form-group" id="__BVID__2022">
                                <label for="bookName" class="d-block" id="__BVID__2022__BV_label_">
                                    Tên truyện
                                </label>
                                <div>
                                    <div role="group" class="input-group">
                                        <input id="bookName" name="bookName" type="text" value=""
                                            placeholder="Viết hoa chữ đầu mỗi từ: Giống Như Thế Này" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div role="group" class="form-group" id="__BVID__2026">
                                <label for="bookDescription" class="d-block" id="__BVID__2026__BV_label_">Giới
                                    thiệu</label>
                                <div>
                                    <div role="group" class="input-group">
                                        <textarea data-v-48a34928="" id="bookDescription" name="bookDescription"
                                            placeholder="Tóm tắt cho truyện không nên quá dài mà nên ngắn gọn, tập trung, thú vị. Phần này rất quan trọng vì nó quyết định độc giả có đọc hay không. Tối đa 700 từ"
                                            wrap="soft" class="form-control"
                                            style="resize: none; overflow-y: scroll; height: 114px;"
                                            spellcheck="false" ></textarea>

                                    </div>
                                </div>
                                <div role="group" class="form-group" id="__BVID__2028">
                                    <label for="bookStatus" class="d-block" id="__BVID__2028__BV_label_">
                                        Tình trạng
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

                                        $sql = "SELECT * FROM tinh_trang";
                                        $result = $conn->query($sql);

                                        // Kiểm tra xem có dữ liệu từ truy vấn không
                                        if ($result && $result->num_rows > 0) {
                                            echo '<select class="custom-select" id="bookStatus" name="bookStatus">';
                                            while ($row = $result->fetch_assoc()) {
                                                $option_value = $row["idTinhTrang"];
                                                $option_text = $row["tinhTrang"];
                                                echo '<option value="' . $option_value . '">' . $option_text . '</option>';
                                            }
                                            echo '</select>';
                                        } else {
                                            echo "Không có dữ liệu tình trạng sách.";
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

                                        $sql = "SELECT * FROM theloai";
                                        $result = $conn->query($sql);
                                        $flag = true;
                                        // Hiển thị dropdown list
                                        if ($result && $result->num_rows > 0) {
                                            echo '<select class="custom-select" id="bookGenre" name="bookGenre" >';
                                            while ($row = $result->fetch_assoc()) {
                                                if($flag) {
                                                    $flag = false;
                                                    continue;
                                                }
                                                $option_value = $row["idTheLoai"];
                                                $option_text = $row["tenTheLoai"];
                                                echo '<option value="' . $option_value . '">' . $option_text . '</option>';
                                            }
                                            echo '</select>';
                                        } else {
                                            echo "Không có dữ liệu danh mục.";
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
    <?php
    include("footer.php");
    ?>
</body>

</html>