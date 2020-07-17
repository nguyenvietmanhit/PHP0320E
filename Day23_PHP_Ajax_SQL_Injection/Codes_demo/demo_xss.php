<?php
//crud/demo_xss.php
//Demo lỗi bảo mật XSS liên quan đến form
//XSS - Cross-site scripting - là kỹ thuật tấn công form, bằng
//cách chèn các mã javascript vào form

//XỬ LÝ FORM
if (isset($_GET['submit'])) {
    //để fix lỗi xss, trước khi hiển thị ra giá trị của biến
    //cần lọc biến đó bằng cách chuyển các ký tự đặc biệt thành
    //ký tự an toàn, sử dụng hàm htmlspecialchars
    $name = $_GET['name'];
    $name = htmlspecialchars($name);
    echo "Tên của bạn: $name";
    //thử nhập giá trị sau
    //     <script>alert(document.cookie);</script>
    //sau khi nhập sẽ xuất hiện alert -> form đã bị dính lỗi XSS
}
?>
<form action="" method="get">
    Nhập tên:
    <input type="text" name="name"
value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''?>" />
    <br />
    <input type="submit" name="submit" value="Hiển thị name" />
</form>
