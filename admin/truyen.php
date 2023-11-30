<?php
include("header.php");
?>
<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link" href="user.php">
        <i class="fa-solid fa-user"></i>
        <span>Người dùng</span></a>
</li>

<li class="nav-item active">
    <a class="nav-link" href="#">
        <i class="fa-solid fa-book"></i>
        <span>Truyện</span></a>
</li>


<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <?php
        include("taiKhoan.php");
        ?>

        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_truyen";
        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
        }

        $records_per_page = 4;

        if (isset($_GET['page']) && is_numeric($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 1;
        }

        $start_from = ($page - 1) * $records_per_page;

        $sql = "SELECT truyen.*, tenTheLoai FROM truyen, truyen_theloai, theloai
        WHERE truyen.idTruyen = truyen_theloai.idTruyen 
        AND truyen_theloai.idTheLoai = theloai.idTheLoai 
        LIMIT $start_from, $records_per_page";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>
        <tr>
            <td class="img">Hình ảnh</td>
            <td class="name">Tên Truyện</td>
            <td class="author">Tác Giả</td>
            <td class="theLoai">Thể Loại</td>
            <th class="setting"></th>
            <th class="setting"></th>
        </tr>';

            while ($row = $result->fetch_assoc()) {
                echo '
            <tr>
                <td class="img"><img src=".' . $row["hinhAnh"] . '" alt="' . $row["tenTruyen"] . '" width="72px"></td>
                <td class="name">' . $row["tenTruyen"] . '</td>
                <td class="author">' . $row["tacGia"] . '</td>
                <td class="theLoai">' . $row["tenTheLoai"] . '</td>
                <th class="setting"><a href="http://localhost/admin/change-truyen.php?id=' . $row["idTruyen"] . '">Sửa</a></th>
                <th class="setting"><a href="http://localhost/admin/delete-truyen.php?id=' . $row['idTruyen'] . '">Xóa</a></th>
            </tr>
        ';
            }

            echo '</table>';

            // Tính số trang
            $sql = "SELECT COUNT(*) AS total_records FROM truyen";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_records = $row['total_records'];
            $total_pages = ceil($total_records / $records_per_page);

            // Hiển thị các liên kết phân trang
            echo '<div class="pagination" style="
                    display: flex;
                    justify-content: flex-end;
                    max-width: 1200px;
                    margin: auto;
                ">';
            for ($i = 1; $i <= $total_pages; $i++) {
                echo '<a href="?page=' . $i . '" style="
                        padding: 8px;
                    ">' . $i . '</a>';
            }
            echo '</div>';
        } else {
            echo "Không có dữ liệu";
        }

        $conn->close();
        ?>

        <!-- End of Main Content -->
        <?php
        include("footer.php");
        ?>