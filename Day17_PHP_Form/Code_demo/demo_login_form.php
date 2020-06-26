<!--demo_login_form.php-->
<?php
//debug thông tin biến $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
//tạo biến lưu thông tin lỗi và kết quả
$error = '';
$result = '';
//nếu có hành động submit form thì mới xử lý
if (isset($_POST['submit'])) {
    //tạo biến và gán giá trị
    $username = $_POST['username'];
    $password = $_POST['password'];
    //xử lý validate theo yêu cầu đề bài
    if (empty($username) || empty($password)) {
        $error = 'Không đc để trống các trường';
    }
    //sử dụng hàm filter_var để check định dạng dữ liệu
    //gồm 2 tham số: tên biến muốn kiểm tra và hằng số quy định
    //sẽ validate theo kiểu nào
    elseif(!filter_var($username, FILTER_VALIDATE_EMAIL)) {
        $error = 'Username phải có định dạng email';
    } elseif(strlen($password) < 6) {
        $error = 'Password phải có độ dài tối thiểu 6 ký tự';
    }

    //xử lý logic submit form khi ko có lỗi xảy ra
    if (empty($error)) {
        //xử lý đăng nhập
        if ($username == 'nguyenvietmanhit@gmail.com'
            && $password == 123456) {
            $result = 'Đăng nhập thành công';
        } else {
            $error = 'Sai tài khoản hoặc mật khẩu';
        }
    }
}
?>
<h3 style="color: red">
    <?php echo $error; ?>
</h3>
<h3 style="color: green">
    <?php echo $result; ?>
</h3>
<form action="" method="post">
    Username:
    <input type="text" name="username" value="" />
    <br />
    Password:
    <input type="password" name="password" value="" />
    <br />
    <input type="submit" name="submit" value="Đăng nhập" />
</form>