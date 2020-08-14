<?php
require_once 'configs/Database.php';
//models/Model.php
//Đóng vai trò là 1 class cha, chứa thuộc tính
//kết nối để các class con kế thừa từ nó có
//thể sử dụng đc
class Model {
    //thuộc tính chứa thông tin kết nối CSDL theo PDO
    public $connection;

    //tận dụng phương thức khởi tạo của 1 class để khởi tạo
    //giá trị mặc định nào đó cho thuộc tính của class đó
    public function __construct() {
        $this->connection = $this->getConnection();
    }

    //phương thức kết nối CSDL theo PDO
    public function getConnection() {
        try {
            $connection =
new PDO(Database::DB_DSN, Database::DB_USERNAME,
    Database::DB_PASSWORD);
        } catch (Exception $e) {
            die('Lỗi kết nối: ' . $e->getMessage());
        }
        return $connection;
    }
}