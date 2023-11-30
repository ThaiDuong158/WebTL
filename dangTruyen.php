<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container shadow p-2 bg-light">
        <div class="breadcum p-1">
            <a href="http://localhost/dangTruyen.php" style="text-decoration:none;">Danh sách truyện</a>
        </div>
        <div class="menu bg-light p-1">
            <button class="btn btn-primary" style="float: right;" onclick="location.href='/createBook.php'">
                Thêm Truyện
            </button>
            <div style="clear: both;"></div>
        </div>
        <div class="main">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Tên</th>
                        <th scope="col">Loại</th>
                        <th scope="col">Số chương</th>
                        <th hidden="" scope="col">Vip</th>
                        <th hidden="" scope="col">Đã bán</th>
                        <th scope="col">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
        <div>
            <div style="width:100%;text-align:center;">
                <nav style="display:inline-block;">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" href="/uploader/list/?pagenum=0">|&lt;</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="/uploader/list/?pagenum=0">1</a>
                        </li>
                        <li class="page-item disabled">
                            <a class="page-link" href="/uploader/list/?pagenum=0">&gt;|</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>

</html>