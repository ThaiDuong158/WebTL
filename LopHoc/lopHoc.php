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
                <div class="content row container-fluid" style="height: 100px;">
                    <div class="title container-fluid">
                        <h1>232_1TH1507_KS3A_10_ngoaigio</h1>
                        <div class="gocDuoi">
                            <p>Giáo viên hướng dẫn:</p>
                            <p class="gocDuoi--NameGV no-select">Nguyễn Vạn Năng</p>
                        </div>
                    </div>
                    <div class="content-main container-fluid">

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