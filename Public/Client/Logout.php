<?php
// Khởi động session
session_start();

// Xóa tất cả các biến session
$_SESSION = array();

// Hủy session
session_destroy();

// Điều hướng người dùng đến trang đăng nhập sau khi logout
header("Location: /");
exit();
?>
