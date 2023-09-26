<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset-password-form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1954a5386a.js" crossorigin="anonymous"></script>

    <!--Login-->
    <link href="public/login.css" rel="stylesheet" type="text/css">

</head>
<body>
<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" id="form-login" action="" method="POST">
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" name="email" id="username" value="<?php echo set_value('email')?>" placeholder="Email"><br><br><br>
					<div class="text-danger">
                    <?php echo form_error('email')?>
                    </div>
				</div>
				<input class="button login__submit" type="submit" id="btn-login" name="btn-reset" value="Gửi yêu cầu">	
				</input><br>
					<div class="text-danger">
                    <?php echo form_error('account')?>	
                    </div>
                    <div class="form-link">
					<span>Already have an account? <a href="<?php echo base_url("?mod=users&action=login"); ?>" id="lost-pass" class="link login-link">Click here</a></span><br>
                    <span>Don't have an account? <a href="<?php echo base_url("?mod=users&action=reg"); ?>" id="lost-pass" class="link login-link">Register</a></span>
                    </div>
			</form>
		</div>
		<div class="screen__background">
			<span class="screen__background__shape screen__background__shape4"></span>
			<span class="screen__background__shape screen__background__shape3"></span>		
			<span class="screen__background__shape screen__background__shape2"></span>
			<span class="screen__background__shape screen__background__shape1"></span>
		</div>	
	</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
</body>
</html>