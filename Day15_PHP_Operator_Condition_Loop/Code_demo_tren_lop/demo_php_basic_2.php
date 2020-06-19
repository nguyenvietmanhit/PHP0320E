<?php
//demo_php_basic.php
//1 - TOÁN TỬ
//Giống hệt Javascript
$number1 = 5;
$number2 = 4;
echo $number1 + $number2; //9
echo $number1 - $number2; //1
echo $number1 * $number2; //20
echo $number1 / $number2;//1.25
echo $number1 % $number2; //1
$number1++;
echo $number1; //6
$number2--;
echo $number2; //3
$number = 4;
$sum = $number-- + (2 * --$number) - --$number;
//7       4      +  (2 *   2 )     -    1
$number = -1;
$sum = $number++ - --$number * --$number;
       // -1     -    -1    *    -2
//-3 0 1 2 -1 -> -3
//2 - TOÁn TỬ SO SÁNH
//giống hệt JAvascript
$number1 = 5;
$number2 = 4;
echo $number1 == $number2; //false
echo $number1 > $number2; //true
echo $number1 >= $number2; //true
echo $number1 < $number2; //false
echo $number1 <= $number2; //false
echo $number1 != $number2; //true
//3 - TOÁN TỬ LOGIC
//Giống hệt Javascript
$number1 = 5;
$number2 = 4;
echo ($number1 > $number2) && $number1 != 0; //true
echo ($number != $number2) || $number1 < 0; //true
echo !($number1 != 0); //false
//4 - TOÁN TỬ GÁN
$number = 1; //phép gán
$number += 2; //$number = $number + 2; //3
$number -= 1; //$number = $number - 1; //2
$number *= 2; //4
$number /= 1; //4
$number %= 2; //0
//5 - TOÁN TỬ ĐIỀU KIỆN: ?   :
//Dùng thay thế cho câu lệnh if...else
$number = 5;
if ($number > 0) {
    echo  'Number > 0';
} else {
    echo 'Number <= 0';
}
echo $number > 0 ? 'Number > 0' : 'Number <= 0';

//THỰC HÀNH
$x = 5;
$sum = $x++ * ++$x + 2 * --$x % 2;
//         5  *   7  + 2 *   6  % 2
//35 29
$x = 5;
$sum = $x * $x - --$x * 2 + $x++ - $x * ++$x;
//     =  5 *  5 -   4  * 2 +   4  -  5 * 6; //-9
//-8 -20
//THỰC HÀNH 2
$number1 = 10;
$number2 = 7;
echo "<span style='color: red'>";
echo "$number1 + $number2 = " . ($number1 + $number2);
echo "<br />";
echo "$number1 - $number2 = " . ($number1 - $number2);
echo "<br />";
echo "$number1 * $number2 = " . ($number1 * $number2);
echo "<br />";
echo "$number1 / $number2 = " . ($number1 / $number2);
echo "<br />";
echo "$number1 % $number2 = " . ($number1 % $number2);
echo "<br />";
echo "</span>";

//Thực hành 3
$number = 8;
echo "<span style='color: red'>";
echo "Giá trị hiện tại là $number";
echo "<br />";
$number += 2;
echo "Cộng thêm 2. Giá trị hiện tại là: $number";
echo '</span>';

//2 - Câu lệnh điều kiện
//If, If..else, if..elseif..else, switch...case
//If: chỉ dùng cho 1 trường hợp duy nhất
$number = 5;
if ($number > 0) {
    echo 'Biến number > 0';
}
//If...else: dùng cho 2 trường hợp
$number = 4;
if ($number % 2 != 0) {
    echo 'Là số lẻ';
} else {
    echo 'Là số chẵn';
}
//có thể sử dụng toán tử điều kiện ? : để thay thế cho if..else
echo $number % 2 != 0 ? 'LÀ số lẻ' : 'Là số chẵn';
//If...elseif..else: >=3 trường hợp
$number = 5;
if ($number > 10) {
    echo 'Number > 10';
} else if ($number > 8) {
    echo 'Number > 8 và number <= 10';
} else if ($number > 6.5) {
    echo 'Number > 6.5 và number <= 8';
} else {
    echo 'Number <= 6.5';
}
//Biểu thức switch case:
//dùng thay thế cho if...elseif, tuy nhiên chỉ dùng đc khi biểu
//thức là so sánh bằng ==
$day = 3;
switch ($day) {
    case 2: echo 'Thứ 2';break;
    case 3: echo 'Thứ 3';break;
    case 6: echo 'Thứ 6';break;
    default: echo 'Ko phải thứ 2, 3, 6';
}
//Cú pháp viết tắt của câu lệnh điều kiện khi viết chung với HTML
$number = 1;
//kiểm tra nếu như $number > 0 thì sẽ hiển thị ra 1 cấu trúc
//bảng HTML có 5 hàng, mỗi hàng 2 cột
if ($number > 0) {
    echo "<table >
<tr>
    <th>Cột 1</th>
    <th>Cột 2</th>
</tr>
<tr>
    <td>Data 1</td>
    <td>Data 1</td>
</tr>
</table>";
}
//ko nên viết lồng HTML bằng PHP như trên khi cấu trúc HTML phức tạp

?>

<!--Cú pháp viết tắt của if-->
<?php if ($number > 0): ?>
    <table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Header 1</th>
        <th>Header 2</th>
    </tr>
    <tr>
        <td>Data 1</td>
        <td>Data 2</td>
    </tr>
    <tr>
        <td>Data 1</td>
        <td>Data 2</td>
    </tr>
