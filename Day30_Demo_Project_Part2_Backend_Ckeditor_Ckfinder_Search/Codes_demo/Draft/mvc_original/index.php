<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//mvc_original/index.php
//Codes_demo/Draft/mvc_original
//Khung 1 cơ bản
// + Copy toàn bộ thư mục assets trong đường
//dẫn sau: mockup_html/backend/assets vào thư mục
//assets của mô hình MVC -> demo việc ghép layout
// + Copy file ockup_html/backend/index.html ->
//mvc_original/views/layouts/main.php
//url trong mô hình mvc hiện tại:
//index.php?controller=category&action=create


// + Lấy giá trị của tham số controller và action từ url
$controller = isset($_GET['controller']) ? $_GET['controller'] :
    'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
// + Biến đổi giá trị của controller để trở thành tên file
//controller tương ứng -> nhúng được file controller vào
//index.php?controller=category&action=create
// -> chuyển đổi biến $controller thành CategoryController
$controller = ucfirst($controller); //Category
$controller .= "Controller"; //CategoryController
$path_controller = "controllers/$controller.php";
//controllers/CategoryController.php
if (!file_exists($path_controller)) {
    die('Trang bạn tìm ko tồn tại');
}
require_once "$path_controller";
$object = new $controller();
if (!method_exists($object, $action)) {
    die("Không tồn tại phương thức 
    $action trong class $controller");
}
//index.php?controller=category&action=create
$object->$action();
?>