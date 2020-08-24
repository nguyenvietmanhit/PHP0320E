<?php
/**
 * views/users/login.php
 * Form đăng nhập
 */
?>
<form class="container" action="" method="post">
    <h2>Form login</h2>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" name="username" id="username"
        class="form-control" />
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" name="password" id="password"
             class="form-control"  />
    </div>
    <div class="form-group">
        <input type="submit" name="login" value="Đăng nhập"
        class="btn btn-primary"/>
    </div>
    <p>
        Chưa có tài khoản,
        <a href="index.php?controller=user&action=register">
            Đăng ký
        </a> ngay.
    </p>
</form>
