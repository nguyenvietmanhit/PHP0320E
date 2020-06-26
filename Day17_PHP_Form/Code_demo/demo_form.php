<?php
//demo_form.php
//khai báo 1 form đơn giản chứa tất cả các input thông dụng
?>
<!--action của form: url xử lý form, thường sẽ để giá trị
rỗng, nghĩa là chính file khai báo form đó sẽ xử lý form luôn
-->
<!--demo_form.php?name=&password=121212121-->
<form action="" method="post">
<!--
khai báo các input bắt buộc phải khai báo thuộc tính name
 -->
    Name: <input type="text" name="name" /> <br />
    Password:
    <input type="password" name="password" />
    <br />
    Age:
    <input type="number" name="age" />
    <br />
    Gender:
<!--  với radio, bắt buộc phải khai báo trùng name để
  chức năng chọn radio hoạt động chính xác
  -->
    <input type="radio" name="gender" value="0" /> Nữ
    <input type="radio" name="gender" value="1" /> Nam
    <br />
<!--  với các input mà cho phép chọn nhiều giá trị tại 1 thời
  điểm như checkbox, select (ở chế độ multiple), file
  (ở chế độ multiple), thì name của input bắt buộc phải ở dạng
  MẢNG
  -->
    Chọn job:
    <input type="checkbox" name="jobs[]" value="0" /> Developer
    <input type="checkbox" name="jobs[]" value="1" /> Tester
    <input type="checkbox" name="jobs[]" value="2" /> PM
    <br />
    Chọn quốc gia:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">USA</option>
    </select>
    <br />
    Chọn nhiều quốc gia
<!--  select nhiều thì name sẽ ở dạng mạng  -->
    <select name="multi_country[]" multiple>
        <option value="0">VN0</option>
        <option value="1">VN1</option>
        <option value="2">VN2</option>
    </select>
    <br />
    Chọn 1 file:
    <input type="file" name="avatar" />
    Chọn nhiều file:
    <input type="file" name="multi_avatar[]" multiple />
    <br />
    Note:
<!--  với thẻ textarea, thì ko  để ký tự cách bên trong nội
  dung thẻ
  -->
    <textarea name="note" cols="20" rows="5"></textarea>
    <br />
    <input type="submit" name="submit" value="Send" />
</form>

<?php
//demo biến $_SERVER: kiểu mảng,
// chứa các thông tin về server của bạn
//dùng cấu trúc sau để debug (xem thông tin ) mảng
echo "<pre>";
print_r($_SERVER);
echo "</pre>";

?>