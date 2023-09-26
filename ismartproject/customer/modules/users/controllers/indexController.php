<?php

function construct() {
    load_model('index');
    load('lib','validation');
	load('lib','email');
}

function indexAction(){
	load_view('index');
}

function regAction(){
    global $error, $fullname, $username, $password, $email;
	if(isset($_POST['btn-reg'])){ 
		$error=array();

#Kiểm tra fullname
        if(empty($_POST['fullname'])){
            $error['fullname']="Bạn chưa nhập họ tên";
        }else{
            $fullname=$_POST['fullname'];
        }

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
			$password=md5($_POST['password']);
			}
		}

#kIểm tra email
        if (empty($_POST['email'])) {
            $error['email'] = "Bạn chưa nhập đúng email";
        } else {
            // Email validation pattern
            if (!is_email($_POST['email'])) { 
                $error['email'] = "email đang nhập không hợp lệ";
            }else {
                $email = $_POST['email'];
            }
        }
		

		if(empty($error)){
            if(!user_exists($username,$email)){
				$active_token=md5($username.time());
                $data=array(
                    'fullname'=>$fullname,
                    'username'=>$username,
                    'password'=>$password,
                    'email'=>$email,
					'active_token'=>$active_token,
					'reg_date'=>time()
                );
                add_user($data);
				$link_active = base_url("?mod=users&action=active&active_token={$active_token}");
				$content="<p>Chào bạn {$fullname}</p>
				          <p>Bạn vui lòng nhập thông tin vào đây để đăng ký tài khoản và nhận link kết nối để kích hoạt tài khoản: {$link_active}</p>";
				send_mail('mr.jack21th@gmail.com',"anhthuan123",'Kích hoạt tài khoản PHP ', $content);
                //Thông báo
                // redirect("?mod=users&action=reg");
            }else{
                $error['account']="Tài khoản đã tồn tại";
            }
	    }
	}
    load_view('reg');
}

function loginAction(){
	
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

function activeAction(){
	$link_login=base_url("?mod=users&action=login");
	$active_token=$_GET['active_token'];
	//Hàm trả về 1 nếu thằng này tồn tại và chưa kích hoạt
	if(check_active_token($active_token)){
		active_user($active_token);
		echo "<p>Kích hoạt thành công</p>
		      <p>Bạn vui lòng <a href='{$link_login}'>đăng nhập</a> để sử dụng tài khoản</p>";
	}else{
		echo "Kích hoạt thất bại hoặc tài khoản đã được kích hoạt trước đó";
	}
}

function logoutAction(){
	unset($_SESSION['is_login']);
	unset($_SESSION['user_login']);
	redirect("?mod=users&action=login");
}


//resetAction
function resetAction(){
	global $error, $username, $password;

	$reset_token=$_GET['reset_token'];
	if(!empty($reset_token)){
		if(check_reset_token($reset_token)){
			if(isset($_POST['btn-new-pass'])){
				$error=array();
	#Kiểm tra password
		if(empty($_POST['password'])){
			$error['password']="Bạn chưa nhập mật khẩu";
		}else{
			if(!is_password($_POST['password'])){
			$error['password']="Mã đăng nhập không hợp lệ";
			}else{
			$password= md5($_POST['password']);
			}
		}
		if(empty($error)){
			$data=array(
				'password'=>$password
			);
			update_pass($data,$reset_token);
			redirect ("?mod=users&action=resetOK");
			}
			}
			load_view('newPass');
		}else{
			echo "Mã reset không hợp lệ";
		}
	}else{
		#Xử lý reset
	if(isset($_POST['btn-reset'])){
		$error=array();
		#Kiểm tra email
		if (empty($_POST['email'])) {
            $error['email'] = "Bạn chưa nhập đúng email";
        } else {
            // Email validation pattern
            if (!is_email($_POST['email'])) { 
                $error['email'] = "email đăng nhập không hợp lệ";
            }else {
                $email = $_POST['email'];
            }
        }

		#Kết luận
		if (empty($error)) {
			// Xử lý error
			if (check_email($email)) {
				$reset_token = md5($email.time());
				$data = array(
					'reset_token' => $reset_token
				);
				// Cập nhật mã reset pass vào db
				update_reset_token($data, $email);
				// gửi link khôi phục mail
				$link = base_url("?mod=users&action=reset&reset_token={$reset_token}");
				$content = "<p>Bạn vui lòng ấn link: {$link} để khôi phục mật khẩu</p>";
				send_mail($email, '', 'Khôi phục reset', $content);
			} else {
				$error['account'] = "Email không có trên hệ thống";
			}
		}
	}
	load_view('reset');
    }
}

function resetOKAction(){
	load_view('resetOK');
}

function homeAction(){
	load_view('home');
}

function productAction(){
	load_view('product');
}

function cartAction(){
	load_view('cart');
}
function checkoutAction(){
	load_view('checkout');
}
function detail_productAction(){
	load_view('detail_product');
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
