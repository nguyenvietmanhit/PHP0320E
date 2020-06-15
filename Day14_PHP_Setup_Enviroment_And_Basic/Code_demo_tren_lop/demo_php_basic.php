<!--demo_php_basic.php-->
<!--
Đuôi file luôn là .php
File .php có thể nhúng đc tất cả các ngôn ngữ phía frontend
mà các bạn đã học
Để file .php chạy đc, BẮT BUỘC phải để trong đường dẫn sau:
C:/xampp/htdocs
C:/xampp/htdocs/demo_php_basic.php
 -->
<!--khai báo vùng làm việc với PHP-->
<?php
//code PHP của bạn
//hàm echo hiển thị 1 đoạn text ra màn hình
//PHP giấu được mã nguồn (code), khác với html, css, js là
////ko thể giấu đc
echo '<b>Hello World</b>';
?>
<!--cú pháp khác để khai báo-->
<?
//code PHP của bạn, tuy nhiên cách khai báo này phải setting
//trong file php.ini của XAMPP, ko nên dùng
?>

<html>
    <head>
        <title>Demo PHP</title>
    </head>
    <body>
        <h1>Demo PHP</h1>
    </body>
</html>
<!--mở 1 vùng làm việc với PHP -->
<?php
//code php
echo '<h1>PHP căn bản: Biến - Hằng - Hàm</h1>';
//1 - Biến: là 1 nơi lưu trữ giá trị có thể thay đổi đc
//Cú pháp khai báo biến: bắt đầu bằng ký tự $
$name = 'Mạnh';
$age = 12;
$adress = 'Add1'; $adress2 = 'add2';
//Quy tắc đặt tên: giống hệt so với JS
$name; $Name; //là 2 biến khác nhau do PHP phân biệt hoa thường
//Các kiểu dữ liệu trong PHP
// - Integer: kiểu số nguyên, pham vi: -2 tỉ -> 2 tỉ
$number1 = 12;
$number2 = -123;
//hàm kiểm tra kiểu dữ liệu có phải kiểu int hay ko
$check1 = is_int($number1);
//hàm debug thông tin về biến
var_dump($check1); //true
// - Float/double: kiểu số thực, là các số có phần thập phân
$number1 = 1.23;
$number2 = -1.23;
$check1 = is_float($number1);
var_dump($check1); //true
// - String, kiểu chuỗi, thể hiện bởi ký tự nháy đơn hoặc nháy kép
$string1 = 'String 1';
$string2 = "String 2";
$string3 = "String '3'";
$check1 = is_string($string1);
var_dump($check1); //true
//với kiểu chuỗi, có thể hiển thị luôn giá trị của biến trong 1
//chuỗi mà sử dụng cặp nháy kép bao ngoài
$str = 'Mạnh';
echo "Hello, $str"; //Hello, Mạnh
echo 'Hello, $str'; //Hello, $str
//- Boolean - Kiểu đúng/sai, bao gồm 2 giá trị true và false,
//viết hoa thường thỏa mái
$bool1 = true;
$bool2 = false;
$bool3 = True;
$bool4 = FALSE;
$check1 = is_bool($bool1);
var_dump($check1); //true
// NULL - Kiểu null: kiểu này sẽ sinh ra khi bạn thao tác với
//1 biến chưa hề tồn tại, có 1 giá trị duy nhất = null, viết hoa
//thường thỏa mái
$null1 = NULL;
$null2 = null;
is_null($null1); //true
//- Array - Kiểu mảng, chứa nhiều giá trị tại 1 thời điểm
//cách 1: cú pháp này là từ phiên bản PHP 5.4 trở xuống
$arr1 = array(123, 'str', true, null);
//cách 2: từ phiên bản 5.4 đến hiện tại, cách hay dùng
$arr2 = [123, 'str', true, null];
//ko thể hiển thị thông tin của mảng (của các kiểu dữ liệu có cấu
//trúc) như 1 kiểu dữ liệu nguyên thủy(int,float,string,boolean)
//echo $arr2;
//sử dụng hàm var_dump hoặc print_r để hiển thị cấu trúc mảng
//hay dùng cú pháp sau để hiển thị cấu trúc mảng
echo "<pre>";
print_r($arr2);
echo "</pre>";
is_array($arr2); // true
//- Object: kiểu hướng đối tượng, tìm hiểu sau

//3 - Ép kiểu dữ liệu: dùng cú pháp là tên kiểu dữ liệu đặt
//phía trước biến muốn ép kiểu
$number = 11.2; //float
$number = (int) $number; //11 -> kiểu số nguyên int
$number = (string) $number;  //11 -> kiểu chuỗi

