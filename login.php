<!DOCTYPE html>
<html>
<head>
<style>
.label_deg {
	display: inline-block;
	color: gold;
	width: 100px;
	text-align: right;
	padding-top: 10px;
	padding-bottom: 10px;
	
}

.login_form {
	background-color: grey;
	width: 300px;
	padding-top: 20px;
	padding-bottom: 20px;
	margin: auto;
}

.title_deg {
	background-color: darkcyan;
	color: white;
	text-align: center;
	font-weight: inherit;
	width: 300px;
	padding-top: 10px;
	padding-bottom: 10px;
	font-size: 20px;
}

.body_deg {
	background-image: url('kcmit1.jpg');
	background-repeat: no-repeat;
	background-attachment: sticky;
	background-size: 100% 100%;
	padding: 5px;
	margin: 200px;
	
}

.btn {
	margin-top: 20px;
	margin-bottom: 20px;
	margin-left: 10px;
	padding: 5px 10px;
	border-radius: none;
	cursor: pointer;
}

.btn-primary {
	color: white;
	border: none;
}

input[type="text"],
input[type="password"] {
	padding: 5px;
	border-radius: none;
	border: groove;
	margin-top: 40px;
	margin-bottom: 10px;
	width: 50%;
}

input[type="submit"] {
	border:groove;
}
</style>

<script>
		function exit() {
			window.location.href = "studentmanagement/index.php";
		}
	</script>
	<title>Login Form</title>

	<link rel="stylesheet" type="text/css" href="">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</head>
<body background="kcmit1.jpg" class="body_deg">

<center>
	<div class="form_deg">
		<center class="title_deg">
			Login Form
			<h4>
				<?php 
					error_reporting(E_ALL);
					session_start();
					if (isset($_SESSION['loginMessage'])) {
						echo $_SESSION['loginMessage'];
						unset($_SESSION['loginMessage']);
					}
				?>
			</h4>
		</center>
			
		<form action="login_check.php" method="POST" class="login_form">
			<div>
				<label class="label_deg">Username</label>
				<input type="text" name="username" required>
			</div>

			<div>
				<label class="label_deg">Password</label>
				<input type="password" name="password" required>
			</div>
			
			<div>	
				<input class="btn btn-primary" type="submit" name="submit" value="Login">
				<input type="button" class="btn btn-warning" onClick="location.href='index.php'" value="Exit">
			</div>
		</form>
	</div>
</center>

</body>
</html>
