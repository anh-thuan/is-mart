<?php
session_start();
ob_start();


/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */

$config['base_url'] = "http://localhost/PHP/Project/Session29/ismartproject/customer/";
// "Bài%2028.2%20Đăng%20ký%20tài%20khoản%20hệ%20thống/project_mvc/";
// "http://localhost/PHP/Lesson/PHP-P28/B%C3%A0i%2028.2%20%C4%90%C4%83ng%20k%C3%BD%20t%C3%A0i%20kho%E1%BA%A3n%20h%E1%BB%87%20th%E1%BB%91ng/project_mvc/"

//Cấu hình khác
$config['default_module'] = 'home';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';












