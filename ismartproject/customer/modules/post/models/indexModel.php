<?php

// function get_list_users() {
//     $result = db_fetch_array("SELECT * FROM `tbl_users`");
//     return $result;
// }

function get_user_by_id($id) {
    $item = db_fetch_row("SELECT * FROM `user_info` WHERE `id` = {$id}");
    return $item;
}

// echo "indexModel";

function get_list_users(){
    $result=db_fetch_array("SELECT * FROM `user_info`");
    return $result;

}

