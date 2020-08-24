<?php
require_once 'models/Model.php';
/**
 * models/User.php
 */
class User extends Model {
    //khai báo các thuộc tính cho model chính là
    //các trường của bảng tương ứng
    public $id;
    public $username;
    public $password;

    //kiểm tra username đã tồn tại trong bảng users hay chưa
    public function isUsernameExists($username) {
        // + Viết câu truy vấn
        $sql_select_one = "SELECT * FROM 
        users WHERE username=:username";
        // + tạo đối tượng truy vấn, prepare
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        // + Tạo mảng để gán giá trị thật cho tham số trong
        //câu truy vấn
        $arr_select = [
          ':username' => $username
        ];
        // + Thực thi đối tượng truy vấn, execute
        $obj_select_one->execute($arr_select);
        // + Lấy ra đối tượng user dưới dạng mảng,
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        //nếu tồn tại user thì sẽ trả về true
        if (!empty($user)) {
            return TRUE;
        }
        return FALSE;
    }

    //phương thức đăng ký user
    public function register($username, $password) {
        // + Tạo câu truy vấn dạng tham số
        $sql_insert = "INSERT INTO users(username, password)
        VALUES (:username, :password)";
        // + Tạo đối tượng truy vấn, prepare
        $obj_insert = $this->connection->prepare($sql_insert);
        // + Tạo mảng để gán dữ liệu thật cho tham số
        // câu truy vấn
        $arr_insert = [
          ':username' => $username,
          ':password' => $password
        ];
        // + Thực thi truy vấn, execute
        $is_insert = $obj_insert->execute($arr_insert);
        return $is_insert;
    }

    //phương thức lấy user theo username và password
    public function getUser($username, $password) {
        // + Tạo câu truy vấn
        $sql_select_one =
        "SELECT * FROM users 
        WHERE username=:username AND password=:password";
        //+ Tạo đối tượng truy vấn
        $obj_select_one =
            $this->connection->prepare($sql_select_one);
        // + Tạo mảng để truyền giá trị cho câu truy vấn
        $arr_select = [
          ':username' => $username,
          ':password' => $password
        ];
        // + Thực thi đối tượng truy vấn
        $obj_select_one->execute($arr_select);
        // + Lấy ra mảng user
        $user = $obj_select_one->fetch(PDO::FETCH_ASSOC);
        return $user;
    }
}