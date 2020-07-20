<?php
//demo_ajax/create.php
//Mục đích: thêm dữ liệu vào CSDL mà ko cần dùng form
// 1 - Khái niệm Ajax
// + viết tắt Asynchronous Javascript and XML, nó là 1 kỹ thuật
//để tạo ra các trang web ko đồng bộ, nghĩa là chức năng sử dụng
//Ajax có thể chạy trước các chức năng khác
// + Bình thường với 1 web PHP thuần thì sẽ theo cơ chế đồng bộ:
//chức năng nào gọi trc sẽ chạy trc, và các chức năng sau phải chờ
//chức năng trc đó chạy xong thì nó mới đc chạy
// + Ajax có cơ chế thao tác với dữ liệu mà ko hề tải lại trang,
//có trải nghiệm tốt hơn với người dùng so với PHP thuần. CÁc
//framework JS như : Node, Angular, React đều sử dụng cơ chế
//tương tự Ajax
// + Thay vì dụng Javascript thuần để gọi ajax, thì sẽ sử dụng
//thư viện jQuery thay thế để cho đơn giản

//DEMO ỨNG DỤNG THÊM DỮ LIỆU VÀO BẢNG CATEGORIES CỦA CSDL DAY22
//SỬ DỤNG CƠ CHẾ AJAX (KO CẦN FORM)
//Copy file jquery-<version>.min.js vào cấu trúc thư mục hiện
//tại
//demo_ajax/js/jquery...min.js: file jquery
//            /main.js: file custom code js
// + Bảng categories đang có trường sau:id, name, description
//avatar, created_at
?>
<!--Do sử dụng ajax nên nhúng file jquery vào để thao tác
cho tiện-->
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<!--Nhungs file custom js-->
<script type="text/javascript" src="js/main.js"></script>
Nhập tên:
<input type="text" id="name" name="name" value="" />
<br />
Nhập mô tả:
<textarea id="description"></textarea>
<br />
<button id="save">Lưu</button>




