<?php
// Kiểm tra xem có tham số 'id' được truyền qua URL không
if (isset($_GET['id'])) {
    $idTruyen = $_GET['id'];

    // Tiếp tục với kết nối cơ sở dữ liệu và xóa dữ liệu
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_truyen";
    
    // Khởi tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
    }

    // Câu truy vấn xóa dữ liệu trong truyen_theloai
    $sql_delete_truyen_theloai = "DELETE FROM truyen_theloai WHERE idTruyen = $idTruyen";

    // Thực thi câu truy vấn xóa trong truyen_theloai
    if ($conn->query($sql_delete_truyen_theloai) === TRUE) {
        // Tiếp tục với câu truy vấn xóa dữ liệu trong truyen
        $sql_delete_truyen = "DELETE FROM truyen WHERE idTruyen = $idTruyen";

        // Thực thi câu truy vấn xóa trong truyen
        if ($conn->query($sql_delete_truyen) === TRUE) {
            header("Location: http://localhost/admin/truyen.php");
            exit();
        } else {
            echo "Xóa truyện thất bại: " . $conn->error;
        }
    } else {
        echo "Xóa dữ liệu truyen_theloai thất bại: " . $conn->error;
    }

    // Đóng kết nối
    $conn->close();
} else {
    echo "Không có ID truyện được cung cấp.";
}
?>
