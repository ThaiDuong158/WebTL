<!DOCTYPE html>
    <html lang="vi">
    
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
            include('C:\xampp\htdocs\header.php');
            include('C:\xampp\htdocs\function.php');
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
                    $id = 9;
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
                            echo '
                            <div class="page-content rounded-2">
                                <div class="row no-gutters">
                                    <div class="col-12">
                                        <div class="media">
                                            <div class="mr-4 text-center">
                                                <div class="nh-thumb nh-thumb--210 shadow">
                                                    <img src=".' . $row["hinhAnh"] . '"
                                                        alt="' . $row["tenTruyen"] . '">
                                                </div>
                                            </div>
                                            <div class="media-body">
                                                <div class="d-flex justify-content-start mb-3">
                                                    <h1 class="h3 mr-2">
                                                        <a href="javascript:void(0)">
                                                            ' . $row["tenTruyen"] . '
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
                                                        ' . $row["tacGia"] . '
                                                        </a>
                                                    </li>
                                                    <li class="d-inline-block border border-danger px-3 py-1 text-danger rounded-3 mr-2 mb-2"> 
                                                        ' . $row["tinhTrang"] . '
                                                    </li>
                                                    <li
                                                        class="d-inline-block border border-primary px-3 py-1 text-primary rounded-3 mr-2 mb-2">
                                                        <a href="https://metruyencv.com/truyen?genre=3" class="text-primary">
                                                        ' . $row["tenTheLoai"] . '
                                                        </a>
                                                    </li>
                                                </ul>
                                                <ul class="list-unstyled d-flex mb-4">
                                                    <li class="mr-5">
                                                        <div class="font-weight-semibold h4 mb-1">' . $row["SoChuong"] . '</div>
                                                        <div class>Chương</div>
                                                    </li>
                                                    <li class="mr-5">
                                                        <div class="font-weight-semibold h4 mb-1">' . $row["soLuotXem"] . '</div>
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
                                                        <span class="font-weight-semibold">'.$row["DiemDanhGiaTrungBinh"].'</span>/5
                                                    </span>
                                                    <span class="d-inline-block text-secondary ml-1">('.$row["LuotDanhGia"].' đánh giá)</span>
                                                </div>
                                                <ul class="list-unstyled d-flex align-items-center">
                                                    <li class="mr-3 w-150" id="reading-book">
                                                        <a style="color: #fff"
                                                            class="cursor-pointer btn btn-primary btn-md btn-block btn-shadow font-weight-semibold d-flex align-items-center justify-content-center"
                                                            v-if="!isUserReadBookBefore"
                                                            href="https://metruyencv.com/truyen/cay-tai-tan-the-them-diem-thang-cap/chuong-1">
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
                            ';
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
                            echo '
                                    <div class="nav nav-tabs nh-nav-tabs mb-4" id="js-nh-tab" role="tablist">
                                        <a class="nav-item nav-link px-0 py-3 mr-4 active" id="nav-tab-intro"
                                            href="javascript:void(0)">Giới thiệu
                                        </a>
                                        <a class="nav-item nav-link px-0 py-3 mr-4" id="nav-tab-review" href="javascript:void(0)">
                                            <span class="h4 m-0">Đánh giá</span>
                                            <span class="counter rounded-3 px-2 py-1 ml-1">' . $tongDanhGia . '</span>
                                        </a>
                                        <a class="nav-item nav-link px-0 py-3 mr-4" id="nav-tab-chap" href="javascript:void(0)">
                                            <span class="h4 m-0">D.s chương</span>
                                            <span class="counter rounded-3 px-2 py-1 ml-1">' . $tongChuong . '</span>
                                        </a>
                                    </div>
                                    ';
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
                                                        echo '
                                                        <p>
                                                            ' . replaceDotWithBreak($row["tomTat"]) . '
                                                        </p>
                                                        ';
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
                                        $sql = "SELECT * FROM chuongtruyen 
                                                WHERE idTruyen = $id 
                                                ORDER BY ngayThem DESC 
                                                LIMIT 3";
                                        $result = $conn->query($sql);
                                        if ($result->num_rows > 0) {
                                            echo '<table class="table border-bottom mb-4 mt-5">';
                                            while ($row = $result->fetch_assoc()) {
                                                echo '
                                                <tr>
                                                    <td>
                                                        <ul class="list-unstyled m-0">
                                                            <li class="media">
                                                                <div class="media-body">
                                                                    <a
                                                                        href="https://metruyencv.com/truyen/cay-tai-tan-the-them-diem-thang-cap/chuong-322">
                                                                        ' . $row["tieuDe"] . '
                                                                    </a>
                                                                </div>
                                                                <div class="pl-3">' . compareTime($row["ngayThem"]) . '</div>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                                ';
                                            }
                                            echo '</table>';
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
                                                echo '<table class="table border-bottom mb-4 mt-5">';
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '
                                                    <div class="d-flex align-items-center py-2">
                                                        <div class="h5 m-0">Đã có ' . $row["TongDanhGia"] . ' đánh giá</div>
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
                                                            <span class="d-inline-block h5 mb-0 ml-3">' . $row["DiemTrungBinh"] . '</span>
                                                        </div>
                                                    </div>
                                                    ';
                                                }
                                                echo '</table>';
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
    
                                                $sql = "SELECT * FROM chuongtruyen WHERE idTruyen = $id ORDER BY ngayThem DESC";
                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    echo'<div data-v-abaf3886="" class="row mt-2">';
                                                    while ($row = $result->fetch_assoc()) {
                                                       echo'
                                                        <div data-v-abaf3886="" class="col-4 border-bottom-dashed">
                                                            <a data-v-abaf3886=""
                                                                href="phan-phai-bat-dau-dao-khoet-nu-chinh-linh-dong/chuong-1"
                                                                class="media py-2 mb-1">
                                                                <div data-v-abaf3886=""
                                                                    href="phan-phai-bat-dau-dao-khoet-nu-chinh-linh-dong/chuong-1"
                                                                    class="media-body">
                                                                    <div data-v-abaf3886="" class="text-overflow-1-lines">
                                                                        '.$row["tieuDe"].'
                                                                        <small data-v-abaf3886="" class="text-muted">
                                                                        ('.compareTime($row["ngayThem"]).')</small>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </div>
                                                       ';
                                                    }
                                                    echo'</div>';
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
            rangeSlider.addEventListener('input', function () {
                valueDisplay.textContent = this.value; // Cập nhật giá trị hiển thị
            })
        }
        rangeValue("js-rangeslider-0", "js-value-1")
        rangeValue("js-rangeslider-1", "js-value-2")
        rangeValue("js-rangeslider-2", "js-value-3")
    </script>
    
    </html>