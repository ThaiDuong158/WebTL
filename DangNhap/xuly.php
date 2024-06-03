<?php

// Xác định thông tin kết nối cơ sở dữ liệu
$server = "localhost";
$username = "root";
$password = "";
$dbname = "web";

// Khởi tạo kết nối PDO
$pdo = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);

// Xử lý dữ liệu đăng nhập
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Lấy dữ liệu đăng nhập từ form
  $username = $_POST['user'];
  $password = $_POST['pass'];

  // Chuẩn bị truy vấn SQL
  $stmt = $pdo->prepare("SELECT * FROM `account` WHERE `user` = :username");
  $stmt->bindParam(':username', $username);

  // Thực thi truy vấn
  $stmt->execute();

  // Lấy thông tin tài khoản
  $user = $stmt->fetch();
  $stmt = $pdo->prepare("SELECT * FROM `account` WHERE `user` = :username");
  $stmt->bindParam(':username', $username);

  // Thực thi truy vấn
  $stmt->execute();
  // Kiểm tra mật khẩu
  $count = $stmt->fetchColumn();
  try {
    if ($count > 0) {
      if (password_verify($password, password_hash($user['pass'], PASSWORD_BCRYPT))) {

        header("Location: dangky.php");
      } else {
        // Xác thực thất bại
        // Hiển thị thông báo lỗi
        echo "<div class='alert alert-danger'>Tên đăng nhập hoặc mật khẩu không chính xác!</div>";
      }
    } else {
      echo "<div class='alert alert-danger'>không tìm thấy tài khoản!</div></br>";
      echo "<a href=dangky.php>Nhấn vào để đăng ký</a>";
    }
  } catch (Exception $e) {
    echo $e;
  }
}
