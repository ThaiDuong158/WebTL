<?php
function vn_to_str($str)
{

    $unicode = array(

        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',

        'd' => 'đ',

        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',

        'i' => 'í|ì|ỉ|ĩ|ị',

        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',

        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',

        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',

        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',

        'D' => 'Đ',

        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',

        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',

        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',

        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',

        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ',

    );

    foreach ($unicode as $nonUnicode => $uni) {

        $str = preg_replace("/($uni)/i", $nonUnicode, $str);

    }
    $str = str_replace(' ', '_', $str);

    return $str;

}
function convertToSlug($string)
{
    $string = vn_to_str($string);
    $string = mb_strtolower($string, 'UTF-8'); // Chuyển đổi sang chữ thường
    $string = preg_replace('/[^a-z0-9]+/', '-', $string); // Thay thế các ký tự không phải chữ cái hoặc số bằng dấu gạch ngang
    $string = trim($string, '-'); // Loại bỏ các dấu gạch ngang ở đầu và cuối chuỗi
    return $string;
}

function createTemporaryHTMLFile($path,$id)
{
    $tempFilePath = __DIR__ . $path; // Đường dẫn tệp tạm thời
    $folderPath = dirname($tempFilePath);
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true); // Tạo thư mục đệ quy
    }
    if (file_exists($tempFilePath)) {
        $_SESSION['tempFilePath'] = $tempFilePath; // Lưu đường dẫn vào session
        return $tempFilePath; // Trả về đường dẫn nếu tệp đã tồn tại
    }

    // Tạo tệp HTML tạm thời
    $content = '<!DOCTYPE html>
    <html lang="vi">
    <?php
    session_start();
    ?>
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../asset/css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.2.0/svg.min.js"
            integrity="sha512-EmfT33UCuNEdtd9zuhgQClh7gidfPpkp93WO8GEfAP3cLD++UM1AG9jsTUitCI9DH5nF72XaFePME92r767dHA=="
            crossorigin="anonymous" referrerpolicy="no-referrer">
            </script>
        ?>
        <title>Document</title>
    </head>
    
    <body class="page-home">
        <div id="app">
            <?php
            include(\'C:\xampp\htdocs\header.php\');
            include(\'C:\xampp\htdocs\function.php\');
            ?>
            <main class="main pb-4">
                <div class="container" style="border: 1px solid #666;box-shadow: 5px 5px 5px #666;">
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
                    $id = '.$id.';
                    $sql = "SELECT 
                                    truyen.*, 
                                    tenTheLoai, 
                                    COUNT(chuongtruyen.idTruyen) AS SoChuong, 
                                    tinh_trang.tinhTrang,
                                    AVG(danhgia.diemDanhGia) AS DiemDanhGiaTrungBinh, 
                                    COUNT(DISTINCT danhgia.idDanhGia) AS LuotDanhGia
                                FROM 
                                    truyen 
                                    INNER JOIN truyen_theloai ON truyen.idTruyen = truyen_theloai.idTruyen 
                                    INNER JOIN theloai ON theloai.idTheLoai = truyen_theloai.idTheLoai 
                                    LEFT JOIN chuongtruyen ON truyen.idTruyen = chuongtruyen.idTruyen 
                                    LEFT JOIN tinh_trang ON truyen.idTinhTrang = tinh_trang.idTinhTrang 
                                    LEFT JOIN danhgia ON truyen.idTruyen = danhgia.idTruyen 
                                WHERE 
                                    truyen.idTruyen = $id
                                GROUP BY 
                                    truyen.idTruyen, truyen.tenTruyen, theloai.tenTheLoai, tinh_trang.tinhTrang";
    
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo \'
                                <div class="page-content rounded-2">
                                    <div class="row no-gutters">
                                        <div class="col-12">
                                            <div class="media">
                                                <div class="mr-4 text-center">
                                                    <div class="nh-thumb nh-thumb--210 shadow">
                                                        <img src=".\' . $row["hinhAnh"] . \'"
                                                            alt="\' . $row["tenTruyen"] . \'">
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <div class="d-flex justify-content-start mb-3">
                                                        <h1 class="h3 mr-2">
                                                            <a href="javascript:void(0)">
                                                                \' . $row["tenTruyen"] . \'
                                                            </a>
                                                        </h1>
                                                        <a href="javascript:void(0)" v-on:click="reportBook(119832)" data-toggle="modal"
                                                            class="text-tertiary fz-13 mt-1">
                                                        </a>
                                                    </div>
                                                    <ul class="list-unstyled mb-4">
                                                        <li
                                                            class="d-inline-block border border-secondary px-3 py-1 text-secondary rounded-3 mr-2 mb-2">
                                                            <a href="https://metruyencv.com/tac-gia/382" class="text-secondary">
                                                            \' . $row["tacGia"] . \'
                                                            </a>
                                                        </li>
                                                        <li class="d-inline-block border border-danger px-3 py-1 text-danger rounded-3 mr-2 mb-2"> 
                                                            \' . $row["tinhTrang"] . \'
                                                        </li>
                                                        <li
                                                            class="d-inline-block border border-primary px-3 py-1 text-primary rounded-3 mr-2 mb-2">
                                                            <a href="https://metruyencv.com/truyen?genre=3" class="text-primary">
                                                            \' . $row["tenTheLoai"] . \'
                                                            </a>
                                                        </li>
                                                    </ul>
                                                    <ul class="list-unstyled d-flex mb-4">
                                                        <li class="mr-5">
                                                            <div class="font-weight-semibold h4 mb-1">\' . $row["SoChuong"] . \'</div>
                                                            <div class>Chương</div>
                                                        </li>
                                                        <li class="mr-5">
                                                            <div class="font-weight-semibold h4 mb-1">\' . $row["soLuotXem"] . \'</div>
                                                            <div class>Lượt đọc</div>
                                                        </li>
                                                    </ul>
                                                    <div class="d-flex align-items-center mb-4">
                                                        <span class="nh-rating">
                                                            <i class="nh-icon fa-solid fa-star" style="color: rgb(255, 235, 175);">
                                                            </i>
                                                            <i class="nh-icon fa-solid fa-star" style="color: rgb(255, 235, 175);">
                                                            </i>
                                                            <i class="nh-icon fa-solid fa-star" style="color: rgb(255, 235, 175);">
                                                            </i>
                                                            <i class="nh-icon fa-solid fa-star" style="color: rgb(255, 235, 175);">
                                                            </i>
                                                            <i class="nh-icon fa-solid fa-star" style="color: rgb(255, 235, 175);">
                                                            </i>
                                                            <span class="active" style="width: 100%">
                                                                <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                </i>
                                                                <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                </i>
                                                                <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                </i>
                                                                <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                </i>
                                                                <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                </i>
                                                            </span>
                                                        </span>
                                                        <span class="d-inline-block ml-2">
                                                            <span class="font-weight-semibold">\' . $row["DiemDanhGiaTrungBinh"] . \'</span>/5
                                                        </span>
                                                        <span class="d-inline-block text-secondary ml-1">(\' . $row["LuotDanhGia"] . \' đánh giá)</span>
                                                    </div>
                                                    <ul class="list-unstyled d-flex align-items-center">
                                                        <li class="mr-3 w-150" id="reading-book">
                                                            <a style="color: #fff"
                                                                class="cursor-pointer btn btn-primary btn-md btn-block btn-shadow font-weight-semibold d-flex align-items-center justify-content-center"
                                                                v-if="!isUserReadBookBefore"
                                                                href="http://localhost/truyen/co-chan-nhan/chuong-1.php">
                                                                <i class="fa-solid fa-glasses fa-sm mr-2">
                                                                </i>
                                                                Đọc truyện
                                                            </a>
                                                        </li>
                                                        <li id="bookmark" class="mr-3 w-150">
                                                            <span data-v-20fe2610="">
                                                                <a data-v-20fe2610="" href="javascript:void(0);"
                                                                    class="btn btn-outline-secondary btn-md btn-block font-weight-semibold d-flex align-items-center justify-content-center">
                                                                    <i class="fa-regular fa-bookmark fa-sm mr-2">
                
                                                                    </i>
                                                                    Đánh dấu
                                                                </a>
                                                            </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                \';
                        }
                    } else {
                        echo "Không có dữ liệu";
                    }
                    $conn->close();
                    ?>
    
                    <div class="page-content rounded-2">
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
                        $sqlDanhGia = "SELECT COUNT(*) AS TongDanhGia FROM danhgia WHERE idTruyen = $id";
                        $resultDanhGia = $conn->query($sqlDanhGia);
    
                        // Lấy tổng số lượng chương
                        $sqlChuong = "SELECT COUNT(*) AS TongChuong FROM chuongtruyen WHERE idTruyen = $id";
                        $resultChuong = $conn->query($sqlChuong);
                        if ($resultDanhGia->num_rows > 0 && $resultChuong->num_rows > 0) {
                            $rowDanhGia = $resultDanhGia->fetch_assoc();
                            $tongDanhGia = $rowDanhGia["TongDanhGia"];
    
                            $rowChuong = $resultChuong->fetch_assoc();
                            $tongChuong = $rowChuong["TongChuong"];
                            echo \'
                                        <div class="nav nav-tabs nh-nav-tabs mb-4" id="js-nh-tab" role="tablist">
                                            <a class="nav-item nav-link px-0 py-3 mr-4 active" id="nav-tab-intro"
                                                href="javascript:void(0)">Giới thiệu
                                            </a>
                                            <a class="nav-item nav-link px-0 py-3 mr-4" id="nav-tab-review" href="javascript:void(0)">
                                                <span class="h4 m-0">Đánh giá</span>
                                                <span class="counter rounded-3 px-2 py-1 ml-1">\' . $tongDanhGia . \'</span>
                                            </a>
                                            <a class="nav-item nav-link px-0 py-3 mr-4" id="nav-tab-chap" href="javascript:void(0)">
                                                <span class="h4 m-0">D.s chương</span>
                                                <span class="counter rounded-3 px-2 py-1 ml-1">\' . $tongChuong . \'</span>
                                            </a>
                                        </div>
                                        \';
                        } else {
                            echo "Không có dữ liệu";
                        }
                        $conn->close();
                        ?>
    
                        <div class="tab-content nh-tab-content" id="js-nh-tabContent">
                            <div class="tab-pane fade active show" id="nav-intro">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="mb-4">
                                            <div class="content">
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
                                                $sql = "SELECT 
                                                                truyen.tomTat,
                                                                truyen.tacGia,
                                                                COUNT(danhgia.idDanhGia) AS SoLuotDanhGia,
                                                                COUNT(chuongtruyen.idChuong) AS SoLuongChuong,
                                                                chuongtruyen.tieuDe AS TieuDeChuong
                                                            FROM 
                                                                truyen
                                                            LEFT JOIN 
                                                                danhgia ON truyen.idTruyen = danhgia.idTruyen
                                                            LEFT JOIN 
                                                                chuongtruyen ON truyen.idTruyen = chuongtruyen.idTruyen
                                                            WHERE 
                                                                truyen.idTruyen = $id
                                                            GROUP BY 
                                                                truyen.idTruyen";
    
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo \'
                                                            <p>
                                                                \' . replaceDotWithBreak($row["tomTat"]) . \'
                                                            </p>
                                                            \';
                                                    }
                                                } else {
                                                    echo "Không có dữ liệu";
                                                }
                                                $conn->close();
                                                ?>
    
                                            </div>
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
                                        $sql = "SELECT *, (
                                                    SELECT COUNT(*) 
                                                    FROM chuongtruyen 
                                                    WHERE idTruyen = $id
                                                ) AS tongSoChuong
                                                FROM chuongtruyen 
                                                WHERE idTruyen = $id 
                                                ORDER BY ngayThem DESC 
                                                LIMIT 3
                                                ";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo \'<table class="table border-bottom mb-4 mt-5">\';
                                            $value = 0;
                                            while ($row = $result->fetch_assoc()) {
                                                echo \'
                                                    <tr>
                                                        <td>
                                                            <ul class="list-unstyled m-0">
                                                                <li class="media">
                                                                    <div class="media-body">
                                                                        <a
                                                                            href="./chuong-\'.$row["tongSoChuong"]-$value.\'.php ">
                                                                            \' . $row["tieuDe"] . \'
                                                                        </a>
                                                                    </div>
                                                                    <div class="pl-3">\' . compareTime($row["ngayThem"]) . \'</div>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    \';
                                                    $value++;
                                            }
                                            echo \'</table>\';
                                        } else {
                                            echo "Không có dữ liệu";
                                        }
    
                                        $conn->close();
                                        ?>
                                        <div class="mt-5">
    
                                        </div>
                                    </div>
                                    <div data-v-3807dc18="" class="col-4">
                                        <section data-v-3807dc18="" id="bookAuthor" class="nh-section">
                                            <div data-v-3807dc18="" class="d-flex py-1 border-bottom mb-2">
                                                <h2 data-v-3807dc18="" class="h4 m-0 py-2">
                                                    Cùng tác giả
                                                </h2>
                                                <a data-v-3807dc18="" href="/tac-gia/382" class="mt-2 ml-auto text-primary">
                                                    Xem tất cả
                                                </a>
                                            </div>
                                            <!-- <ul data-v-3807dc18="" class="list-unstyled m-0">
                                                    <li data-v-3807dc18="" class="media align-items-center py-2 mb-1"><a
                                                            data-v-3807dc18=""
                                                            href="dien-roi-ta-la-giao-hoa-mu-mu-bang-nhat-dai-ca"
                                                            class="nh-thumb nh-thumb--32 shadow mr-3"><img data-v-3807dc18=""
                                                                alt="Điên Rồi! Ta Là Giáo Hoa Mụ Mụ Bảng Nhất Đại Ca?"
                                                                width="32"
                                                                data-src="https://static.cdnno.com/poster/dien-roi-ta-la-giao-hoa-mu-mu-bang-nhat-dai-ca/150.jpg?1700902021"
                                                                src="https://static.cdnno.com/poster/dien-roi-ta-la-giao-hoa-mu-mu-bang-nhat-dai-ca/150.jpg?1700902021"
                                                                lazy="loaded"></a>
                                                        <div data-v-3807dc18="" class="media-body">
                                                            <h2 data-v-3807dc18="" class="fz-body mb-1"><a data-v-3807dc18=""
                                                                    href="dien-roi-ta-la-giao-hoa-mu-mu-bang-nhat-dai-ca">
                                                                    Điên Rồi! Ta Là Giáo Hoa Mụ Mụ Bảng Nhất Đại Ca?
                                                                </a></h2>
                                                            <div data-v-3807dc18=""
                                                                class="text-secondary d-flex align-items-center small"><i
                                                                    data-v-3807dc18=""
                                                                    class="nh-icon fa-solid fa-book mr-2"></i>
                                                                Đô Thị
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul> -->
                                        </section>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-review">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="bg-yellow-white review-form rounded-2 mb-3">
                                            <div class="p-3 text-primary">
                                                <div class="row align-items-center py-2">
                                                    <div class="col-3 font-weight-semibold">
                                                        Đánh Giá
                                                    </div>
                                                    <div class="col-8">
                                                        <input type="range" id="js-rangeslider-0" min="0" max="5" step="0.5"
                                                            class="js-range-slider" value="0">
                                                    </div>
                                                    <div id="js-value-1" class="col-1 h5 mb-0 text-center">
                                                        0
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="review-input-block">
                                                <textarea class="form-control rounded-2 border-0 p-3"
                                                    style="height: 100px !important;" spellcheck="false"
                                                    placeholder="Đánh giá của bạn về truyện này"></textarea>
                                                <button type="submit"
                                                    class="btn btn-submit bg-primary p-0 rounded-circle d-flex align-items-center justify-content-center text-white">
                                                    <i class="nh-icon fa-regular fa-paper-plane">
                                                    </i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="rating-box bg-yellow-white text-primary rounded-3 p-3">
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
                                            $sql = "SELECT AVG(diemDanhGia) AS DiemTrungBinh, COUNT(*) AS TongDanhGia 
                                                        FROM danhgia 
                                                        WHERE idTruyen = $id";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo \'<table class="table border-bottom mb-4 mt-5">\';
                                                while ($row = $result->fetch_assoc()) {
                                                    echo \'
                                                        <div class="d-flex align-items-center py-2">
                                                            <div class="h5 m-0">Đã có \' . $row["TongDanhGia"] . \' đánh giá</div>
                                                            <div class="d-flex align-items-center ml-auto">
                                                                <span class="nh-rating">
                                                                    <i class="nh-icon fa-solid fa-star"
                                                                        style="color: rgb(255, 235, 175);">
                                                                    </i>
                                                                    <i class="nh-icon fa-solid fa-star"
                                                                        style="color: rgb(255, 235, 175);">
                                                                    </i>
                                                                    <i class="nh-icon fa-solid fa-star"
                                                                        style="color: rgb(255, 235, 175);">
                                                                    </i>
                                                                    <i class="nh-icon fa-solid fa-star"
                                                                        style="color: rgb(255, 235, 175);">
                                                                    </i>
                                                                    <i class="nh-icon fa-solid fa-star"
                                                                        style="color: rgb(255, 235, 175);">
                                                                    </i>
                                                                    <span class="active" style="width: 100%;">
                                                                        <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                        </i>
                                                                        <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                        </i>
                                                                        <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                        </i>
                                                                        <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                        </i>
                                                                        <i class="nh-icon fa-solid fa-star" style="color: #ffd505;">
                                                                        </i>
                                                                    </span>
                                                                </span>
                                                                <span class="d-inline-block h5 mb-0 ml-3">\' . $row["DiemTrungBinh"] . \'</span>
                                                            </div>
                                                        </div>
                                                        \';
                                                }
                                                echo \'</table>\';
                                            } else {
                                                echo "Không có dữ liệu";
                                            }
    
                                            $conn->close();
                                            ?>
    
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-chap">
                                <div id="chapter-list">
                                    <div data-v-abaf3886="">
                                        <div data-v-abaf3886="" class="d-flex align-items-center mb-3">
                                            <h4 data-v-abaf3886="">
                                                Danh sách chương
                                            </h4>
                                            <button data-v-abaf3886="" class="btn btn-white ml-auto px-3">
                                                <i class="nh-icon fa-solid fa-arrow-down-short-wide h4 m-0 float-left"></i>
                                                <i class="nh-icon fa-solid fa-arrow-down-wide-short h4 m-0 float-left"></i>
                                            </button>
                                        </div>
                                        <div data-v-abaf3886="" class="nh-section mb-4">
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
    
                                            $sql = "SELECT chuongtruyen.*, truyen.tenTruyen
                                                        FROM chuongtruyen
                                                        JOIN truyen ON chuongtruyen.idTruyen = truyen.idTruyen
                                                        WHERE chuongtruyen.idTruyen = $id
                                                        ORDER BY chuongtruyen.ngayThem ASC
                                                        ";
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                echo \'<div data-v-abaf3886="" class="row mt-2">\';
                                                $value = 1;
                                                while ($row = $result->fetch_assoc()) {
                                                    echo \'
                                                            <div data-v-abaf3886="" class="col-4 border-bottom-dashed">
                                                                <a data-v-abaf3886=""
                                                                    href="./chuong-\'.$value.\'.php "
                                                                    class="media py-2 mb-1">
                                                                    <div data-v-abaf3886=""
                                                                        href="./chuong-\'.$value.\'.php"
                                                                        class="media-body">
                                                                        <div data-v-abaf3886="" class="text-overflow-1-lines">
                                                                            \' . $row["tieuDe"] . \'
                                                                            <small data-v-abaf3886="" class="text-muted">
                                                                            (\' . compareTime($row["ngayThem"]) . \')</small>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                           \';
                                                           createTemporaryHTMLFileMin("/truyen/". convertToSlug($row["tenTruyen"]) ."/chuong-".$value.".php",$row["idChuong"]);
                                                    $value++;
                                                }
                                                echo \'</div>\';
                                            } else {
                                                echo "Không có dữ liệu";
                                            }
                                            $conn->close();
    
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
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
    <script>
        const tabElements = document.querySelectorAll("#js-nh-tab a");
        const tabContentElements = document.querySelectorAll("#js-nh-tabContent div.tab-pane");
    
        Array.from(tabElements).forEach((tab, index) => {
            let content = tabContentElements[index]
            tab.onclick = (e) => {
                document.querySelector("#js-nh-tab a.active").classList.remove("active");
                document.querySelector("#js-nh-tabContent div.active").classList.remove("active", "show");
                if (tab.classList && content.classList) {
                    tab.classList.add("active");
                    content.classList.add("active", "show");
                }
            }
    
        })
    </script>
    <script>
        function rangeValue(rangeslider, value) {
            const rangeSlider = document.getElementById(rangeslider)
            const valueDisplay = document.getElementById(value)
            rangeSlider.addEventListener(\'input\', function () {
                valueDisplay.textContent = this.value; // Cập nhật giá trị hiển thị
            })
        }
        rangeValue("js-rangeslider-0", "js-value-1")
        rangeValue("js-rangeslider-1", "js-value-2")
        rangeValue("js-rangeslider-2", "js-value-3")
    </script>
    
    </html>';

    file_put_contents($tempFilePath, $content);

    $_SESSION['tempFilePath'] = $tempFilePath; // Lưu đường dẫn vào session
    return $tempFilePath; // Trả về đường dẫn tệp tạm thời mới được tạo
}

