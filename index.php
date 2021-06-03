<?php
require_once "app/autoload.php";
?>

<?php
if(isset($_SESSION['name'])){
	header('location: profile.php');
   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Log in here</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php
	
	// Getting the form data
	if(isset($_POST['submit'])){
		$login = $_POST['user'];
		$password = $_POST['password'];
	} 
	// empty field check
	if(empty ($login) || empty ($password) ){
		$mess = validationMsg ("All fields are required");
	}else{
		$sql = "SELECT * FROM users WHERE email ='$login' or uname ='$login'";
			$login_Data = $connection -> query($sql);
			$login_num = $login_Data -> num_rows;
			$login_user = $login_Data -> fetch_assoc();

		if($login_num == 1){
			if(password_verify($password, $login_user['pass'])){
				$_SESSION['user_id'] = $login_user['id'];
				$_SESSION['name'] = $login_user['name'];
				$_SESSION['email'] = $login_user['email'];
				$_SESSION['cell'] = $login_user['cell'];
				$_SESSION['uname'] = $login_user['uname'];
				$_SESSION['photo'] = $login_user['photo'];
			
				
				header('location: profile.php');
			}else{
				$mess = validationMsg ("Wrong Password");
			}
		}else{
			$mess = validationMsg ("Wrong User Name or email address");
		}
	}

	
	?>
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Log In Here</h2>
				<?php 
					include "template/messeage.php";
				?>
				<form action="" method="POST">
					
					<div class="form-group">
						<label for="">Username/Email</label>
						<input name="user" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="password" class="form-control" type="password">
					</div>
					
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Log In">
					</div>
				</form>
			</div>
			<div class="card-footer"><a class="card-link" href="register.php">Create an Account</a> </div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>