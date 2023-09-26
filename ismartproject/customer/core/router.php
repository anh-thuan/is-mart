<?php
//Triệu gọi đến file xử lý thông qua request

$request_path = MODULESPATH . DIRECTORY_SEPARATOR . get_module() . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR . get_controller().'Controller.php';

if (file_exists($request_path)) {
    require $request_path;
} else {
    echo "Không tìm thấy:$request_path ";
}

$action_name = get_action().'Action';

call_function(array('construct', $action_name));

//Lệnh này cản người dung truy cập trực tiếp vào file chính bất hợp pháp
if(!is_login() && get_action() !='login' && get_action() !='reg' && get_action() !='active' && get_action() !='reset' && get_action() !='resetOK')
redirect ('?mod=users&action=login');

//Tìm file có tồn tại ko=> Nếu mà ko tồn tại file thì sẽ chuyển đến file error và quay lại trang chủ
// if(file_exists($path)){
//     require $path;
// }else{
//     require 'inc/404.php';
// }

