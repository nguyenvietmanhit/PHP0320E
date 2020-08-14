<?php
/**
 * controllers/Controller.php
 * + Đóng vai trò là class cha để tất cả các controller
 * còn lại đều kế thừa từ class class này
 * + Trong class cha này sẽ khai báo các thuộc tính,
 * phương thức dùng chung cho class con
 *  *
 */
class Controller {
    //khai báo thuộc tính chứa nội dung view động
    public $content;
    //khai báo thuộc tính chứa thông tin lỗi
    public $error;
    //có thể khai báo thêm các thuộc tính về seo

    //phương thức lấy nội dung động dựa vào đường dẫn tới view
    public function render($view_path, $variables = []) {
        //giải nén biến nếu có
        extract($variables);
        //Bắt đầu quy trình đọc nội dung file
        //+ Tạo vùng đệm để chứa nội dung file
        ob_start();
        // + Nhúng file view vào
        require_once "$view_path";
        // + Kết thúc việc lấy nội dung file từ vùng đệm ban đầu
        return ob_get_clean();
    }
}