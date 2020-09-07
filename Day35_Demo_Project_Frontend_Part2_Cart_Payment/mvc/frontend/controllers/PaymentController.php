<?php
require_once 'controllers/Controller.php';

class PaymentController extends Controller {
  public function index() {
    //Lấy nội dung view payment
    $this->content =
        $this->render('views/payments/index.php');
    //Gọi layout để hiển thị nội dung view vừa lấy đc
    require_once 'views/layouts/main.php';
  }
}