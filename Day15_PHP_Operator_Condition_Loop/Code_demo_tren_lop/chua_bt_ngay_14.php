<?php
//bài tập 3 ngày 14
$variable1 = '123abc';
$a = (int) $variable1; //123 - dựa vào ký tự đầu tiên của chuỗi
//nếu là số thì trả về, còn nếu ký tự đầu tiên ko phải số -> 0
$b= (float) $variable1; //123
$c = (boolean) $variable1; //true // nếu chuỗi khác rỗng thì
//ép kiểu sang boolean -> true và ngược lại

$variable2 = NULL;
//-> ép sang int -> 0
//float -> 0
//string -> ''
$variable3 = '';
//ép sang int -> 0
//float -> 0
//boolean -> false
if ($variable3) {
    //
}

$variable5 = 'null';
//int -> 0
//float -> 0
//boolean -> true