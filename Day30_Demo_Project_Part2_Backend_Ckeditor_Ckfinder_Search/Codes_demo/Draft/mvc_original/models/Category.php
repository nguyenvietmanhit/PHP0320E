<?php
require_once 'models/Model.php';
//models/Category.php
class Category extends Model{

    //demo phương thức lấy ds category
    public function getAll() {
        // + Tạo câu truy vấn
        $sql_select_all = "SELECT * FROM categories";
        // + Tạo đối tượng truy vấn, prepare
        $obj_select_all =
            $this->connection->prepare($sql_select_all);
        // + Thưc thị đối tượng truy vấn
        $obj_select_all->execute();
        $categories =
            $obj_select_all->fetchAll(PDO::FETCH_ASSOC);
        return $categories;
    }

}