
<?php
require_once "app/autoload.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	<?php
	// get the data from the registration form

	if(isset($_POST['social'])){
		//get data from the following input field
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];
		$uname = $_POST['uname'];
		$pass = $_POST['pass'];
		$cpass = $_POST['cpass'];
		//Check box functionality set
		$status = 'disagree';
		if(isset($_POST['status'])) {
		$status = $_POST['status'];
		}


		// Password conversion to salt
		$hass_pass = password_hash($pass,PASSWORD_DEFAULT);
		

		// Validation (checking for empty input box - if found empty send a notification)

		if(empty($name)||empty($email) || empty($cell) || empty($uname)|| empty($hass_pass)){
			$mess = validationMsg ("All field must be complete");
		
		}elseif($status == 'disagree'){
			$mess = validationMsg ("You should agree first");
		}elseif($cpass !==$pass){
			$mess = validationMsg ("Password do not match");
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) ){
			$mess = validationMsg ("Invalid Email Address");
		}else{
			$sql = "INSERT INTO users (name, email, cell, uname, pass,status) VALUES('$name','$email','$cell','$uname','$hass_pass', '$status')";
			$connection -> query($sql);
			$mess = validationMsg ('Registration Successful', 'success');
			}
	}
	

	
	?>

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Create Your Account</h2>
				<?php 
				if(isset($mess)){
					echo $mess;
				}
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="email">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input name="pass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Confirm Password</label>
						<input name="cpass" class="form-control" type="password">
					</div>
					<div class="form-group">
						<label for="">Profile photo</label>
						<input name="photo" class="form-control-file" type="file">
					</div>
					<div class="form-group">
						<input name="status" value="Disagree" class="p-1"  type="checkbox" id="agree"><label for="agree">  I agree to go</label>
					</div>
					<div class="form-group">
						<input name="social" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
			<div class="card-footer"><a class="card-link" href="index.php">Log in</a> </div>
		</div>
	</div>
	<br>
	<br>
	<br>

	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>