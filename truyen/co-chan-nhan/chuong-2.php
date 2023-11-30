<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/svg.js/3.2.0/svg.min.js"
        integrity="sha512-EmfT33UCuNEdtd9zuhgQClh7gidfPpkp93WO8GEfAP3cLD++UM1AG9jsTUitCI9DH5nF72XaFePME92r767dHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
        </script>
    <link rel="stylesheet" href="../asset/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php
    $id = 5;
    ?>
    <div id="app">
        <?php
        include("C:/xampp/htdocs/header.php");
        ?>
        <div id="chapter-content" style="margin-top: 72px;">
            <div tabindex="0" id="bookRead">
                <main class="main py-4">
                    <div id="tpm-200067-container" data-partner="passback" data-filled="true" class="tpm-unit"
                        style="opacity: 1;">
                        <div id="ads-1701116082002">
                        </div>
                    </div>
                    <div class="nh-read__container" style="width: 1000px;">
                        <div id="js-left-menu" class="nh-read__right"
                            style="position: absolute; left: auto; width: 70px;">
                            <ul id="js-menu-actions" class="list-unstyled m-0 nh-read__menu rounded-2">
                                <li class="item">
                                    <a title="" data-toggle="tooltip" data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                                        data-original-title="Danh sách chương">
                                        <i class="nh-icon icon-menu">
                                        </i>
                                    </a>
                                    <div class="nh-read__popover">
                                        <button type="button" data-type="close" class="btn btn-sm btn-close mr-2"
                                            style="z-index: 1;">
                                            <i class="nh-icon icon-close float-left">
                                            </i>
                                        </button>
                                        <div class="nh-read__popover-content">
                                            <div class="d-flex align-items-center mb-3 pr-3">
                                                <div class="h3 font-weight-normal mb-0">Danh sách chương</div>
                                                <button class="btn btn-white ml-auto px-3">
                                                    <i class="nh-icon icon-sort-desc h4 m-0 float-left">
                                                    </i>
                                                </button>
                                            </div>
                                            <div class="nh-section mb-4">
                                                <div class="row mt-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <a title="" data-toggle="tooltip" data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-menu-item js-tooltip"
                                        data-original-title="Cài đặt hiển thị">
                                        <i class="nh-icon icon-setting">
                                        </i>
                                    </a>
                                    <div class="nh-read__popover nh-read__popover--setting">
                                        <button type="button" data-type="close" class="btn btn-close">
                                            <i class="nh-icon icon-close float-left">
                                            </i>
                                        </button>
                                        <div class="nh-read__popover-content">
                                            <div class="d-flex align-items-center mb-3 pr-3">
                                                <div class="h3 font-weight-normal mb-0">Cài đặt</div>
                                            </div>
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 180px;">
                                                            <div class="d-inline-flex align-items-center">
                                                                <i
                                                                    class="nh-icon icon-color h4 mb-0 mr-2 text-secondary">
                                                                </i>Màu nền
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <ul id="js-themes-picker"
                                                                class="list-unstyled nh-read__themes d-flex flex-wrap">
                                                                <li>
                                                                    <a class="item rounded-circle item--1">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--2 active">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--3">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--4">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--5">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--6">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--7">
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a class="item rounded-circle item--8">
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle" style="width: 180px;">
                                                            <div class="d-inline-flex align-items-center">
                                                                <i
                                                                    class="nh-icon icon-font h4 mb-0 mr-2 text-secondary">
                                                                </i>Font chữ
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <select id="js-font-picker"
                                                                class="form-control custom-select">
                                                                <option value="'Palatino Linotype'"> Palatino Linotype
                                                                </option>
                                                                <option value="'Source Sans Pro'">Source Sans Pro
                                                                </option>
                                                                <option value="'Segoe UI'">Segoe UI</option>
                                                                <option value="Roboto">Roboto</option>
                                                                <option value="'Patrick Hand'">Patrick Hand</option>
                                                                <option value="'Noticia Text'">Noticia Text</option>
                                                                <option value="'Times New Roman'">Times New Roman
                                                                </option>
                                                                <option value="Verdana">Verdana</option>
                                                                <option value="Tahoma">Tahoma</option>
                                                                <option value="Arial">Arial</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle" style="width: 180px;">
                                                            <div class="d-inline-flex align-items-center">
                                                                <i
                                                                    class="nh-icon icon-size h4 mb-0 mr-2 text-secondary">
                                                                </i>Cỡ chữ
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div data-unit="px" data-type="font-size" data-max="30"
                                                                data-min="14" data-step="1"
                                                                class="d-flex align-items-center js-content-options">
                                                                <button class="btn btn-white border px-2 minus">
                                                                    <i class="nh-icon icon-minus float-left">
                                                                    </i>
                                                                </button>
                                                                <div
                                                                    class="flex-fill text-center font-weight-semibold value">
                                                                    30px </div>
                                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                                    <i class="nh-icon icon-plus float-left">
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle" style="width: 180px;">
                                                            <div class="d-inline-flex align-items-center">
                                                                <i
                                                                    class="nh-icon icon-width-resize h4 mb-0 mr-2 text-secondary">
                                                                </i>Chiều rộng khung
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div data-unit="px" data-type="width" data-max="1000"
                                                                data-min="500" data-step="100"
                                                                class="d-flex align-items-center js-content-options">
                                                                <button class="btn btn-white border px-2 minus">
                                                                    <i class="nh-icon icon-minus float-left">
                                                                    </i>
                                                                </button>
                                                                <div
                                                                    class="flex-fill text-center font-weight-semibold value">
                                                                    1000px </div>
                                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                                    <i class="nh-icon icon-plus float-left">
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle" style="width: 180px;">
                                                            <div class="d-inline-flex align-items-center">
                                                                <i
                                                                    class="nh-icon icon-line-height h4 mb-0 mr-2 text-secondary">
                                                                </i>Giãn dòng
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div data-unit="%" data-type="line-height" data-max="200"
                                                                data-min="100" data-step="10"
                                                                class="d-flex align-items-center js-content-options">
                                                                <button class="btn btn-white border px-2 minus">
                                                                    <i class="nh-icon icon-minus float-left">
                                                                    </i>
                                                                </button>
                                                                <div
                                                                    class="flex-fill text-center font-weight-semibold value">
                                                                    160% </div>
                                                                <button class="btn btn-white border px-2 ml-auto plus">
                                                                    <i class="nh-icon icon-plus float-left">
                                                                    </i>
                                                                </button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </li>
                                <li class="item">
                                    <a href="/truyen/ai-bao-han-tu-tien" title="" data-toggle="tooltip"
                                        data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-tooltip"
                                        data-original-title="Thông tin truyện">
                                        <i class="nh-icon icon-arrow-left">
                                        </i>
                                    </a>
                                </li>
                                <li title="" data-toggle="tooltip" data-placement="right" class="item js-tooltip"
                                    data-original-title="Hướng dẫn">
                                    <a data-toggle="modal" class="d-flex align-items-center justify-content-center">
                                        <i class="nh-icon icon-info">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="sticky-spacer"
                            style="height: 150px; inset: auto -85px auto auto; position: absolute; display: block; vertical-align: baseline; box-sizing: border-box; margin: 0px; padding-left: 0px; padding-right: 0px; float: none; width: 70px; z-index: -1;">
                        </div>
                        <div class="sticky-spacer"
                            style="height: 150px; inset: auto -85px auto auto; position: absolute; display: block; vertical-align: baseline; box-sizing: border-box; margin: 0px; padding-left: 0px; padding-right: 0px; float: none; width: 70px; z-index: -1;">
                        </div>
                        <div id="js-right-menu" class="nh-read__right sticky"
                            style="position: fixed; left: 1205.55px; width: 70px; bottom: auto; top: 497px;">
                            <ul class="list-unstyled m-0 nh-read__menu rounded-2">
                                <li title="" data-toggle="tooltip" data-placement="right" class="js-tooltip"
                                    data-original-title="Cảm xúc">
                                    <a data-toggle="collapse" aria-expanded="false" aria-controls="js-reaction-menu"
                                        class="d-flex align-items-center justify-content-center js-tooltip"
                                        data-original-title="" title="">
                                        <i class="nh-icon svg-icon icon-heart">
                                        </i>
                                    </a>
                                    <!---->
                                </li>
                                <li style="height: 50px;">
                                    <a title="" data-toggle="tooltip" data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-tooltip"
                                        data-original-title="Đánh dấu">
                                        <i class="nh-icon icon-save">
                                        </i>
                                    </a>
                                    <!---->
                                </li>
                                <li>
                                    <a onclick="window.scrollTo(0, $('#read-comments').offset().top)" title=""
                                        data-toggle="tooltip" data-placement="right"
                                        class="d-flex align-items-center justify-content-center js-tooltip"
                                        data-original-title="Xem bình luận">
                                        <i class="nh-icon icon-comments">
                                        </i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mb-3">
                        </div>
                        <div id="js-read__body" class="nh-read__body rounded-2">
                            <div class="d-flex align-items-center mb-4">
                                <a class="nh-read__action d-flex align-items-center h6 mb-0 rounded-3 py-2 px-4 ">
                                    <i class="nh-icon icon-prev-2 mr-2 small">
                                    </i>Chương trước </a>
                                <a
                                    class="nh-read__action d-flex align-items-center h6 mb-0 ml-auto rounded-3 py-2 px-4">
                                    Chương sau <i class="nh-icon icon-next-2 ml-2 small">
                                    </i>
                                </a>
                            </div>
                            <div class="h1 mb-4 font-weight-normal nh-read__title"> Chương 515: Vẫn là Bất Hủ tiên tử
                                kiến thức nhiều </div>
                            <ul class="list-unstyled d-flex align-items-center flex-wrap">
                                <li class="d-flex mr-4 mb-1">
                                    <h1 class="fz-body font-weight-normal m-0">
                                        <a href="https://metruyencv.com/truyen/ai-bao-han-tu-tien"
                                            class="text-inherit d-flex align-items-center">
                                            <i class="nh-icon icon-book mr-2">
                                            </i> Ai Bảo Hắn Tu Tiên! </a>
                                    </h1>
                                </li>
                                <li class="d-flex align-items-center mr-4 mb-1">
                                    <i class="nh-icon icon-text mr-2">
                                    </i> 1712 chữ
                                </li>
                                <li class="d-flex align-items-center mr-4 mb-1">
                                    <i class="nh-icon icon-heart mr-2">
                                    </i> 3 cảm xúc
                                </li>
                                <li class="d-flex align-items-center mr-4 mb-1">
                                    <i class="nh-icon icon-clock mr-2">
                                    </i> 2023-11-27 18:03:23
                                </li>
                            </ul>
                            <div id="js-read__content" class="nh-read__content post-body"
                                style="font-size: 30px; font-family: &quot;Palatino Linotype&quot;; margin: auto; line-height: 160%;">
                                <div id="article" class="c-c">
                                    <p class="yldeut57">
                                        Trong truyền thuyết, thế giới này tồn tại một con sông thời gian, lưu chuyển
                                        chống đỡ thế giới. Mà sử dụng sức mạnh của Xuân Thu Thiền, có thể ngược dòng lên
                                        trên, trở lại lúc trước.

                                        Đối với lời đồn này, thế nhân nhiều cách nói xôn xao. Rất nhiều người cũng không
                                        tin, có vài người thì nửa tin nửa ngờ.

                                        Dường như không ai thật sự tin tưởng.

                                        Bởi vì mỗi một lần sử dụng Xuân Thu Thiền, đều phải trả giá sinh mạng, hiến tế
                                        toàn bộ thân thể cùng tất cả tu vi, làm sức mạnh điều động.

                                        Cái giá này thật sự quá đắt, càng làm cho không ai chấp nhận được chính là - trả
                                        giá sinh mạng cũng không biết kết quả như thế nào.

                                        Cho dù có người lấy được Xuân Thu Thiền, cũng không dám rảnh rỗi sử dụng lung
                                        tung.

                                        Ngộ nhỡ tin đồn là giả, chỉ là âm mưu thì sao?

                                        Nếu không phải Phương Nguyên cùng đường, cũng sẽ không sử dụng nó như vậy.

                                        Chẳng qua hiện tại, Phương Nguyên đã triệt triệt để để tin tưởng.

                                        Bởi vì sự thật như sắt thép xảy ra trước mắt, không thể nào phản bác. Hắn thật
                                        sự sống lại!

                                        "Nhưng mà đáng tiếc con Cổ tốt này, lúc trước thật phải mất sức chín trâu hai
                                        hổ, giết hại hơn mười vạn người, làm cho người người oán trách, trăm cay nghìn
                                        đắng mới luyện chế được ..." Phương Nguyên trong lòng thầm than thở, tuy rằng
                                        sống lại, nhưng mà cũng không mang theo Xuân Thu Thiền.

                                        Con người là linh hồn vạn vật, Cổ là tinh hoa thiên địa.

                                        Cổ vô cùng quái lạ, nhiều đếm không xuể. Có Cổ dùng một lần hoặc là hai ba lần,
                                        sẽ hoàn toàn tiêu tán. Mà có Cổ, chỉ cần không sử dụng quá độ, là có thể sử dụng
                                        lặp đi lặp lại được.

                                        Có lẽ Xuân Thu Thiền chính là cái loại Cổ trùng tiêu hao chỉ có thể sử dụng một
                                        lần này.

                                        "Chẳng qua cho dù là không có, cũng có thể lại luyện chế một con. Kiếp trước ta
                                        có thể luyện chế, chẳng lẽ kiếp này thì không thể sao?" Sau khi than tiếc, trong
                                        lòng Phương Nguyên lại không khỏi dâng lên một hồi chí khí hào hùng.

                                        Bản thân có thể sống lại, tổn thất Xuân Thu Thiền hoàn toàn có thể chấp nhận
                                        được.

                                        Hơn nữa hắn còn mang trân bảo, cũng không phải hai bàn tay trắng.

                                        Cái trân bảo này, chính là hai trăm năm trí nhớ cùng kinh nghiệm của hắn.

                                        Trong trí nhớ của hắn tồn tại rất nhiều kho tàng, hiện giờ vẫn chưa có người nào
                                        mở ra. Còn có một đám sự kiện lớn, khiến hắn có thể dễ dàng nắm giữ dòng chảy
                                        lịch sử. Còn có vô số con người, có một số là tiền bối ẩn tu, có một số là thiên
                                        tuấn kì tài, có vài người thậm chí còn chưa sinh ra. Còn có từng trải việc khổ
                                        tu nặng nhọc, kinh nghiệm chiến đấu phong phú trong năm trăm năm qua.

                                        Có những cái này, không thể nghi ngờ là nắm giữ đại cục cùng tiên cơ. Chỉ cần
                                        làm thật tốt, tung hoành nhân gian, tái hiện hào quang cự ma kiêu hùng, hoàn
                                        toàn không thành vấn đề, thậm chí có thể tiến thêm một bước, trùng kích vào cảnh
                                        giới cao hơn!

                                        "Như vậy nên làm như thế nào đây..." Phương Nguyên vô cùng trí, nhanh chóng
                                        chỉnh lại tâm trạng, nhìn mưa đêm ngoài cửa sổ bắt đầu suy nghĩ.

                                        Nghĩ vậy, đã cảm thấy ngổn ngang trăm mối.

                                        Suy tư một lát, đầu mày hắn càng nhăn càng sâu.

                                        Thời gian năm trăm năm, thật sự có hơi dài. Chưa nói đến chuyện trí nhớ đã mơ hồ
                                        không nhớ nổi nữa. Cho dù nhớ rõ rất nhiều mật địa kho tàng, cơ duyên tiên sư,
                                        nhưng phần lớn không phải cách xa vạn dặm, thì cũng là cần ở riêng một thời gian
                                        mới có thể mở ra.

                                        "Mấu chốt hàng đầu vẫn là tu vi. Mình hiện giờ nguyên hải chưa mở, còn chưa bước
                                        lên con đường tu hành Cổ sư, vốn là một phàm nhân! Phải mau chóng tu hành, tăng
                                        trưởng tu vi, cản đầu lịch sử, dốc sức chiếm trước tiên cơ, giành giật chỗ tốt."

                                        Hơn nữa rất nhiều kho tàng bí mật, tu vi không đủ, cho dù chiếm được cũng không
                                        tiêu hóa được. Ngược lại là khoai lang phỏng tay, hoài bích có tội.

                                        Nan đề thứ nhất hiện ra trước mặt Phương Nguyên, chính là tu vi.

                                        Nhất định phải nhanh chóng nâng cao tu vi, nếu như chậm chạp giống như đời trước
                                        thì như người ta nói, món Hoàng Hoa cũng đã lạnh rồi*.

                                        (*Đại ý là quá muộn. Hoàng Hoa là một món ăn đưa ra cuối bữa ăn, món này cũng đã
                                        lạnh tức là đã quá muộn.)

                                        "Muốn nhanh chóng nâng cao tu vi, nhất định phải mượn tài nguyên của gia tộc.
                                        Lấy tình huống của ta hiện tại, cơ bản là không có khả năng đi lại trong núi
                                        rừng nguy cơ trùng trùng, một con lợn rừng bình thường cũng có thể lấy tính mạng
                                        của ta. Nếu có thể đạt đến tu vi Cổ sư tam chuyển, thì còn có năng lực tự bảo vệ
                                        cơ bản, tại đây trên thế giới này trèo đèo lội suối."

                                        Lấy ánh mắt của một cự phách ma đạo trui rèn qua năm trăm năm mà xem, Thanh Mao
                                        Sơn thật sự rất nhỏ, Cổ Nguyệt sơn trại càng như cái nhà giam.

                                        Nhưng mà nhà giam giam cầm tự do, phòng giam kiên cố cũng thường đại biểu cho sự
                                        an toàn nào đó.

                                        "Hừ, trong khoảng thời gian ngắn, tạm thời ở trong nhà giam này chơi quyền cước
                                        vậy. Chỉ cần tấn thăng Cổ sư tam chuyển, liền rời khỏi vùng núi rừng hoang vu
                                        này. Nhưng mà cũng may, ngày mai chính là Khai Khiếu Đại Điển, ngay sau đó là có
                                        thể chính thức bắt đầu tu hành Cổ sư."

                                        Vừa nghĩ đến Khai Khiếu Đại Điển, kí ức đã phủ đầy bụi từ lâu trong đáy lòng
                                        Phương Nguyên bắt đầu hiện lên.

                                        "Tư chất sao..." Nhìn ra ngoài cửa sổ, hắn không khỏi cười khẩy ba tiếng.

                                        Đúng lúc này, cửa phòng bị đẩy nhẹ ra, một thiếu niên đi vào.

                                        "Ca ca, ngươi sao lại đứng bên cửa sổ đang mưa?"

                                        Thiếu niên này dáng người gầy gò, so với Phương Nguyên thấp hơn một chút, khuôn
                                        mặt cực kỳ giống Phương Nguyên.

                                        Phương Nguyên quay đầu nhìn thiếu niên này, trên mặt hiện ra vẻ phức tạp.

                                        "Là ngươi sao, đệ đệ song sinh của ta." Hắn hơi hơi nhướng mày, vẻ mặt khôi phục
                                        lạnh lùng như trước.

                                        Phương Chính cúi đầu, nhìn mũi chân của mình, đây là động tác chiêu bài của hắn:
                                        "Nhìn thấy cửa sổ của ca ca chưa đóng, muốn lặng lẽ đi vào đóng lại. Ngày mai sẽ
                                        là Khai Khiếu Đại Điển, ca ca ngươi khuya như vậy còn chưa nghỉ ngơi, cậu mợ
                                        biết rồi e rằng sẽ lo lắng."

                                        Hắn cũng không thấy lạ với sự lạnh lùng của Phương Nguyên, cũng do từ nhỏ đến
                                        lớn, ca ca của hắn luôn luôn như vậy.

                                        Có đôi khi hắn lại nghĩ, có lẽ thiên tài chính là không giống thường nhân như
                                        vậy đi. Tuy rằng có tướng mạo cực kì giống ca ca, nhưng mình lại tầm thường
                                        giống như một con kiến hôi.

                                        Cùng từ trong bụng mẹ sinh ra, vì sao trời cao lại bất công như thế. Trao cho ca
                                        ca tài hoa như kim cương, mà mình lại bình thường như hòn đá.

                                        Mỗi người bên cạnh, nhắc đến mình, cũng sẽ nói "Đây là đệ đệ của Phương Nguyên."

                                        Cậu mợ cũng thường dạy mình, học hỏi ca ca ngươi.

                                        Thậm chí bản thân có đôi khi soi gương, nhìn khuôn mặt này của mình, cũng cảm
                                        thấy hơi đáng ghét!

                                        Những ý niệm này đã có từ rất nhiều năm, tích lũy tháng ngày đặt ở sâu trong nội
                                        tâm. Như là một tảng đá lớn đè nặng trong lòng, mấy năm nay đầu của Phương Chính
                                        cúi xuống càng ngày càng thấp, cũng càng thêm trầm mặc ít nói.

                                        "Lo lắng..." Nghĩ đến cậu mợ, trong lòng Phương Nguyên âm thầm cười nhạo.

                                        Hắn nhớ rất rõ, cha mẹ hắn bởi vì một lần nhiệm vụ gia tộc, mà cùng lúc ngã
                                        xuống. Lúc ba tuổi, cùng với đệ đệ trở thành cô nhi.

                                        Cậu mợ dựa vào danh nghĩa nuôi dưỡng, công khai chiếm đoạt di sản cha mẹ, hơn
                                        nữa đối đãi khắc nghiệt với mình cùng đệ đệ.

                                        Vốn là người xuyên qua, còn tính giấu tài. Nhưng cuộc sống gian khổ, khiến
                                        Phương Nguyên không thể không lựa chọn thể hiện ra "tài hoa" khác hẳn thường
                                        nhân.

                                        Cái gọi là thiên tài, thật sự hẳng qua lý trí linh hồn trưởng thành, cùng với
                                        Đường thi Tống từ lưu danh muôn đời trên địa cầu thôi.

                                        Chính là ra tay một chút như vậy, cũng bị kinh hãi gọi là thiên nhân, được khắp
                                        nơi quan tâm. Dưới áp lực từ bên ngoài, cũng khiến Phương Nguyên nhỏ tuổi không
                                        thể không lựa chọn vẻ mặt lạnh lùng, ngụy trang bảo vệ bản thân, giảm bớt khả
                                        năng lộ tẩy.

                                        Lâu ngày, lạnh lùng ngược lại trở thành biểu cảm thói quen của mình.

                                        Cứ như vậy, cậu mợ không bao giờ khắc nghiệt với mình cùng đệ đệ nữa, theo tuổi
                                        càng lớn, tiền đồ càng được xem trọng, được đối đãi cũng tốt hơn.

                                        Có điều đây cũng không phải là yêu thương, mà là một loại đầu tư.

                                        Nực cười đứa em trai này, lại không thấy rõ chân tướng, không chỉ bị cậu mợ lừa
                                        gạt, còn chôn giấu oán hận với mình. Đừng nhìn hắn thành thật ngoan ngoãn như
                                        bây giờ, trong trí nhớ sau khi được kiểm nghiệm ra tư chất Giáp đẳng về sau,
                                        được gia tộc mạnh mẽ đào tạo, thù hận ghen tị che giấu bên trong phóng ra, cũng
                                        không ít lần làm khó dễ, chèn ép với chính ca ca của hắn .

                                        Về phần tư chất của mình thì...

                                        Ha ha, cao nhất chỉ là một Bính đẳng mà thôi.

                                        Vận mệnh luôn thích đùa giỡn.

                                        Một thai song bào, tư chất ca ca chỉ là Bính đẳng, lại độc hưởng cái danh thiên
                                        tài mười mấy năm. Đệ đệ không có tiếng tăm gì, ngược lại có thiên tư Giáp đẳng.

                                        Hiểu ra kết quả, khiến cho tộc nhân mở rộng tầm mắt. Cũng khiến cho tình cảnh
                                        đãi ngộ của hai huynh đệ, hoàn toàn đảo lộn.

                                        Đệ đệ như ngọa long thăng thiên, ca ca lại như tiểu phụng hoàng rơi xuống đất.

                                        Sau đó, là nhiều lần khó dễ đến từ đệ đệ, cậu mợ lạnh nhạt, tộc nhân khinh thị.

                                        Hận sao?

                                        Phương Nguyên kiếp trước từng hận, hận tư chất bản thân không đủ, hận gia tộc vô
                                        tình, hận số phận bất công.

                                        Nhưng hiện tại, lấy từng trải năm trăm năm nhân sinh của hắn, một lần nữa xem
                                        lại đoạn đường đã qua này, trong lòng không gợn sóng, không sợ hãi, không chút
                                        thù hận.

                                        Phẫn hận cái gì đây?

                                        Đổi góc nhìn suy xét một chút, hắn cũng có thể hiểu được đệ đệ, cậu mợ, cùng với
                                        cường địch chính phái năm trăm năm sau vây công hắn.

                                        Mạnh được yếu thua, người thích nghi thì sinh tồn, vốn là bản chất của thế gian
                                        này.

                                        Huống chi người có chí hướng riêng, cũng vì tranh đoạt một đường thiên cơ, chèn
                                        ép sát phạt lẫn nhau có gì khó hiểu đâu?

                                        Trải qua năm trăm năm, đã sớm làm cho hắn nhìn thấu tất cả điều này, trong lòng
                                        chỉ có đại đạo trường sinh.

                                        Nếu có người ngăn cản theo đuổi này của hắn, mặc kệ là ai, đơn giản là ngươi
                                        chết ta sống mà thôi.

                                        Dã tâm trong lòng quá lớn, bước trên con đường này, thì đã định trước trên đời
                                        đều là địch, đã định trước độc lai độc vãng, đã định trước sát kiếp trùng trùng
                                        điệp điệp.

                                        Đây là giác ngộ cô đọng năm trăm năm nhân sinh.

                                        "Báo thù không phải dự định của ta, con đường tà ma cũng chưa bao giờ có hai chữ
                                        thỏa hiệp." Nghĩ đến đây, Phương Nguyên không khỏi bật cười. Quay đầu lại, nhàn
                                        nhạt nhìn đệ đệ này một cái, nói: "Ngươi lui ra đi."

                                        Phương Chính trong lòng sợ hãi, cảm giác ánh mắt ca ca giống như lưỡi dao lạnh
                                        lẽo lại sắc bén, cứ như xuyên thủng đến chỗ sâu nhất trong nội tâm hắn.

                                        Dưới ánh mắt này, hắn như người trần truồng trong tuyết lạnh, không có bí mật gì
                                        đáng nói đến.

                                        "Vậy ngày mai gặp, ca ca" Lập tức không dám nói nhiều, Phương Chính từ từ đóng
                                        cửa phòng, thưa dạ trở ra.
                                    </p>
                                </div>
                                </a>
                                <br>
                                <br>
                            </div>

                        </div>
                    </div>
            </div>
        </div>
    </div>
    </div>
    <div id="footer">
        <hr class="my-0">
        <footer class="footer text-center py-4">
            <div class="container">
                <a href="/" class="d-inline-block py-1 my-2">
                    <img src="../asset/images/logo.png" alt="logo" width="64" height="64">
                </a>
                <div class="w-75 m-auto">Mê Truyện Chữ là nền tảng mở trực tuyến, miễn phí đọc truyện chữ được
                    convert hoặc dịch kỹ lưỡng, do các converter và dịch giả đóng góp, rất nhiều truyện hay và nổi
                    bật được cập nhật nhanh nhất với đủ các thể loại tiên hiệp, kiếm hiệp, huyền ảo ... </div>
                <div class="footer-app mt-4" id="app-download">
                    <div class="d-flex align-items-center justify-content-center py-1">
                        <a href="/" class="mr-3">
                            <img src="../asset/images/app-store.png" alt height="34">
                        </a>
                        <a href="/" class>
                            <img src="../asset/images/google-play.png" alt height="34">
                        </a>
                    </div>
                </div>
                <ul class="list-unstyled mt-4 mb-0 d-flex justify-content-center">
                    <li>
                        <a href="/" target="_blank" class="d-inline-block px-3 py-2">Điều khoản dịch vụ</a>
                    </li>
                    <li>
                        <a href="/" target="_blank" class="d-inline-block px-3 py-2">Chính sách bảo mật</a>
                    </li>
                    <li>
                        <a href="/" target="_blank" class="d-inline-block px-3 py-2">Về bản quyền</a>
                    </li>
                    <li>
                        <a href="/" target="_blank" class="d-inline-block px-3 py-2">Hướng dẫn sử dụng</a>
                    </li>
                </ul>
            </div>
        </footer>
    </div>
</body>

</html>