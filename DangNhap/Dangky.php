<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div id="wrapper">
    <div class="container">
      <div class="row justify-content-around">
        <form action="" method="post" class="col-md-6 bg-light p-3 my-3">
          <h1 class="text-center text-uppercase h3 py-3">Đăng ký tài khoản</h1>
          <div class="form-group">
            <label for="fullname">Họ và tên</label>
            <input type="text" id="fullname" name="name" class="form-control my-2" required>
          </div>
          <div class="form-group">
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="user" id="username" class="form-control my-2" required>
          </div>
          <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" id="password" name="pass" class="form-control my-2" required>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input type="tex" id="Email" name="email" class="form-control my-2" required>
          </div>
          <!-- <label for="gender">Giới Tính</label>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input type="radio" name="gender" id="male" value="male" class="form-check-input" checked>
              <label for="male" class="form-check-label">Nam</label>
            </div>
            <div class="form-check form-check-inline">
              <input type="radio" name="gender" id="female" value="female" class="form-check-input">
              <label for="female" class="form-check-label">Nữ</label>
            </div>
          </div> -->
          <!-- <div class="form-group">
            <label for="address">Địa chỉ</label>
            <input type="text" id="address" name="address" class="form-control my-2" required>
          </div> -->
          <input type="submit" value="Đăng Ký" class="btn-primary btn-block btn">
        </form>
      </div>
    </div>
  </div>
  <?php

// **Database Connection (Improved Security)**
$server = "localhost";
$username = "root";  // Consider using a dedicated user with limited privileges
$password = "";      // **Never store password in plain text!** Use environment variables or a secure method.
$dbname = "web";

try {
    $db = new PDO("mysql:host=$server;dbname=$dbname", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // Set error handling mode
} catch (PDOException $e) {
    echo "Database connection error: " . $e->getMessage();
    exit();  // Terminate script on connection failure
}

// **Handle Form Submission (Error Checking and Sanitization)**
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // **Sanitize User Input (Prevent SQL Injection and XSS)**
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING); // Consider using password hashing for security
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    // $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    // $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING); // Validate gender (optional)

    // **Prepared Statement (Prevent SQL Injection)**
    $sql = "INSERT INTO `account`(`name`, `user`, `pass`, `email`, `gender`, `address`) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);

    try {
        $stmt->bindParam("ssssss", $name, $user, $pass, $email, $gender, $address);
        $stmt->execute();
        echo "Thêm thành công"; // Display success message
    } catch (PDOException $e) {
        echo "Error adding data: " . $e->getMessage(); // Informative error message
    } finally {
        // **Close Database Connection**
        $db = null;
    }
}

?>

</body>

</html>