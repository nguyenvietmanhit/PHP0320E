<!--thuc_hanh_form.php-->
<h2>Thực hành 2 trong slide</h2>
<!--khai báo form-->
<?php
//luôn khai báo code xử lý form ở vị trí phía trên HTML form
//debug thông tin biến chứa dữ liệu của form
//do method form đang là get nên PHP đã tạo ra biến $_GET
////chứa tất cả thông tin của form gửi lên
echo "<pre>";
print_r($_GET);
echo "</pre>";
//quy trình xử lý form sẽ có các bước sau:
//1 - Khai báo các biến chứa thông tin lỗi hoặc thành công
$error = '';
$result = '';
//2 - xử lý submit form chỉ khi người dùng đã có hành động
//submit form, sử dụng hàm isset($var) để kiểm tra xem biến $var
//đã từng tồn tại hay chưa
//3- Xử lý validate form, nếu có lỗi thì đẩy vào biến $error
//4 - Xử lý logic submit form chỉ khi nào ko có lỗi xảy ra,
//tương đương biến $error rỗng

//nếu user submit form thì mới xử lý form
if (isset($_GET['submit'])) {
    //tạo biến và gán giá trị, để tránh phải dùng mảng theo key
    //sẽ hơi dài dòng
    $name = $_GET['name'];
    //validate dữ liệu
//    - Name ko đc để trống
//    - Name phải có độ dài tối thiểu là 6 ký tự
    if (empty($name)) {
        $error = 'Name ko đc để trống';
    } elseif(strlen($name) < 6) {
        $error = 'Name phải có độ dài tối thiểu 6 ký tự';
    }
    //xử lý logic submit form khi ko có lỗi nào xảy ra,
//    tương đương với biến $error đang rỗng
    if (empty($error)) {
        $result = "Tên của bạn: $name";
    }
}
?>
<!--Vùng hiển thị lỗi-->
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<!--Vùng hiển thị kết quả-->
<h3 style="color: green">
    <?php echo $result; ?>
</h3>

<!--5 - Đổ lại dữ liệu user đã nhập ra form -->
<form action="" method="get">
    Nhập tên của bạn: <br />
<!--  Đổ lại dữ liệu ra trường name dùng toán tử điều kiện  -->
    <input type="text" name="name"
value="<?php echo isset($_GET['name']) ? $_GET['name'] : '' ?>"/>
    <br />
    <input type="submit" name="submit" value="Show thông tin" />
</form>
