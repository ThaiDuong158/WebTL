<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../TrangMau/link.php'; ?>
    <link rel="stylesheet" href="../css/lopHoc.css">
    <title>Document</title>
</head>

<body>
    <div class="main container-fluid">
        <?php include '../TrangMau/header.php'; ?>
        <div class="row">
            <?php include '../TrangMau/sidebar.php'; ?>
            <div class="col bg-light d-flex flex-column justify-content-between">
                <div class="content row container-fluid d-flex flex-column">
                    <div class="title container-fluid">
                        <h1>232_1TH1507_KS3A_10_ngoaigio GV: Nguyễn Vạn Năng</h1>
                    </div>
                    <div class="content-main container-fluid">
                        <ul class="content--list">
                            <li class="section-1 content--item">
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">
                                        <?php include '../icon/svg/iconNotifi.php'?>
                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-2 content--item">
                                <h4 class="contect--item__title">1. THÔNG TIN HỌC PHẦN</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">
                                        <i class="content--item__icon fa-solid fa-address-card"></i>
                                    </li>
                                    <li class="content--item__activity">
                                        <i class="content--item__icon fa-solid fa-eye-dropper"></i>
                                    </li>
                                    <li class="content--item__activity">
                                        <i class="content--item__icon fa-solid fa-anchor"></i>
                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-3 content--item">
                                <h4 class="contect--item__title">2. KẾ HOẠCH GIẢNG DẠY</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">
                                        <i class="content--item__icon fa-solid fa-align-justify"></i>
                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-4 content--item">
                                <h4 class="contect--item__title">3. ĐỀ CƯƠNG HỌC PHẦN</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">
                                        <img class="content--item__icon" src="../icon/pdf-24.png" alt="">
                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-5 content--item">
                                <h4 class="contect--item__title">4. GIÁO TRÌNH - BÀI GIẢNG - TÀI LIỆU THAM KHẢO</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">
                                    <i class="content--item__icon fa-solid fa-folder-open"></i>
                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-6 content--item">
                                <h4 class="contect--item__title">5. BÀI TẬP</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">

                                    </li>
                                </ul>
                            </li>
                            <hr>
                            <li class="section-7 content--item">
                                <h4 class="contect--item__title">6. KIỂM TRA ĐÁNH GIÁ</h4>
                                <ul class="content--list__activity">
                                    <li class="content--item__activity">

                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php include '../TrangMau/footer.php'; ?>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelector('.sidebar-mini').click();
        });
    </script>
</body>
<script src="../js/main.js"></script>

</html>