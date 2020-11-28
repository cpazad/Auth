<?php
include_once "app/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['name'];?></title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	

	<div class="wrap shadow">
		<a class="btn btn-primary btn-sm" href="users.php">All Users</a>
		<div class="card">
			<div class="card-body profile">
				<img src="assets\media\img\<?php echo $_SESSION['photo'];?>" alt="Profile Photo">
				<h2><?php echo $_SESSION['name'];?></h2>
				<table class="table table-striped">
					<tr>
						<td>
							Name
						</td>
						<td><?php echo $_SESSION['name'];?></td>
					</tr>
					<tr>
						<td>
							Email
						</td>
						<td><?php echo $_SESSION['email'];?></td>
					</tr>
					<tr>
						<td>
							Cell
						</td>
						<td><?php echo $_SESSION['cell'];?></td>
					</tr>
					<tr>
						<td>
							User Name
						</td>
						<td><?php echo $_SESSION['uname'];?></td>
					</tr>
					
				</table>
				<a class="btn btn-secondary btn-sm" href="">Log Out</a>
			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>