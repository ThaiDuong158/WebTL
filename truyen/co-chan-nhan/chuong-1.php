<!DOCTYPE html>
    <html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.2.0/svg.min.js"
            integrity="sha512-EmfT33UCuNEdtd9zuhgQClh7gidfPpkp93WO8GEfAP3cLD++UM1AG9jsTUitCI9DH5nF72XaFePME92r767dHA=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
            </script>
        <link rel="stylesheet" href="../asset/css/style.css">
        <title>Document</title>
    </head>
    
    <body>
        <?php
        $id = 6;
        ?>
        <div id="app">
            <?php
            include("C:/xampp/htdocs/header.php");
            ?>
            <div id="chapter-content" style="margin-top: 145px;">
                <div tabindex="0" id="bookRead">
                    <main class="main py-4">
                        <div id="tpm-200067-container" data-partner="passback" data-filled="true" class="tpm-unit"
                            style="opacity: 1;">
                            <div id="ads-1701368347509">
                            </div>
                        </div>
                        <div class="nh-read__container" style="width: 1000px;">
                            <div id="js-left-menu" class="nh-read__right"
                                style="position: absolute; left: auto; width: 70px;">
                                <ul id="js-menu-actions" class="list-unstyled m-0 nh-read__menu rounded-2">
                                    <li class="item">
                                        <a title="" data-toggle="tooltip" data-placement="right"
                                            class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                                            data-original-title="Danh sách chương">
                                            <i class="fa-solid fa-bars"></i>
                                        </a>
                                        <div class="nh-read__popover">
                                            <button type="button" data-type="close" class="btn btn-sm btn-close mr-2"
                                                style="z-index: 1;">
                                                <i class="nh-icon icon-close float-left">
                                                </i>
                                            </button>
                                            <div class="nh-read__popover-content">
                                                <div class="d-flex align-items-center mb-3 pr-3">
                                                    <div class="h3 font-weight-normal mb-0">Danh sách chương</div>
                                                    <button class="btn btn-white ml-auto px-3">
                                                        <i class="nh-icon icon-sort-desc h4 m-0 float-left">
                                                        </i>
                                                    </button>
                                                </div>
                                                <div class="nh-section mb-4">
                                                    <div class="row mt-2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <a title="" data-toggle="tooltip" data-placement="right"
                                            class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                                            data-original-title="Cài đặt hiển thị">
                                            <i class="fa-solid fa-gear"></i>
                                        </a>
                                        <div class="nh-read__popover nh-read__popover--setting">
                                            <button type="button" data-type="close" class="btn btn-close">
                                                <i class="nh-icon icon-close float-left">
                                                </i>
                                            </button>
                                            <div class="nh-read__popover-content">
                                                <div class="d-flex align-items-center mb-3 pr-3">
                                                    <div class="h3 font-weight-normal mb-0">Cài đặt</div>
                                                </div>
                                                <table class="table table-borderless">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width: 180px;">
                                                                <div class="d-inline-flex align-items-center">
                                                                    <i
                                                                        class="nh-icon icon-color h4 mb-0 mr-2 text-secondary">
                                                                    </i>Màu nền
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <ul id="js-themes-picker"
                                                                    class="list-unstyled nh-read__themes d-flex flex-wrap">
                                                                    <li>
                                                                        <a class="item rounded-circle item--1">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--2 active">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--3">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--4">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--5">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--6">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--7">
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a class="item rounded-circle item--8">
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle" style="width: 180px;">
                                                                <div class="d-inline-flex align-items-center">
                                                                    <i
                                                                        class="nh-icon icon-font h4 mb-0 mr-2 text-secondary">
                                                                    </i>Font chữ
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <select id="js-font-picker"
                                                                    class="form-control custom-select">
                                                                    <option value="'Palatino Linotype'"> Palatino Linotype
                                                                    </option>
                                                                    <option value="'Source Sans Pro'">Source Sans Pro
                                                                    </option>
                                                                    <option value="'Segoe UI'">Segoe UI</option>
                                                                    <option value="Roboto">Roboto</option>
                                                                    <option value="'Patrick Hand'">Patrick Hand</option>
                                                                    <option value="'Noticia Text'">Noticia Text</option>
                                                                    <option value="'Times New Roman'">Times New Roman
                                                                    </option>
                                                                    <option value="Verdana">Verdana</option>
                                                                    <option value="Tahoma">Tahoma</option>
                                                                    <option value="Arial">Arial</option>
                                                                </select>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle" style="width: 180px;">
                                                                <div class="d-inline-flex align-items-center">
                                                                    <i
                                                                        class="nh-icon icon-size h4 mb-0 mr-2 text-secondary">
                                                                    </i>Cỡ chữ
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div data-unit="px" data-type="font-size" data-max="30"
                                                                    data-min="14" data-step="1"
                                                                    class="d-flex align-items-center js-content-options">
                                                                    <button class="btn btn-white border px-2 minus">
                                                                        <i class="nh-icon icon-minus float-left">
                                                                        </i>
                                                                    </button>
                                                                    <div
                                                                        class="flex-fill text-center font-weight-semibold value">
                                                                        30px </div>
                                                                    <button class="btn btn-white border px-2 ml-auto plus">
                                                                        <i class="nh-icon icon-plus float-left">
                                                                        </i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle" style="width: 180px;">
                                                                <div class="d-inline-flex align-items-center">
                                                                    <i
                                                                        class="nh-icon icon-width-resize h4 mb-0 mr-2 text-secondary">
                                                                    </i>Chiều rộng khung
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div data-unit="px" data-type="width" data-max="1000"
                                                                    data-min="500" data-step="100"
                                                                    class="d-flex align-items-center js-content-options">
                                                                    <button class="btn btn-white border px-2 minus">
                                                                        <i class="nh-icon icon-minus float-left">
                                                                        </i>
                                                                    </button>
                                                                    <div
                                                                        class="flex-fill text-center font-weight-semibold value">
                                                                        1000px </div>
                                                                    <button class="btn btn-white border px-2 ml-auto plus">
                                                                        <i class="nh-icon icon-plus float-left">
                                                                        </i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="align-middle" style="width: 180px;">
                                                                <div class="d-inline-flex align-items-center">
                                                                    <i
                                                                        class="nh-icon icon-line-height h4 mb-0 mr-2 text-secondary">
                                                                    </i>Giãn dòng
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div data-unit="%" data-type="line-height" data-max="200"
                                                                    data-min="100" data-step="10"
                                                                    class="d-flex align-items-center js-content-options">
                                                                    <button class="btn btn-white border px-2 minus">
                                                                        <i class="nh-icon icon-minus float-left">
                                                                        </i>
                                                                    </button>
                                                                    <div
                                                                        class="flex-fill text-center font-weight-semibold value">
                                                                        160% </div>
                                                                    <button class="btn btn-white border px-2 ml-auto plus">
                                                                        <i class="nh-icon icon-plus float-left">
                                                                        </i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <script>
                                // Lấy phần tử #js-menu-actions và #js-left-menu
                                let menuActions = document.getElementById('js-menu-actions');
                                let leftMenu = document.getElementById('js-left-menu');
    
                                // Thực hiện xử lý khi trang được cuộn
                                window.addEventListener('scroll', function () {
                                    // Lấy vị trí của #js-left-menu
                                    let leftMenuPosition = leftMenu.getBoundingClientRect();
    
                                    // Nếu màn hình cuộn qua phần tử #js-left-menu
                                    if (leftMenuPosition.top <= 0) {
                                        // Di chuyển #js-menu-actions theo màn hình
                                        menuActions.style.position = 'fixed';
                                        menuActions.style.top = '90px'; // Điều chỉnh khoảng cách từ trên xuống
                                        menuActions.style.right = '174px'; // Điều chỉnh khoảng cách từ bên phải
                                        menuActions.style.width = '70px'; // Điều chỉnh khoảng cách từ bên phải
                                    } else {
                                        // Nếu không, đặt lại vị trí ban đầu của #js-menu-actions
                                        menuActions.style.position = 'static'; // Hoặc position: initial nếu bạn muốn giữ vị trí tương đối ban đầu
                                    }
                                });
    
                            </script>
                            <div class="sticky-spacer"
                                style="height: 150px; inset: auto -85px auto auto; position: absolute; display: block; vertical-align: baseline; box-sizing: border-box; margin: 0px; padding-left: 0px; padding-right: 0px; float: none; width: 70px; z-index: -1;">
                            </div>
                            <div class="sticky-spacer"
                                style="height: 150px; inset: auto -85px auto auto; position: absolute; display: block; vertical-align: baseline; box-sizing: border-box; margin: 0px; padding-left: 0px; padding-right: 0px; float: none; width: 70px; z-index: -1;">
                            </div>
                            <div class="mb-3">
                            </div>
                            <div id="js-read__body" class="nh-read__body rounded-2">
                                <div class="d-flex align-items-center mb-4">
                                    <a class="nh-read__action d-flex align-items-center h6 mb-0 rounded-3 py-2 px-4 ">
                                        <i class="fa-solid fa-arrow-left mr-2">
                                        </i>Chương trước </a>
                                    <a href="https://metruyencv.com/truyen/ai-bao-han-tu-tien/chuong-cuoi"
                                        class="nh-read__action d-flex align-items-center h6 mb-0 ml-auto rounded-3 py-2 px-4">
                                        Chương sau <i class="fa-solid fa-arrow-right ml-2">
                                        </i>
                                    </a>
                                </div>
                                <?php
                                // Thay đổi thông tin kết nối dựa vào cấu hình cơ sở dữ liệu của bạn
                                $servername = "localhost";
                                $username = "root";
                                $password = "";
                                $dbname = "web_truyen";
                                // Tạo kết nối
                                $conn = new mysqli($servername, $username, $password, $dbname);
                                // Kiểm tra kết nối
                                if ($conn->connect_error) {
                                    die("Kết nối thất bại: " . $conn->connect_error);
                                }
                                // Ví dụ truy vấn SELECT
                                $sql = "SELECT chuongtruyen.tieuDe 
                                            FROM chuongtruyen
                                            WHERE chuongtruyen.idChuong = $id
                                                    ";
                                $result = $conn->query($sql);
    
                                if ($result->num_rows > 0) {
                                    // Xử lý dữ liệu trả về
                                    $row = $result->fetch_assoc();
    
                                    echo "
                                    <div class=\"h1 mb-4 font-weight-normal nh-read__title\"> " . $row["tieuDe"] . " </div>
                                    ";
                                } else {
                                    echo "Không có dữ liệu";
                                }
                                // Đóng kết nối sau khi hoàn thành công việc
                                $conn->close();
                                ?>
                                <ul class="list-unstyled d-flex align-items-center flex-wrap">
                                    <?php
                                    // Thay đổi thông tin kết nối dựa vào cấu hình cơ sở dữ liệu của bạn
                                    $servername = "localhost";
                                    $username = "root";
                                    $password = "";
                                    $dbname = "web_truyen";
                                    // Tạo kết nối
                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                    // Kiểm tra kết nối
                                    if ($conn->connect_error) {
                                        die("Kết nối thất bại: " . $conn->connect_error);
                                    }
                                    // Ví dụ truy vấn SELECT
                                    $sql = "SELECT truyen.tenTruyen,truyen.tacGia,chuongtruyen.tieuDe,chuongtruyen.ngayThem 
                                            FROM chuongtruyen, truyen
                                            WHERE 	chuongtruyen.idTruyen = truyen.idTruyen AND
                                                    chuongtruyen.idChuong = $id
                                                    ";
                                    $result = $conn->query($sql);
    
                                    if ($result->num_rows > 0) {
                                        // Xử lý dữ liệu trả về
                                        $row = $result->fetch_assoc();
    
                                        echo "
                                        <li class=\"d-flex mr-4 mb-1\">
                                            <h1 class=\"fz-body font-weight-normal m-0\">
                                                <a href=\"/\"
                                                    class=\"text-inherit d-flex align-items-center\">
                                                    <i class=\"fa-solid fa-book mr-2\">
                                                    </i> " . $row["tenTruyen"] . " </a>
                                            </h1>
                                        </li>
                                        <li class=\"d-flex align-items-center mr-4 mb-1\">
                                            <i class=\"fa-regular fa-user mr-2\">
                                            </i>
                                            <a href=\"/\">" . $row["tacGia"] . "</a>
                                        </li>
                                        <li class=\"d-flex align-items-center mr-4 mb-1\">
                                            <i class=\"fa-regular fa-clock mr-2\">
                                            </i> " . $row["ngayThem"] . "
                                        </li>";
                                    } else {
                                        echo "Không có dữ liệu";
                                    }
                                    // Đóng kết nối sau khi hoàn thành công việc
                                    $conn->close();
                                    ?>
                                </ul>
                                <div id="js-read__content" class="nh-read__content post-body"
                                    style="font-size: 30px; font-family: &quot;Palatino Linotype&quot;; margin: auto; line-height: 160%;">
                                    <div id="article" class="c-c">
                                        <p id="chaper-content">
                                            <?php
                                            // Thay đổi thông tin kết nối dựa vào cấu hình cơ sở dữ liệu của bạn
                                            $servername = "localhost";
                                            $username = "root";
                                            $password = "";
                                            $dbname = "web_truyen";
                                            // Tạo kết nối
                                            $conn = new mysqli($servername, $username, $password, $dbname);
                                            // Kiểm tra kết nối
                                            if ($conn->connect_error) {
                                                die("Kết nối thất bại: " . $conn->connect_error);
                                            }
                                            // Ví dụ truy vấn SELECT
                                            $sql = "SELECT chuongtruyen.* FROM chuongtruyen 
                                                    WHERE chuongtruyen.idChuong = $id 
                                                    ";
                                            $result = $conn->query($sql);
    
                                            if ($result->num_rows > 0) {
                                                // Xử lý dữ liệu trả về
                                                $row = $result->fetch_assoc();
                                                echo "" . $row["noiDung"] . "";
                                            } else {
                                                echo "Không có dữ liệu";
                                            }
                                            // Đóng kết nối sau khi hoàn thành công việc
                                            $conn->close();
                                            ?>
                                        </p>
                                    </div>
                                    <br>
                                    <br>=============<br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                                <script>
                                    // Lấy nội dung của phần tử có id là "chaper-content"
                                    let content = document.querySelector('#chaper-content').innerHTML;
                                    // Thay thế các dấu chấm thành '.<br>'
                                    content = content.replace(/\n/g, '<br>');
                                    content = content.replace(/\./g, '.<br>');
                                    // Gán nội dung đã được thay đổi trở lại vào phần tử
                                    document.querySelector('#chaper-content').innerHTML = content;
                                </script>
                            </div>
                            <div class="nh-read__pagination d-flex mt-3 rounded-2">
                                <a id="prevChapter"
                                    class="paginate-chapter-item d-flex align-items-center justify-content-center flex-fill h6 mb-0 py-3 px-4 ">
                                    <i class="fa-solid fa-arrow-left mr-2">
                                    </i>Chương trước </a>
                                <a id="nextChapter" href="https://metruyencv.com/truyen/ai-bao-han-tu-tien/chuong-cuoi"
                                    class="paginate-chapter-item d-flex align-items-center justify-content-center flex-fill h6 mb-0 ml-auto py-3 px-4">
                                    Chương sau <i class="fa-solid fa-arrow-right ml-2">
                                    </i>
                                </a>
                            </div>
                        </div>
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                    </main>
                    <!---->
                </div>
            </div>
            <div id="footer">
                <hr class="my-0">
                <footer class="footer text-center py-4">
                    <div class="container">
                        <a href="/" class="d-inline-block py-1 my-2">
                            <img src="../asset/images/logo.png" alt="logo" width="64" height="64">
                        </a>
                        <div class="w-75 m-auto">Mê Truyện Chữ là nền tảng mở trực tuyến, miễn phí đọc truyện chữ được
                            convert hoặc dịch kỹ lưỡng, do các converter và dịch giả đóng góp, rất nhiều truyện hay và nổi
                            bật được cập nhật nhanh nhất với đủ các thể loại tiên hiệp, kiếm hiệp, huyền ảo ... </div>
                        <div class="footer-app mt-4" id="app-download">
                            <div class="d-flex align-items-center justify-content-center py-1">
                                <a href="/" class="mr-3">
                                    <img src="../asset/images/app-store.png" alt height="34">
                                </a>
                                <a href="/" class>
                                    <img src="../asset/images/google-play.png" alt height="34">
                                </a>
                            </div>
                        </div>
                        <ul class="list-unstyled mt-4 mb-0 d-flex justify-content-center">
                            <li>
                                <a href="/" target="_blank" class="d-inline-block px-3 py-2">Điều khoản dịch vụ</a>
                            </li>
                            <li>
                                <a href="/" target="_blank" class="d-inline-block px-3 py-2">Chính sách bảo mật</a>
                            </li>
                            <li>
                                <a href="/" target="_blank" class="d-inline-block px-3 py-2">Về bản quyền</a>
                            </li>
                            <li>
                                <a href="/" target="_blank" class="d-inline-block px-3 py-2">Hướng dẫn sử dụng</a>
                            </li>
                        </ul>
                    </div>
                </footer>
            </div>
        </div>
    
    </body>
    
    </html>