//4 - Hằng: cũng là 1 loại biến nhưng ko thể thay đổi đc giá trị
//sau khi đã gán cho nó
const PI = 3.14;
const NAME = 'Mạnh';
define('AGE', 15); //khai báo hằng AGE có giá trị = 15
//nên dùng từ khóa const để khai báo hằng
//khi học về OOP -> chỉ có thể sử dụng const để khai báo hằng
//trong class
//PI = 3;
//cố tính gán lại giá trị khác cho hằng sẽ báo lỗi
//Một số hằng được định nghĩa sẵn bởi PHP
//số dòng hiện tại trong code mà đang gọi tới hằng này
echo __LINE__; //115
echo "<br />";
//hiển thị đường dẫn vật lý/tuyệt đối tới file hiện tại đang gọi hằng
echo __FILE__; //
echo "<br />";
//hiển thị đường dẫn tuyệt đối/vật lý tới
// thư mục cha gần nhất chứa file hiện tại đang gọi hằng
echo __DIR__;
echo "<br />";

//4 - Hàm trong PHP: là 1 tập các dòng code để xử lý 1 chức năng gì đó
//hàm có tính sử dụng lại
//Phân loại hàm:
// - hàm có sẵn: var_dump, print_r, is_int ....
// - hàm tự định nghĩa: cú pháp khai báo giống hệt javascript
function display() {
    echo 'Hàm display';
}
//gọi hàm
display();//Hàm display
//1 số biến thể của hàm
// - Hàm có tham số
function showInfo($name, $age) {
    echo "NAme: $name, Age: $age";
}
//gọi hàm là lúc truyền giá trị thật cho các tham số
showInfo('MẠnh', 30); //Name: Manh, Tuổi: 30
showInfo('ABC', 123);
//- Hàm có tham số với các giá trị khởi tạo mặc định
function getName($name = 'Mạnh') {
    echo $name;
}
getName(); //Mạnh
getName('ABC'); //ABC

//- Hàm có giá trị trả về, sử dụng từ khóa return
//nên sử dụng return bên trong hàm
//tính tổng 2 số
function sum($number1, $number2) {
    $sum = $number1 + $number2;
//    echo 'Tổng 2 số = ' . $sum;
    return $sum;
    //từ khóa return làm cho hàm mang 1 giá trị nào đó, và kết thúc hàm
    echo 'Có được chạy ko?';
}
$sum = sum(2, 3);
echo $sum; //5
echo "tổng 2 số = $sum";

//6 - Truyền giá trị cho tham số của hàm theo
// kiểu tham trị hoặc tham chiếu
$number1 = 5;
echo "Biến number1 ban đầu = $number1"; //5
function changeNumber($num) {
    //gán lại giá trị cho biến num
    $num = 0;
    echo "Biến number1 bên trong hàm đang có giá trị = $num"; // 0
//    return $num;
}
changeNumber($number1);
echo "Biến number1 sau khi gọi hàm = $number1"; //5
//đây là cách truyền theo kiểu tham trị,
// khi gọi hàm thì biến number1 sẽ tạo 1 bản sao
//của chính nó, hàm của bạn đang thao tác với bản sao của biến number1
//để thay đổi đc giá trị của bản gốc, thì phải truyền theo kiểu
//tham chiếu
$number2 = 4;
echo "Biến number2 ban đầu = $number2"; //4
//truyền theo kiểu tham chiếu sẽ có ký tự & trước tham số của hàm
function changeNumber2(&$num) {
    $num = 0;
    echo "Biến number2 bên trong hàm có giá trị = $num"; //0
}
changeNumber2($number2);
echo "Biến number2 sau khi gọi hàm = $number2"; //0
//truyền tham chiếu tương đương với việc thao tác với chính bản gốc của
//biến đó

//Giới thiệu 1 số hàm liên quan đến nhúng file
//4 hàm: require, include, require_once, include_once
//nhúng file theo đường dẫn tương đối
//hàm require, khi nhúng 1 file ko tồn tại, thì code
//phía sau nó sẽ ko chạy đc
//require 'test_file32132132.php';

//include: khi file ko tồn tại, nó vẫn chạy đc code bên dưới
//include 'test_filedsadsasadsadsa.php';
//require 'test_file.php';
//require 'test_file.php';
//require 'test_file.php';
//require 'test_file.php';

//require onece, sẽ kiểm tra trc đó đã từng nhúng file đó hay chưa
//nếu chưa nhúng thì sẽ nhúng, nếu nhúng rồi thì ko nhúng
require_once 'test_file.php';
require_once 'test_file.php';
require_once 'test_file.php';
require_once 'test_file.php';
require_once 'test_file.php';

//nên sử dụng hàm require_once cho việc nhúng file, để đảm bảo file
//đc nhúng duy nhất 1 lần, và nếu nhúng file ko tồn tại thì sẽ ko chạy
//code phía sau


echo '<br />Nội dung cuối cùng của buổi học';

?>
<!--C:\Windows\System32\drivers\etc\hosts-->
