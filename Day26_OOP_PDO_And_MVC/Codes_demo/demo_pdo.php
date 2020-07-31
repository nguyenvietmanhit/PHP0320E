<?php
//demo_pdo.php
// + PDO - PHP Data Objects - là 1 cơ chế kết nối CSDL, tuy
//nhiên PDO sử dụng hoàn toàn cú pháp của lập trình hướng
//đối tượng
// + PDO cho phép kết nối tới nhiều hệ CSDL khác nhau:
//MySQL, SQLServer, Oracle ...
// + So sánh với cơ chế kết nối CSDL sử dụng MySQLi, chỉ
//kết nối đc duy nhất CSDL MySQL, cơ chế kết nối này có
//kiểu dùng code PHP thuần hoặc dùng OOP
// + PDO sẽ khó hiểu hơn về mặt cú pháp so với mySQLi
// + PDO là cơ chế kết nối thông dụng hiện nay trong các
//framework cũng như CMS

//DEMO kết nối CSDL MySQL sử dụng cơ chế PDO
#1 - Tạo CSDL pdo_demo
//CREATE DATABASE IF NOT EXISTS pdo_demo
//CHARACTER SET utf8 COLLATE utf8_general_ci;
#Tạo bảng categories có 3 trường: id, name, amount
//CREATE TABLE categories(
//    id INT(11) AUTO_INCREMENT,
//name VARCHAR(255),
//amount INT(11),
//PRIMARY KEY (id)
//);

//1 - Khởi tạo kết nối
//khai báo các hằng số chứa thông tin kết nối
//DSN:Data Source Name - định nghĩa ra chuỗi kết nối
//<tên-drive-csdl>:host=<tên-host-chứa-CSDL>;dbname=<tên-db>
//;charset=utf8
const DB_DSN = 'mysql:host=localhost;
dbname=pdo_demo;charset=utf8;port=3306';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
//việc khởi tạo kết nối sử dụng PDO bằng cách khởi tạo 1
//đối tượng từ 1 class = PDO
//class PDO cần nhận vào các giá trị khi khởi tạo đối tương,
//do bên trong class PDO này đã sử dụng phương thức khởi
//tạo có tham số
$connection =
    new PDO(DB_DSN, DB_USERNAME,
        DB_PASSWORD);
if (!$connection) {
    die("Lỗi kết nối");
}
echo "<h2>Kết nối thành công</h2>";

//3 - Truy vấn INSERT với PDO thêm dữ liệu vào bảng
//categories: id, name, amount
// + Tạo câu truy vấn:
//Trong PDO có cơ chế bind Param vào câu truy vấn, việc
//gắn tham số vào câu truy vấn giúp nhập giá trị đỡ bị
//phức tạp so với mySQLi, giúp chống lỗi
// bảo mật SQLInjection
//NGoài cách bind param, vẫn có thể truyền thẳng giá trị
//vào câu truy vấn như đã làm với mySQLi
$sql_insert = "INSERT INTO categories(`name`, `amount`)
VALUES (:name, :amount)";
// + Tạo đối tượng truy vấn, sử dụng phương thức prepare
//trên đối tương kết nối
$obj_insert = $connection->prepare($sql_insert);
// + Tạo 1 mảng kết hợp để truyền các giá trị thật cho
//các tham số đã khai báo trong câu truy vấn. Số phần tử
//của mảng này chính bằng số lượng các tham số trong câu
//truy vấn
$arr_insert = [
//    key của phần tử chính là tên tham số trong câu truy vấn
    ':name' => 'Thể thao',
    ':amount' => 5
];
// + Thưc thi truy vấn dựa trên đối tượng truy vấn trả
//vê từ phương thức prepare, phương thức execute trả
///về kiểu boolean
$is_insert = $obj_insert->execute($arr_insert);
//var_dump($is_insert);

