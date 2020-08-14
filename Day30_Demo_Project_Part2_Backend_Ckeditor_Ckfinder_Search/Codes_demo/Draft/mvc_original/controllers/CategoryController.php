<?php
require_once 'controllers/Controller.php';
//Tạo class phải trùng với tên file
//áp dụng tính kế thừa của OOP để có thể sử dụng lại các
//thuộc tính/phương thức của class cha mà phạm vi truy cập là:
//protected hoặc public
class CategoryController extends Controller {
    public function create() {
        // + LẤy nội dung view tương ứng
        $this->content =
        $this->render('views/categories/create.php');
        // + Gọi layout để hiển thị nội dung view vừa lấy
        require_once 'views/layouts/main.php';

    }
}