<?php
// function check_login($username,$password){
//     global $list_users;
//     // show_array($list_users);
//     foreach($list_users as $user){
//         if($username==$user['username'] && md5($password)==$user['password']){
//             return TRUE;
//         }
//     }
//     return FALSE;
// }

//Trả về true nếu đã login
function is_login(){
    if(isset($_SESSION['is_login']))
        return TRUE;
    return false;
}

//Trả về username nếu đã login
function user_login(){
    if(!empty($_SESSION['user_login'])){
        return $_SESSION['user_login'];
    }
    return false;
}

// function info_user($field='id'){
//     global $list_users;
//     if(isset($_SESSION['is_login'])){
//        foreach($list_users as $user){
//         // print_r($user);
//             if($_SESSION['user_login']==$user['username']){
//               if(array_key_exists($field,$user)){
//                 // show_array($user);
//                 // print_r($user);
//                 return $user[$field];
//               }
//            }
//        }
//     }
//     return false;
// }
?>