function createTemporaryHTMLFileMin($path,$id)
{
    $tempFilePath = __DIR__ . $path; // Đường dẫn tệp tạm thời
    $folderPath = dirname($tempFilePath);
    if (!file_exists($folderPath)) {
        mkdir($folderPath, 0777, true); // Tạo thư mục đệ quy
    }
    if (file_exists($tempFilePath)) {
        $_SESSION['tempFilePath'] = $tempFilePath; // Lưu đường dẫn vào session
        return $tempFilePath; // Trả về đường dẫn nếu tệp đã tồn tại
    }

    // Tạo tệp HTML tạm thời
    $content = '<!DOCTYPE html>
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
        $id = '.$id.';
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
                                                                    <option value="\'Palatino Linotype\'"> Palatino Linotype
                                                                    </option>
                                                                    <option value="\'Source Sans Pro\'">Source Sans Pro
                                                                    </option>
                                                                    <option value="\'Segoe UI\'">Segoe UI</option>
                                                                    <option value="Roboto">Roboto</option>
                                                                    <option value="\'Patrick Hand\'">Patrick Hand</option>
                                                                    <option value="\'Noticia Text\'">Noticia Text</option>
                                                                    <option value="\'Times New Roman\'">Times New Roman
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
                                let menuActions = document.getElementById(\'js-menu-actions\');
                                let leftMenu = document.getElementById(\'js-left-menu\');
    
                                // Thực hiện xử lý khi trang được cuộn
                                window.addEventListener(\'scroll\', function () {
                                    // Lấy vị trí của #js-left-menu
                                    let leftMenuPosition = leftMenu.getBoundingClientRect();
    
                                    // Nếu màn hình cuộn qua phần tử #js-left-menu
                                    if (leftMenuPosition.top <= 0) {
                                        // Di chuyển #js-menu-actions theo màn hình
                                        menuActions.style.position = \'fixed\';
                                        menuActions.style.top = \'90px\'; // Điều chỉnh khoảng cách từ trên xuống
                                        menuActions.style.right = \'174px\'; // Điều chỉnh khoảng cách từ bên phải
                                        menuActions.style.width = \'70px\'; // Điều chỉnh khoảng cách từ bên phải
                                    } else {
                                        // Nếu không, đặt lại vị trí ban đầu của #js-menu-actions
                                        menuActions.style.position = \'static\'; // Hoặc position: initial nếu bạn muốn giữ vị trí tương đối ban đầu
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
                                    let content = document.querySelector(\'#chaper-content\').innerHTML;
                                    // Thay thế các dấu chấm thành \'.<br>\'
                                    content = content.replace(/\n/g, \'<br>\');
                                    content = content.replace(/\./g, \'.<br>\');
                                    // Gán nội dung đã được thay đổi trở lại vào phần tử
                                    document.querySelector(\'#chaper-content\').innerHTML = content;
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
    
    </html>';

    file_put_contents($tempFilePath, $content);

    $_SESSION['tempFilePath'] = $tempFilePath; // Lưu đường dẫn vào session
    return $tempFilePath; // Trả về đường dẫn tệp tạm thời mới được tạo
}
function replaceDotWithBreak($inputString) {
    $outputString = str_replace('.', '<br>', $inputString);
    return $outputString;
}

function updateUrl($url, $param, $value)
{
    $parsedUrl = parse_url($url);

    if (isset($parsedUrl['query'])) {
        parse_str($parsedUrl['query'], $query);

        // Loại bỏ tất cả các tham số có tên giống với $param
        $query = array_filter($query, function ($key) use ($param) {
            return $key !== $param;
        }, ARRAY_FILTER_USE_KEY);

        // Thêm hoặc cập nhật tham số mới
        $query[$param] = $value;

        // Xây dựng query mới
        $newQuery = http_build_query($query);

        // Xác định dấu ? hoặc & để nối query vào URL
        $separator = isset($parsedUrl['query']) ? '&' : '?';

        // Tạo URL mới
        $newUrl = $parsedUrl['path'] . '?' . $newQuery;

        return $newUrl;
    }

    // Nếu không có query trước đó, thêm tham số mới vào URL
    return $url . '?' . $param . '=' . $value;
}


function compareTime($specifiedTime)
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $currentDateTime = new DateTime(); // Thời gian hiện tại
    $specifiedDateTime = new DateTime($specifiedTime); // Thời điểm cụ thể
    // Tính toán khoảng thời gian giữa hai thời điểm
    $timeDifference = date_diff($currentDateTime, $specifiedDateTime);
    // Hiển thị đơn vị thời gian lớn nhất
    if ($timeDifference->y > 0) {
        return $timeDifference->y . " năm trước";
    } elseif ($timeDifference->m > 0) {
        return $timeDifference->m . " tháng trước";
    } elseif ($timeDifference->d > 0) {
        return $timeDifference->d . " ngày trước";
    } elseif ($timeDifference->h > 0) {
        return $timeDifference->h . " giờ trước";
    } elseif ($timeDifference->i > 0) {
        return $timeDifference->i . " phút trước";
    } elseif ($timeDifference->s > 0) {
        return $timeDifference->s . " giây trước";
    } else {
        return "Hiện tại";
    }
}
?>