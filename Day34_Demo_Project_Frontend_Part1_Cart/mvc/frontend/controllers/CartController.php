<?php
//frontend/controllers/CartController.php
require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class CartController extends Controller {
    //Phương thức nhận request từ ajax để xử lý thêm vào
    // giỏ hàng
    public function add() {
        //Debug mảng dựa vào method truyền lên từ ajax
//        echo "<pre>";
//        print_r($_GET);
//        echo "</pre>";
        //+ Đã nhận đc product_id từ ajax truyền lên
        // + Lấy thông tin sản phẩm tương ứng với id truyền
//        lên
        $product_id = $_GET['product_id'];
        $product_model = new Product();
        $product = $product_model->getById($product_id);
//        echo "<pre>";
//        print_r($product);
//        echo "</pre>";
        // + Tạo 1 mảng để chứa các thông tin cần thiết của
        //giỏ hàng là name, price, avatar
        $cart = [
            'name' => $product['title'],
            'price' => $product['price'],
            'avatar' => $product['avatar'],
            //mặc định số lượng ban đầu = 1
            'quantity' => 1
        ];
        // + Xây dựng giỏ hàng sử dụng SESSION, với key=cart
        // - Nếu giỏ hàng chưa từng tồn tại trước đó, khi click
//        Thêm vào giỏ -> thêm mới 1 giỏ hàng
        if (!isset($_SESSION['cart'])) {
            //Thêm phần tử vào giỏ hàng luôn có format:
            //product_id => thông-tin-giỏ-hàng-tương-ứng
            $_SESSION['cart'][$product_id] = $cart;
        } else {
            // - Nếu giỏ hàng đã tồn tại rồi thì sẽ tồn tại 2
            // trường hơp, sử dụng ham array_key_exists để
            //kiểm tra xem key có tồn tại trong 1 mảng hay ko

            // + Thêm sản phẩm chưa từng tồn tại trong giỏ:
            //xử lý tương tự trường hợp thêm mới sp vào giỏ
            if (!array_key_exists($product_id, $_SESSION['cart'])) {
                $_SESSION['cart'][$product_id] = $cart;
            } else {
                $_SESSION['cart'][$product_id]['quantity']++;
                // + Thêm sản phẩm đã tồn tại trong giỏ rồi: ko
                //thêm mới sản phẩm mà update lại số lượng sản phẩm
                //dang có sẵn, bằng cách cộng thêm 1
            }
        }
//        unset($_SESSION['cart']);
//        session_destroy();
//        echo "<pre>";
//        print_r($_SESSION['cart']);
//        echo "</pre>";






        $_SESSION['cart'] = [
            3 => [
                'name' => 'Samsung S9',
                'price' => 3000,
                'avatar' => 'samsung.jpg',
                'quantity' => 5
            ],
            5 => [
                'name' => 'Iphone',
                'price' => 4000,
                'avatar' => 'iphone.jpg',
                'quantity' => 2
            ]
        ];
    }
}