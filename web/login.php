<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html>

<!-- Head -->

<head>

	<title>Existing Login Form a Flat Responsive Widget Template :: W3layouts</title>

	<!-- Meta-Tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="keywords"
		content="Existing Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<script
		type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //Meta-Tags -->

	<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all">

	<!-- Fonts -->
	<link href="//fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	<!-- //Fonts -->

</head>
<!-- //Head -->

<!-- Body -->

<body>

	<h1>ĐĂNG NHẬP</h1>

	<div class="w3layoutscontaineragileits">
		<form method="post">
			<input type="email" Name="emailLogin" placeholder="EMAIL" required="">
			<input type="password" Name="passwordLogin" placeholder="MẬT KHẨU" required="">

			<ul class="agileinfotickwthree">
				<li>
					<input type="checkbox" id="brand1" value="">
					<label for="brand1"><span></span>Ghi nhớ mật khẩu</label>
					<a href="./forgot.php">Quên mật khẩu?</a>
				</li>
			</ul>
			<div class="aitssendbuttonw3ls">
				<input type="submit" value="ĐĂNG NHẬP" name="btnSubmit">
				<p> Bạn chưa có tài khoản?<span></span> <a href="./register.php"> Đăng ký ngay </a></p>
				<div class="clear"></div>
			</div>
		</form>

		<?php
		include('C:/xampp/htdocs/function.php');
		if (isset($_POST["btnSubmit"])) {
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

			$email = $_POST["emailLogin"];
			$password = $_POST["passwordLogin"];

			$sql = "SELECT * FROM nguoidung ,phanquyen 
						WHERE nguoidung.idNguoiDung = phanquyen.idNguoiDung and 
								email = '$email' and 
								matKhau = '$password' and
								phanquyen.idQuyen=2;";
			$result = $conn->query($sql);
			// Kiểm tra và xử lý kết quả trả về
			if ($result->num_rows > 0) {
				$row = $result->fetch_assoc(); // Lấy dữ liệu từ kết quả truy vấn
				$_SESSION["user"] = $row["idNguoiDung"];
				$_SESSION['isUser'] = true;

				if (isset($_GET['currentLocation']) && !empty($_GET['currentLocation'])) {
					$currentLocation = $_GET['currentLocation'];
					// Kiểm tra xem có phần query (tham số GET) trong URL hay không
					$newUrl = updateUrl($currentLocation, 'isUser', 'true');
					header("Location: " . $newUrl);
				} else {
					header("Location: http://localhost/index.php?isUser=true");
				}
				exit();

			} else {
				$sql = "SELECT * FROM nguoidung ,phanquyen 
						WHERE nguoidung.idNguoiDung = phanquyen.idNguoiDung and 
								email = '$email' and 
								matKhau = '$password' and
								phanquyen.idQuyen=1;";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
					$_SESSION["user"] = $row["idNguoiDung"];
					header("Location: http://localhost/admin/user.php");
				} else {
					echo "Không có dữ liệu";
				}
			}
			$conn->close();
		}
		?>


	</div>
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!-- pop-up-box-js-file -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!--//pop-up-box-js-file -->
	<script>
		$(document).ready(function () {
			$('.w3_play_icon,.w3_play_icon1,.w3_play_icon2').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>

</body>
<!-- //Body -->

</html>