</table>
<?php endif; ?>
<!--Cú pháp viết tắt của if...else-->
<?php if ($number > 0): ?>
    <span>Number > 0</span>
<?php else: ?>
    <span>Number <= 0</span>
<?php endif; ?>
<!--Cú pháp viết tắt của if...elseif...else-->
<?php if ($number > 0): ?>
Number > 0
<?php elseif ($number == 0): ?>
Number = 0
<?php elseif ($number <= -1 && $number >= -2): ?>
-2 <= Number <= -1
<?php else: ?>
Number < -2
<?php endif; ?>

<!--3 -Vòng lặp-->
<!--for, while, do...while-->
<!--For: vòng lặp xác định trước số lần lặp-->
<?php
for($i = 1; $i <= 10; $i++) {
    echo $i;
}
//12345678910
//While - vòng lặp ko xác định trc số lán lặp
$j = 1;
while($j <= 10) {
    echo $j;
    $j++;
}
//12345678910
//do...while - chỉ khác while ở 1 điểm duy nhất: luôn chạy code
//ít nhất 1 lần cho dù điều kiện bị sai ngay từ đầu
$j = 1;
do {
    echo $j;
    $j++;
} while($j < 10);
//Với PHP thì ít khi sử dụng while, do...while

//4 - Từ khóa continue - break
//Break: thoát hẳn vòng lặp
for ($i = 3; $i <= 9; $i += 2) {
   echo $i;
   if ($i <= 5) {
       break;
   }


}
//3
//continue: bỏ qua lần lặp hiện tại, nhảy tới lần lặp kế tiếp
for ($i = 2; $i <= 10; $i++) {
    if ($i >= 5) {
        break;
    }
    if ($i % 2 == 0) {
        continue;
    }
    echo $i;
}
//3

//Demo bài tập 4
function bai4($n) {
    //theo như kết quả mong muốn của bài toán
    //xác định kiểu dữ liệu trả về là 1 string
    $string = '';
    for ($i = 1; $i <= $n; $i++) {
        //chỉ nối thêm ký tự - khi $i < $n
        if ($i < $n) {
            $string .= "$i - ";
        } else {
            $string .= "$i";
        }
    }
    return $string;
    //ko chạy code bên dưới return
}
$str = bai4(50);
echo $str;

//Cách comment hàm
/**
 * Giải bài 7
 * @param $n int Số n truyền vào
 * @return string Kết quả trả về là 1 string
 */
function bai7($n) {
   $string = '';
   for ($row = 1; $row <= $n; $row++) {
       for ($col = 1; $col <= $row; $col++) {
           $string .= " * ";
       }
       $string .= "<br />";
   }
   return $string;
}
$str = bai7(5);
echo $str;

//5 - Một số hàm thao tác với string có sẵn của PHP
//Nối chuỗi .
//Đếm số từ xuất hiện trong 1 chuỗi: Manh is nvmanh
$count = str_word_count('Manh is nvmanh');
echo $count; //4
//Chuyển chuỗi thành chữ hoa
echo strtoupper('nvmanh'); //NVMANH
//Chuyển thành chữ thường
echo strtolower('Nvmanh Is Abc'); //nvmanh is abc
//Chuyển ký tự đầu tiên thành chữ hoa
echo ucfirst('abcdef'); //Abcdef
//Cắt khoảng trắng đầu cuối của chuỗi
echo trim("    abc     ");//abc
//cắt chuỗi
//lưu ý là vị trí của từng ký tự trong chuỗi bắt đầu = 0
$string = 'Hello World';
echo substr($string, 1); //ello World
echo substr($string, 6); //World
echo substr($string, 1, 3); //ell
//Tách chuỗi $string từ ký tự nào đó
echo strstr('nguyenvietmanhit@gmail.com', '@');
//@gmail.com
//Trả về vị trí xuất hiện đầu tiên của chuỗi muốn kiểm tra: strpos
$string = 'nvmanh is abc';
$pos = strpos($string, 'abc'); //10
var_dump($pos);
// Đảo ngược chuỗi: strrev
var_dump(strrev('abcdef')); //fedcba
//Hàm so sánh chuỗi: strcmp, so sánh 2 chuỗi phân biệt hoa thường
var_dump(strcmp('abc', 'abc')); //0

//Một số hàm có sẵn iên quan đến Số
//Hàm kiểm tra xem có phải số hay ko: is_numeric
echo is_numeric('abc'); //false
echo is_numeric(123); //true
//Kiểm tra phải số nguyên hay ko: is_int
is_int(123);//true
is_int(1.23); //false
//Kiểm tra phải số thực hay ko: is_float
is_float(123);//false
is_float(1.23); //true
//Làm tròn phần thập phân: round
echo round(14.5); //15
echo round(1.234567, 2); //1.23
//Làm tròn lên số nguyên lớn nhất so với giá trị hiện tại: ceil
echo ceil(1.37); //2
echo ceil(-1.67); //-1
// Làm tròn xuống, ngược lại với hàm ceil: floor
echo floor(1.37);  //1
echo floor(-1.67);  //-2
//Tìm giá trị lớn nhất nhỏ nhất: max, min
echo max(1, 2, 3, 4); //4
echo min(1, 2, 3, 4); //1
//Hàm format giá tiền: number_format
//100,000
echo number_format(100000); //100,000
echo number_format
(100000, 0, '.', '.');
//100.000


?>


