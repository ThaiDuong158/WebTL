<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_truyen";
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

// Xác định ID của bản ghi cần xóa từ tham số truyền vào
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Tạo truy vấn xóa từ bảng phanquyen
    $deletePhanQuyenQuery = "DELETE FROM phanquyen WHERE idNguoiDung = $id";

    // Thực thi truy vấn xóa từ bảng phanquyen
    if ($conn->query($deletePhanQuyenQuery) === TRUE) {
        // Tiếp theo, tạo truy vấn xóa từ bảng nguoidung
        $deleteNguoiDungQuery = "DELETE FROM nguoidung WHERE idNguoiDung = $id";

        // Thực thi truy vấn xóa từ bảng nguoidung
        if ($conn->query($deleteNguoiDungQuery) === TRUE) {
            // Nếu xóa thành công, chuyển hướng người dùng đến trang hiển thị danh sách người dùng
            header("Location: user.php");
            exit();
        } else {
            echo "Lỗi khi xóa người dùng: " . $conn->error;
        }
    } else {
        echo "Lỗi khi xóa phân quyền: " . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
