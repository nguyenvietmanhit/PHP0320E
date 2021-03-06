<!--
cac_buoc_chinh_dung_web_mvc.php
CÁC BƯỚC CHÍNH DỰNG 1 WEB MVC TỪ ĐẦU
1 - Chuẩn bị giao diện tĩnh (HTML) cho tất cả
các trang với project của bạn
+ Giao diện backend: phục vụ cho nhà quản trị, cho phép
CRUD các chức năng chính của trang, do chỉ hướng tới 1 nhóm
nhỏ người dùng nên giao diện backend sẽ ko quan trọng bằng
frontend, dùng Bootstrap là chính
+ Giao diện frontend: hướng tới user
2 -
- Phân tích giao diện trên để có đc CSDL: đi lần lượt
từng trang giao diện tĩnh để phân tích, xác định các bảng,
xác định các trường
- KHi xác định 1 bảng, cần check qua tất cả các giao diện
để tìm xem còn thông tin nào liên quan đến bảng đó ko
+ Bảng menus: bảng này là tùy ý dựng hay ko,
tạo ra menu động. Các trường có thể có của bảng này:
Thường bảng nào cũng sẽ có 4 trường sau:
id: khóa chính, INT
name: tên các menu con, VARCHAR(50)
url: link cho các menu con, VARCHAR(255)
parent_id: id cha của menu con hiện tại, INT(11)
status: trạng thái ẩn/hiện, TINYINT
created_at: TIMESTAMP, default CURRENT_TIMESTAMP
updated_at: DATETIME
+ Bảng products: chứa các thông tin về sản phẩm, tên bảng
thường sẽ đặt ở dạng số nhiều,
    id: khóa chính, AUTO_INCREMENT
    category_id: INT(11) id của bảng danh mục tương ứng, thể hiện
cho mỗi quan hệ: 1 sản phẩm sẽ thuộc về 1 danh mục nào đó,
tên khóa ngoại đặt theo format sau:
<tên-bảng-liên-kết-ở-dạng-số-ít>_id
    avatar: lưu tên file ảnh, VARCHAR(100)
    title: tên sp, VARCHAR(100)
    price: giá sp, INT(10)
    content: chi tiết của sản phẩm, TEXT
    amount: số lượng sp trong kho, trường này sẽ ko thể
    hiện ở giao diện, do tư duy của bạn INT(4)
    summary: mô tả ngắn cho sản phẩm, VARCHAR(255)
    seo_title: seo cho tiêu đề của sản phẩm, VARCHAR(255)
    seo_description: seo cho phần mô tả nội dung của bạn
    VARCHAR(255)
    seo_keywords: seo các từ khóa để tìm kiếm ra
    sản phẩm của bạn VARCHAR(255)
    status: trạng thái, TINYINT: 0 - ẩn, 1 - hiển thị
    created_at
    updated_at
+ news:bảng lưu các thông tin liên quan đến tin tức
    id
    category_id: liên kết tới bảng catgories, 1 tin tức
thuộc về 1 danh mục nào
    avatar: lưu tên file ảnh, VARCHAR(150)
    title: tên tin tức, VARCHAR(150)
    summary: mô tả ngắn cho tin tức, TEXT
    content: nội dung chi tiết, TEXT
    seo_title: seo cho tiêu đề tin , VARCHAR(255)
    seo_description: seo cho phần mô tả tin, VARCHAR(255)
    seo_keywords: seo các từ khóa để search ra tin này
    status
    created_at
    updated_at
+ Bảng categories: bảng lưu các thông tin danh mục, ngoài
ra với hệ thống có cả sản phẩm và tin tức, thì sử dụng
chung 1 bảng categories, sử dụng 1 trường để phân biệt
đâu là danh mục của sản phẩm, đâu là danh mục của tin tức
    id
    name: tên danh mục, VARCHAR(150)
    avatar: lưu tên file avatar, VARCHAR(150)
    description: mô tả chi tiết, TEXT
    type: loại danh mục, 0 - Danh mục của sản phẩm, 1 -
danh mục của tin tức, TINYINT(1)
    status
    created_at
    updated_at
+ Bảng users: lưu các thông tin về user trên toàn hệ thống
    id
    avatar: lưu tên file ảnh, VARCHAR(150)
    first_name: VARCHAR(150)
    last_name: VARCHAR(150)
    last_login: lưu lại thời gian đăng nhập cuối cùng
DATETIME do trường này lưu thủ công
    email: lưu thông tin email, VARCHAR(150)
    facebook: lưu link fb của user, VARCHAR(150)
    jobs: lưu thông tin nghề nghiệp của user, VARCHAR(100)
    username: thông tin đăng nhập, VARCHAR(100)
    password: lưu mật khẩu, VARCHAR(150)
    status
    created_at
    updated_at
+ Bảng orders: bảng lưu thông tin đơn hàng trên hệ thống,
bảng này liên quan đến nghiệp vụ trang bán hàng,
    id
    fullname: lưu thông tin ng mua hàng, VARCHAR(100)
    address: địa chỉ ng mua hàng, VARCHAR(150)
    mobile: sđt ng mua hàng, VARCHAR(20)
    email: email ng mua hàng, VARCHAR(100)
    user_id: id của user, liên kết với bảng users, nếu user
đã đăng nhập thì khi mua hàng tự động điền các thông tin
vào form đặt hàng luôn
    note: ghi chú thêm từ user, TEXT
    price_total: tổng giá trị đơn hàng, INT(11)
    payment_status: 0 - Chưa xử lý, 1 - Đã thanh toán
    created_at
    updated_at
