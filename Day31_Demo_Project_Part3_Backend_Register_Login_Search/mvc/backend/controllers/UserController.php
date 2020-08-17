<?php
require_once 'controllers/Controller.php';
require_once 'models/User.php';
//controllers/UserController.php
//Dùng để control đối tượng users
//Kế thừa từ class Controller cha để có thể sử dụng luôn
//2 thuộc tính: error, content
//1 phương thức: render
class UserController extends Controller {
    //url: index.php?controller=user&action=register
    public function register() {
        // + Xử lý submit form khi user click Đăng ký
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if (isset($_POST['register'])) {
            //Gán biến trung gian
            $username = $_POST['username'];
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
            //Xử lý validate form:
            // + Tất cả các trường ko ddc để trống
            // + Mật khẩu phải trùng nhau
            if (empty($username) || empty($password) ||
            empty($confirm_password)) {
                $this->error = 'Ko đc để trống';
            } elseif ($password != $confirm_password) {
                $this->error = 'Mật khẩu chưa trùng nhau';
            }
            // nếu như ko có lỗi thì xử lý đăng ký user
            if (empty($this->error)) {
                // kiểm tra xem username đã tồn tại trong
//                bảng users chưa
                // Gọi model để xử lý, tạo model User
                $user_model = new User();
                $is_username_exists =
                    $user_model->isUsernameExists($username);
                //nếu username đã tồn tại sẽ báo lỗi
                if ($is_username_exists) {
                    $this->error = 'Username đã tồn tại';
                } else {
                    //đăng ký user
                    //cần lưu mật khẩu dưới dạng mã hóa
                    $password = md5($password);
                    $is_register =
                        $user_model->register($username, $password);
                    var_dump($is_register);
                }
            }
        }

        //set title cho chức năng đăng ký
        $this->title_page = 'Trang đăng ký user';
        // + Tạo views tương ứng theo cấu trúc sau:
        //views/users/
       //             /register.php
        // + Do giao diện trang đăng ký hoàn toàn khác so
        //với giao diện chính của backend, nên cần tạo 1 layout
        //khác: views/layouts/main_login.php

        //+ Lấy nội dung view
        $this->content =
            $this->render('views/users/register.php');
        // + Gọi layout để hiển thị nội dung view vừa lấy đc
        require_once 'views/layouts/main_login.php';
    }
}