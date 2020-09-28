<?php
/**
 * huong_dan_day_code_len_server.php
 * Hướng dẫn đẩy code từ local -> server thật của ITPlus
 * - Muốn web của bạn chạy online, bất cứ ai cũng có thể truy
 * cập tại bất cứ thời điểm nào -> thuê 1 server để đẩy web
 * lên đó, có 2 khái niệm chính: thuê hosting và thuê domain
 * + Hosting: chính là nơi đặt web của bạn vào, về bản chất
 * hosting chính là các thư mục, so sanh với localhost thì
 * hosting chính là các thư mục nằm trong htdocs trong XAMPP,
 * webserver có 2 loại chính: Apache và Nginx
 * + Domain: có thể ko cần thuê domain mà vẫn truy cập đc web,
 * truy cập thông qua IP của hosting, tuy nhiên IP rất khó với
 * user -> cần phải thuê domain
 * - Để đẩy đc code l server bất kỳ, cần đc cung cấp các thông
 * tin sau:
 * + Thông tin upload:
 * Ip/Domain của hosting:
 * Username:
 * Password
 * Giao thức truyền file: FTP, cổng mặc định: 21. Có thể dùng
 * phần mềm như FileZilla hoặc ngay bản thân PHPStorm
 * + THông tin kết nối CSDL:
 * IP/Domain của PHPMyadmin
 * Username
 * PAssword
 *
 * - Thao tác:
 * + Trên local tạo 1 thư mục theo <tên ko dấu>_project ,
 * để trong htdocs,
 * trong thư mục vừa tạo, tạo 1 file test.php, bên trong file
 * này echo "<tên của ban>";
 * + Dùng PHPStorm để cấu hình đẩy code lên server như sau:
 * Vào Tools/Deployment/Configuation... cấu hình ở 2 tab
 * Connection và Mappings
 * Sau khi test kết nối thành công, vào Tools/Deployment/
 * Browse Remote Host để show ra cấu trúc file/thư mục mà
 * bạn sẽ đẩy code lên
 * Mặc định sẽ phải uploa file/thư mục thủ công bằng cách click
 * chuột phải vào file/thư mục -> Deployment->Upload to ...
 * Có thể set tự động Upload mỗi khi Save nhu sau:
 * Tools/Deploytment/Options/
 * - Hướng dẫn truy cập PHPMyadmin của server ITPlus
 * + Truy cập url sau để vào phpmyadmin:
 * <domain>/phpmyadmin
 * vD: php0320e-1.itpsoft.com.vn/phpmyadmin
 * + Cần server cung cấp username và password để truy cập
 * PHPMyadmin
 * + Sau khi truy cập, thao tác như trên local. Demo việc
 * export csdl từ local, import ngược lại cho server
 * + Sau khi import thành công, cần thay đổi cấu hình kết nối
 * CSDL trên local -> thông tin kết nối mà server cung cấp
 */