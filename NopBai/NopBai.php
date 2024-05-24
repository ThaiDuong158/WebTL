<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../TrangMau/link.php'; ?>
    <link rel="stylesheet" href="../css/NopBai.css">
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
                    <div class="content-main container-fluid d-flex flex-column">
                        <h1 class="content--title">Bài tập</h1>
                        <p>File submissions</p>
                        <div class="container-fluid">
                            <div class="row content--row">
                                <div class="col-3"></div>
                                <div class="col d-flex justify-content-end">Kích cỡ tối đa đối với các tập tin mới: 16MB, đính kèm tối đa: 20</div>
                            </div>
                            <div class="row content--row">
                                <div class="col-3"></div>
                                <div class="col">
                                    <input type="file" name="" id="">
                                </div>
                            </div>
                            <div class="row content--row">
                                <div class="col-3"></div>
                                <div class="col">
                                    <button class="btn--back btn btn-success">LƯU NHƯNG THAY ĐỔI</button>
                                    <button class="btn--back btn btn-danger">HỦY BỎ</button>
                                </div>
                            </div>
                        </div>
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
        let buttons = document.querySelectorAll('.btn--back');
        buttons.forEach(button => {
            button.addEventListener('click', function() {
                window.location.href = '../NopBai/TrangThaiNopBai.php';
            });
        })
    </script>
</body>
<script src="../js/main.js"></script>

</html>