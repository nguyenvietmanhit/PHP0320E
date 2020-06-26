<!--thuc_hanh_3.php-->
<?php
//debug thông tin mảng $_POST
echo "<pre>";
print_r($_POST);
echo "</pre>";
//khai báo biến error và result
$error = '';
$result = '';
//nếu user submit form thì mới xử lý
if (isset($_POST['submit'])) {
    //tạo biến và giá trị cho biến
    $name = $_POST['name'];
    $email = $_POST['email'];
    $specific_time = $_POST['specific_time'];
    $class_details = $_POST['class_details'];
    //với radio và checkbox sẽ có trường hợp user ko tích chọn
    //thì khi submit form, sẽ ko tồn tại các key tương ứng
    //với radio và checkbox đó
    $gender = '';
    if(isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    $jobs = '';
    if (isset($_POST['jobs'])) {
        $jobs = $_POST['jobs'];
    }
    $country = $_POST['country'];
    //validate dữ liệu
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Email chưa đúng định dạng';
    } elseif(empty($specific_time)) {
        $error = 'Specific Time ko đc để trống';
    } elseif(strlen($gender) == 0) {
        $error = 'Phải chọn gender';
    } elseif(empty($jobs)) {
        $error = 'Phải chọn ít nhất 1 jobs';
    }
    //xử lý logic submit form khi ko có lỗi nào
    if (empty($error)) {
        //hiển thị các thông tin user đã nhập ra màn hình
        $result .= "Name: $name <br />";
        $result .= "Email: $email <br />";
        $result .= "Specific Time: $specific_time <br />";
        $result .= "Class detail: $class_details <br />";
        //với các input radio, checkbox, select do đang để value
//        là kiểu số, nên cần có bược chuyển đổi thành dữ liệu
        //dễ đọc với người dùng
        //hiển thị giá trị text của gender
        if (!empty($gender)) {
            switch ($gender) {
                case 0: $result .= "Gender: Female <br />";break;
                case 1: $result .= "Gender: Male <br />";break;
            }
        }
        //xử lý hiện thị jobs
        if (!empty($jobs)) {
            foreach($jobs AS $job) {
                switch ($job) {
                    case 0: $result .= "Jobs: Developer";break;
                    case 1: $result .= "Jobs: Tester";break;
                    case 2: $result .= "Jobs: PM";break;
                }

            }
        }
        //xử lý select country, giống với xử lý radio
        switch ($country) {
            case 0: $result .= "Country: VN";break;
            case 1: $result .= "Country: USA";break;
            case 2: $result .= "Country: Japan";break;
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
    Name:
    <input type="text" name="name" value="" />
    <br />
    Email:
    <input type="text" name="email" value="" />
    <br />
    Specific Time
    <input type="date" name="specific_time" value="" />
    <br />
    Class details:
    <textarea name="class_details" cols="20"></textarea>
    <br />
    Gender:
    <input type="radio" name="gender" value="0" /> Female
    <input type="radio" name="gender" value="1" /> Male
    <br />
    Jobs:
<!--  với checkbox thì name phải ở dạng mảng  -->
    <input type="checkbox" name="jobs[]" value="0" />Developer
    <input type="checkbox" name="jobs[]" value="1" />Tester
    <input type="checkbox" name="jobs[]" value="2" />PM
    <br />
    Country:
    <select name="country">
        <option value="0">VN</option>
        <option value="1">USA</option>
        <option value="2">Japan</option>
    </select>
    <br />
    <input type="submit" name="submit" value="Show info" />
    <input type="reset" name="reset" value="Reset" />
</form>