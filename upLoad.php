<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/upload.php" method="post" enctype="multipart/form-data">
        Chọn file để upload:
        <input type="file" name="fileupload" id="fileupload"><input type="submit" value="Đăng ảnh" name="submit">
    </form>
    <?php
    if (isset($_POST['up']) && isset($_FILES['fileUpload'])) {
        if ($_FILES['fileUpload']['error'] > 0)
            echo "Upload lỗi rồi!";
        else {
            move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'upload/' . $_FILES['fileUpload']['name']);
            echo "upload thành công <br/>";
            echo 'Dường dẫn: upload/' . $_FILES['fileUpload']['name'] . '<br>';
            echo 'Loại file: ' . $_FILES['fileUpload']['type'] . '<br>';
            echo 'Dung lượng: ' . ((int) $_FILES['fileUpload']['size'] / 1024) . 'KB';
        }
    }
    ?>
</body>

</html>