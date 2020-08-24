//assets/js/script.js
$(document).ready(function () {
    //hàm này sẽ hiển thị ảnh preview khi upload
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img-preview').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("input[type=file]").change(function() {
        readURL(this);
    });



    //Code JS để tích hợp CKEditor vào hệ thống
    //giá trị truyền vào phải là thuộc tính name của thẻ
    //  <textarea> muốn tích hợp CKEditor
    //cần xóa cache trình duyệt để thấy sự thay đổi
    // Ctrl + Shift + R
    // CKEDITOR.replace('description');
    //viết code JS để tích hợp cả CKEditor và CKFinder luôn
    //2_Setup_CKfinder
    CKEDITOR.replace('description', {
        //đường dẫn đến file ckfinder.html của ckfinder
        filebrowserBrowseUrl: 'assets/ckfinder/ckfinder.html',
        //đường dẫn đến file connector.php của ckfinder
        filebrowserUploadUrl: 'assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
    });
});