+ Bảng order_details: mô tả 1 đơn hàng đã mua bao sản phẩm,
và số lượng mỗi sản phẩm là bao nhiêu. Về mối quan hệ của
bảng orders và order_details: 1 đơn hàng có thể có nhiều
sản phẩm, 1 orders có thể có nhiều order_details
    order_id: id của đơn hàng tương ứng, liên kết với
bảng orders
    product_id: id của sản phẩm trong đơn hàng, liên kết
với bảng products
    quantity: số lượng sản phẩm trong đơn hàng

3 - Sau khi phân tích đc các bảng, đi tạo CSDL, có thể tạo
theo 2 cách sau, tạo CSDL tên: php0320e_project
#Tạo CSDL php0320e_project
CREATE DATABASE IF NOT EXISTS php0320e_project
CHARACTER SET utf8 COLLATE utf8_general_ci;
- Dùng giao diện để tạo (PHPMyadmin)
- Dùng câu truy vấn SQL để tạo, đã cung cấp file chứa các
câu truy vấn tạo các bảng trên r: file_create_db.html

4 - Xem sơ đồ quan hệ của các bảng sử dụng 1 chức năng
của PHPMyadmin, phục vụ làm tài liệu để báo cáo:
+ Chọn CSDL muốn xem
+ Trong tab More, click Desginer
Để chức nằng hiển thị mối liên kết giữa các bảng, khi tạo
bảng cần thể hiện khóa ngoại 1 cách rõ ràng.
Với câu truy vấn SQL: FOREIGN KEY ...
5 - Tạo cấu trúc thư mục MVC cho backend và frontend
Với project demo thì đang tách cấu trúc thư mục của
backend và frontend.
Tạo cấu trúc thư mục như sau
backend/
       /assets: chứa các thông tin liên quan đến frontend
                các file/thư mục trong thư mục assets
                đến từ template backend của bạn
              /css
              /js
              /images
              /webfonts .... fonts
       /configs: chứa cấu hình hệ thống
                /Database.php: class chứa các hằng số
                kết nối CSDL theo cơ chế PDO
       /controllers: chứa các class controller
                   /CategoryController.php
       /models:
              /Category.php
       /views:
             /layouts:
                    /main.php
             /categories
                        /index.php
                        /create.php
                        /update.php
                        /detail.php
       /index.php: file index gốc của ứng dụng
       /.htaccess: rewrite url, thường dùng bên frontend
Với cấu trúc bên frontend, hoàn toàn tương tự cấu trúc
backend


-->
<?php
/*
 * BACKEND:
 * 1 - Demo chức năng đăng ký/đăng nhập:
 * Giao diện của các chức năng này sẽ khác so với file layout
 * chính của backend -> tạo 1 file layout khác chỉ dùng cho
 * các chức năng mà user chưa đăng nhập vào backend -> 1 website
 * có thể có nhiều file layout
 * + Chức năng đăng ký: mật khẩu bắt buộc phải mã hóa trước khi
 * lưu vào CSDL, để demo thì dùng cơ chế mã hóa md5, thực tế
 * cần dùng các cơ chế mã hóa bảo mật hơn. Cần phải check thêm
 * chỉ cho phép đky username chưa tồn tại trên hệ thống
 * + Chức năng đăng nhập: khi kiểm tra login, sử dụng md5 để
 * lấy chuỗi mã hóa của mật khẩu trc khi kiểm tra trong CSDL
 * + (Chức năng thêm) Chức năng quên mật khẩu: có 1 form, có
 * 1 input duy nhất là nhập email. Khi user nhập email, gửi 1
 * mail chứa nội dung chính: sẽ chứa 1 link là url tới trang của
 * bạn để reset mật khẩu:
 * http://localhost/mvc/index.php?controller=user&
 * action=reset_password&email=<email-mã-hóa-md5>
 * Khi gửi mail mà có chứa url tới trang của bạn, cần phải set
 * url có đầy đủ cả domain, để lấy đc các thông số của domain
 * $_SERVER
 * + (Chức năng thêm): Quản lý đơn hàng: có 2 bảng liên quan
 * orders, order_details, xây dựng chức năng RUD cho đơn hàng
 * Về chức năng sửa đơn hàng: cho phép chỉ sửa thông tin ng mua
 * hàng, sửa trạng thái đơn hàng ...
 * + (Chức năng thêm): Chức năng thống kê:
 * Thông kê đơn hàng: tổng số đơn hàng trên hệ thống
 * (SELECT COUNT), thống kê đơn hàng theo trạng thái: đã thanh
 * toán, chưa thanh toán
 * Thống kê sản phẩm: sản phẩm bán chạy nhất (count theo
 *  product_id theo từng đơn hàng), tổng số sp đang có trên
 * hệ thống
 * Thống kê tin tức: tổng số tin tức đang có
 * + (Chức năng thêm) Phân quyền: chia quyền cho các user trên
 * hệ thống backend, có thể thêm trường role vào bảng users:
 * 0 : super admin - quyền cao nhất
 * 1: admin - quyền thấp hơn super
 * 2: sales - chỉ thao tác đc với các đơn hàng
 * 3: editor - CRUD sản phẩm, CRUD tin tức ..
 * Cần tạo thêm 1 bảng roles: CRUD các quyền trên hệ thống
 *
 *
 * 2 - Demo chức năng tìm kiếm sản phẩm
 */
?>