//4 - Truy vấn câp nhật với PDO
//cập nhật amount = 10, name=new name với bản ghi có id = 1
// + Tạo câu truy vấn cập nhật, có thể sử dụng gắn tham số
//hoặc là ko
//Với các giá trị mà biết chắc chắn là số thì có thể ko cần
//gắn tham số, còn với chuỗi thì cần truyền dưới dạng tham
//số để tránh đc lỗi bảo mật SQLInjection
$sql_update = "UPDATE categories 
SET `amount` = :amount, `name` = :name WHERE id = :id";
// + Tạo đối tượng truy vấn, sử dụng phương thức prepare
//trên đối tượng kết nối
$obj_update = $connection->prepare($sql_update);
// + Tạo mảng kết hợp để truyền giá trị thật cho các tham
//số trong câu truy vấn
$arr_update = [
    ':amount' => 10,
    ':name' => 'New name',
    ':id11dsadas' => 1
];
// + Thực thi truy vấn dựa trên đối tượng truy vấn
$is_update = $obj_update->execute($arr_update);
//tham khảo thêm phương thức dùng để debug các tham số
//trong câu truy vấn nếu có
//phương thức này luôn chạy sau khi execute()
$obj_update->debugDumpParams();
var_dump($is_update);

//5 - Truy vấn xóa sử dụng PDO
//Xóa tất cả các bản ghi mà id > 8
// + Tạo câu truy vấn xóa, do biết chắc chắn giá trji
//của trường id là số nên ko cần sử dụng tham số trong
//câu truy vấn
$sql_delete = "DELETE FROM categories WHERE id > 8";
//+ Tạo đối tượng truy vấn
$obj_delete = $connection->prepare($sql_delete);
// + Do câu truy vấn ko có tham số nào nên bỏ qua bước
//tạo mảng để truyền giá trị thật
// + Thực thi truy vấn dựa trên đối tượng truy vấn ở trên,
//do câu truy vấn ko có tham số nên ko truyền giá trị nào
//cho phương thức execute
$is_delete = $obj_delete->execute();
var_dump($is_delete);
//NOTE: với truy vấn INSERT, UPDATE, DELETE thì kết quả
//trả về của phương thức execute luôn là boolean

//6 - Truy vấn select với PDO: lấy nhiều bản ghi cùng 1 lúc,
//select chỉ lấy 1 bản ghi duy nhất
// * Truy vấn SELECT lấy nhiều bản ghi
// + Tạo câu truy vấn, do câu truy vấn ko có tham số nào
//bỏ qua đc bước tạo mảng
$sql_select_all =
    "SELECT * FROM categories ORDER BY id DESC";
// + Tạo đối tượng truy vấn
$obj_select_all = $connection->prepare($sql_select_all);
// + Thực thi truy vấn, tuy nhiên với truy vấn SELECT, thì
//ko sử dụng kết quả trả về của phương thức execute()
$obj_select_all->execute();
//+ Thêm 1 bước nữa sau khi execute để trả về dữ liệu mong
//muốn dưới dạng mảng kết hợp
//gọi hằng trong class theo cú pháp sau, giống cú pháp
//gọi thuộc tính/phương thức static:
//<tên-class>::<tên-hằng>
$categories = $obj_select_all
    ->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>";
//print_r($categories);
//echo "</pre>";
// * Truy vấn chỉ lấy 1 bản ghi duy nhất
// + Tạo câu truy vấn lấy thông tin bản ghi có id = 1
$sql_select_one = "SELECT * FROM categories WHERE id = 1";
// + Tạo đối tượng truy vấn
$obj_select_one = $connection->prepare($sql_select_one);
// + Thực thi câu truy vấn dựa trên đối tượng truy vấn
$obj_select_one->execute();
// + lấy dữ liệu trả về dưới dạng mảng kết hợp
//phương thức fetch trả về bản ghi đầu tiên mà nó tìm đc
$category = $obj_select_one
    ->fetch(PDO::FETCH_ASSOC);
echo "<pre>";
print_r($category);
echo "</pre>";
?>