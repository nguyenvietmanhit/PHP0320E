<?php
//chua_bai_tap_ngay_16.php
//1.	Viết hàm tổng – tích – hiệu - thương của các
// phần tử trong mảng số nguyên sau, sử dụng hàm trong PHP:
//$arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
//•	Kết quả hiển thị được hiển thị như sau:
//Tổng các phần tử  = 2 + 5 + 6 + 9 + 2 + 5 + 6 + 12 + 5 = <giá-trị>
//Tích các phần tử  = 2 * 5 * 6 * 9 * 2 * 5 * 6 * 12 * 5 = <giá-trị>
//Hiệu các phần tử  = 2 - 5 - 6 - 9 - 2 - 5 - 6 - 12 - 5 = <giá-trị>
//Thương các phần tử  = 2 / 5 / 6 / 9 / 2 / 5 / 6 / 12 / 5 = <giá-trị>
function bt1($arr) {
    $str = '';
    //lặp qua từng phần tử của mảng để lấy giá trị
    //sử dụng foreach
    $sum = 0;
    $str_sum = "Tổng các phần tử = ";
    $sub = $arr[0];
    $str_sub = "Hiệu các phần tử = ";
    $multiple = 1;
    $str_multiple = "Tích các phần tử = ";
    $divide = $arr[0];
    $str_divide = "Thương các phần tử = ";
    foreach($arr AS $key => $value) {
        //thực hiện các phép tính và gán kết quả tương ứng
//        cho biến $str ban đầu
        //tính tổng
        $sum += $value;
        //thực hiện nối chuỗi vào biến $str_sum
        $str_sum .= "$value + ";
        //xử lý phép trừ, bỏ qua phần tử đầu tiên
        //vì biến $sub ban đầu đã đc gán giá trị = phần tử
        //đầu tiên r
        if ($key > 0) {
            $sub -= $value;
        }
        $str_sub .= "$value - ";

        //xử lý phép nhân
        $multiple *= $value;
        $str_multiple .= "$value * ";
        //xử lý phép chia
        if ($key > 0) {
            $divide /= $value;
        }
        $str_divide .= "$value / ";
    }

    //các chuỗi hiện tại đang bị thừa ký tự + - * / ở cuối
    //nên sẽ dùng hàm substr để cắt bỏ các ký tự này
    //hàm substr nếu truyền giá trị âm cho tham số thứ 3 (lengh)
    //thì sẽ cắt từ cuối chuỗi
    $str_sum = substr($str_sum, 0, -2);
    $str_sub = substr($str_sub, 0, -2);
    $str_multiple = substr($str_multiple, 0, -2);
    $str_divide = substr($str_divide, 0, -2);

    //nối kết quả của phép cộng vào biến $str ban đầu
    $str .= $str_sum . " = $sum <br />";
    //nối kết quả của phép trừ vào biến $str ban đầu
    $str .= $str_sub . " = $sub <br />";
    //nối kết quả phép nhân vào biến $str ban đầu
    $str .= $str_multiple . " = $multiple <br />";
    //nối kết quả phép chia vào biến $str ban đầu
    $str .= $str_divide . " = $divide";
    return $str;
}

//khai báo mảng để gọi hàm
$arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
//gọi hàm và truyền giá trị cho tham số
$str = bt1($arrs);
echo $str;
