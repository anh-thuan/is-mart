<?php
//Cập nhật thông tin admin 29.14
function get_user_by_username($username){
    $item = db_fetch_row("SELECT * FROM `admin_info` WHERE `username` = '{$username}'");
    if(!empty($item))
    return $item;
}

function update_user_login($username,$data){
    return db_update('admin_info',$data,"`username`='{$username}'");
}

//Cập nhật password 28.9
function update_pass($data,$reset_token){
    db_update('admin_info',$data,"`reset_token`='{$reset_token}'");
}

function check_reset_token($reset_token){
    $check=db_num_rows("SELECT * FROM `admin_info` WHERE `reset_token`='{$reset_token}'");
    if($check >0)
    return true;
    return false;
}

//Email check 28.8
function update_reset_token($data,$email){
    db_update('admin_info',$data,"`email`='{$email}'");
}

function check_email($email){
    $check=db_num_rows("SELECT * FROM `admin_info` WHERE `email`='{$email}'");
    if($check >0)
    return true;
    return false;
} 

//Login check 28.6
function check_login($username,$password){
    $check_user=db_num_rows("SELECT * FROM `admin_info` WHERE `username`='{$username}' AND `password`='{$password}'");
    echo $check_user;
    if($check_user >0)
    return true;
    return false;
} 

function info_user($label='id'){
    $user_login=$_SESSION['user_login'];
    $user=db_fetch_array("SELECT * FROM `admin_info` WHERE `username`='{$user_login}'");
    return $user[$label];
}

//Add user 28.5
function add_user($data){
    return db_insert('admin_info',$data);
}

function user_exists($username,$email){ 
    $check_user=db_num_rows("SELECT * FROM `admin_info` WHERE `username`='{$username}' OR `email`='{$email}'");
    echo $check_user;
    if($check_user >0)
      return true;
    return false;
}

function get_list_users(){
    $result=db_fetch_array("SELECT * FROM `admin_info`");
    return $result;
}

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `admin_info` WHERE `id` = {$id}");
    return $item;
}

function active_user($active_token){
    return db_update('admin_info',array('is_active'=>1),"`active_token`='{$active_token}'");
}

function check_active_token($active_token){
    $check=db_num_rows("SELECT * FROM `admin_info` WHERE `active_token`='{$active_token}' AND `is_active`='0'");
    if($check >0)
       return true;
    return false;
}
