<?php

function construct() {
    load_model('index');
    load('lib','validation');
	load('lib','email');
}

function loginAction(){
	// echo time();
	echo date("d/m/Y h:m:s");
	global $error, $username, $password;
	if(isset($_POST['btn-login'])){
		$error=array();
		#Kiểm tra username
		if(empty($_POST['username'])){
			$error['username']="Bạn chưa nhập tên đăng nhập";
		}else{
			if (!is_username($_POST['username'])){
			$error['username']="Tên đăng nhập không hợp lệ";
			}else{
			$username=$_POST['username'];
			}
		}

		#Kiểm tra password
		if(empty($_POST['password'])){
			$error['password']="Bạn chưa nhập mật khẩu";
		}else{
			if (!is_password($_POST['password'])){
			$error['password']="Mã đăng nhập không hợp lệ";
			}else{
			$password= md5($_POST['password']);
			}
		};	

		#Kết luận
		if(empty($error)){
			//Xử lý login
			if(check_login($username,$password)){
				//Lưu trữ đăng nhập
				$_SESSION['is_login']=true;
				$_SESSION['user_login']=$username;
				// Chuyển hướng vào hệ thống
				redirect();
				echo "thêm thành công";
			}else{
				$error['account']= "Đăng nhập thất bại thảm hại tài khoản hoặc mật khẩu";
			}
		}
	}
    load_view('login');
}

function logoutAction(){
	unset($_SESSION['is_login']);
	unset($_SESSION['user_login']);
	redirect("?mod=users&action=login");
}

function updateAction(){
    if(isset($_POST['btn-update'])){
		show_array($_POST);
		$error=array();
		//Kiểm tra
		$fullname=$_POST['fullname'];
		$email=$_POST['email'];
		$address=$_POST['address'];
		$phone_number=$_POST['phone_number'];

		if(empty($error)){
			//update
			$data=array(
				'fullname'=>$fullname,
				'email'=>$email,
				'phone_number'=>$phone_number,
				'address'=>$address
			);
			// show_array($data);
			update_user_login(user_login(),$data);
		}
	}


    $info_user = get_user_by_username(user_login());
	$data['info_user']=$info_user;
	load_view('update',$data);
}

function resetAction(){
	load_view('reset');
}


// function indexAction() {
//     load('helper','format');
//     // load_model('index');
//     $list_users = get_list_users();
//     // show_array($list_users);
//     // show_array($list_users);
//     $data['list_users'] = $list_users;
//     load_view('index',$data);
// }


// function addAction() {
//     echo "Thêm dữ liệu";
// }

// function editAction() {
//     $id = (int)$_GET['id'];
//     $item = get_user_by_id($id);
//     show_array($item);
//     // echo "Sửa dữ liệu";
// }
