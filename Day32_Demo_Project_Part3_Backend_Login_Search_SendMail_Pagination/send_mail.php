<?php
/**
 * send_mail.php
 * Taọ file này ngang hàng với thư mục PHPMailer đã tải về
 * 1 - Một số chú ý:
 * Chức năng gửi mail ứng dụng rất nhiều trong thực tế: đăng ký
 * , quên mk, đặt hàng, gửi thông tin liên hệ ...
 * Về code, PHP có 1 hàm dùng để gửi mail: mail(), mặc định
 * cần phải cấu hình trong file php.ini thì mới gửi đc mail
 * Nên dùng thư viện bên ngoài để hỗ trợ việc gửi mail, 1 trong
 * số đó là thư viện PHPMailer
 * Với PHPMailer, cần cấu hình các thông số liên quan đến
 * mật khẩu ứng dụng của Gmail
 * Có thể viết thành 1 hàm gửi mail dựa trên thư viện này:
 * public function sendMail($mail, $title, $body, $attachment)
 */
?>

<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Copy 1 file ảnh bất kỳ vào ngang hàng với file hiện tại
//để demo chức năng đính kèm file khi gửi mail: img1.jpg

//Nhúng 3 file chứa 3 class PHPMailer, SMTP, Exception
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';
require_once 'PHPMailer/src/Exception.php';
// Load Composer's autoloader
//comment lại đoạn này do chưa sử dụng composer
//require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//    cần setting thêm thuộc tính sau để ko bị lỗi font có dấu
    $mail->CharSet = 'UTF-8';
    //Server settings, bỏ debug khi gửi mail
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->SMTPDebug = SMTP::DEBUG_OFF;                      // Enable verbose debug output
    $mail->isSMTP();
    // Send using SMTP
    //Sử dụng server của gmail để gửi mail
    $mail->Host       = 'smtp.gmail.com';
    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    // Enable SMTP authentication
    // SMTP username: chính là tài khoản gmail của bạn
    $mail->Username   = 'nguyenvietmanhit@gmail.com';
    // SMTP password: password này ko phải là password để đăng
//    nhập vào GMail, là mật khẩu ứng dụng, để lấy mật khẩu
//    ứng dụng, truy cập link sau:
//https://myaccount.google.com/ -> menu Bảo mật -> Xác minh 2
//    bước -> mới tạo đc mật khẩu ứng dụng
    $mail->Password   = 'murwdzpksiduuimg';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    //Setting người gửi
    $mail->setFrom('nguyenvietmanhit@gmail.com',
        'Nguyễn Viết Mạnh');
    //Setting người nhận
    $mail->addAddress('nguyenvietmanhit@gmail.com');               // Name is optional
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // Attachments
    //Đây là chức năng đính kèm file
    $mail->addAttachment('img1.jpg');
    // Add attachments
//    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    //Setting nội dung mail
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Tiêu đề mail của tôi';
    $mail->Body    = 'Nội dung mail của tôi';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}


//Thử gửi mail = hàm mail của PHP
//mail('nguyenvietmanhit@gmail.com', 'Tiêu đề mail',
//   'Message');