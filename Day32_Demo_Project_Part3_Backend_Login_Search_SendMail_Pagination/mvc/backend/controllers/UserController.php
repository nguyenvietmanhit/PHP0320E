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
//                    var_dump($is_register);
                    if ($is_register) {
                        $_SESSION['success'] = 'Đăng ký thành công';
                        //chuyển hướng sang trang login
                        header('Location: index.php?controller=user&action=login');
                        exit();
                    } else {
                        $this->error = "Không thể đăng ký";
                    }
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

    //Phương thức xử lý login
    public function login() {
        //XỬ LÝ SUBMIT FORM
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            //Xử lý validate, ko đc để trống 2 trường
            if (empty($username) || empty($password)) {
                $this->error = 'Phải nhập cả 2 trường';
            }
            //Xử lý đăng nhập chỉ khi ko có lỗi nào xảy ra
            if (empty($this->error)) {
                $user_model = new User();
                //cần mã hóa password đúng theo cơ chế đã lưu
                //password này trc khi kiểm tra trong CSDL
                $password = md5($password);
                // Do cần hiển thị thông tin user sau khi login
                //thành công, nên kêt quả trả về xử lý hàm
                //getUser là 1 mảng, gán mảng đó cho session
                $user = $user_model
                    ->getUser($username, $password);
                //nếu đăng nhập thành công
                if (!empty($user)) {
                    //Tạo session gán bằng mảng user trên
                    $_SESSION['user'] = $user;
                    $_SESSION['success'] = 'Đăng nhập thành công';
                    header('Location: index.php?controller=product');
                    exit();
                } else {
                    $this->error = 'Sai tài khoản hoặc mật khẩu';
                }
//                echo "<pre>";
//                print_r($user);
//                echo "</pre>";
//                die;
            }
        }

        $this->title_page = 'Trang đăng nhập';

        // + Lấy nội dung view login tương ứng,
        //tạo view: views/users/login.php
        $this->content = $this->render('views/users/login.php');
        // + Gọi layout để hiển thị
        require_once 'views/layouts/main_login.php';
    }
}