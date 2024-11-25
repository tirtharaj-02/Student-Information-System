<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'admin') {
    header("location:login.php");
}

include 'studentcss.php';
include 'studentsidebar.php';

// Database connection details
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";

// Connect to the database
$data = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = $_SESSION['username'];

$sql = "SELECT * FROM user WHERE username='$name'";

$result = mysqli_query($data, $sql);

$info = mysqli_fetch_assoc($result);

if (isset($_POST['update_profile'])) {
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $password = $_POST["password"]; 

    $sql1 = "UPDATE user SET email='$email', phone='$phone', password='$password' WHERE username='$name'";

    $result1 = mysqli_query($data, $sql1);

    if ($result1) {
        echo "<script type='text/javascript'>
                alert('Your Data Updated Successfully');
                window.location.href = 'studenthome.php';
            </script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	
	<title>Student Dashboard</title>

    <style>
    .form-container {
	width: 35%;
	margin: 0 auto;
	padding: 20px;
	background-color: skyblue;
	border-radius: 22px;
	
}

h2 {
	text-align: center;
	margin-bottom: 20px;
}


body {
  position: relative;
}

label {
	font-size: 15px;
	margin-left: 10px;
}

input[type="text"], input[type="email"]{
	width: 50%;
	padding: 15px 20px;
	margin: 10px 3px;
	border: 1px solid #ccc;
	border-radius: 22px;
	
}

input[type="submit"] {
	background-color: #4CAF50;
	color: white;
	padding: 12px 20px;
	margin-top: 10px;
	border: none;
	border-radius: 25px;
	cursor: pointer;
}

input[type="submit"]:hover {
	background-color: orange;
}

    </style>
	</head>
    <body>
        <center>
    <h3>Update Profile</h3>
	<div class="form-container">
		<form action="#" method="POST">

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required value="<?php echo "{$info['email']}" ?>"><br>

			<label for="phone">Phone:</label>
			<input type="text" id="phone" name="phone" required value="<?php echo "{$info['phone']}" ?>"><br>

			<label for="password">Password:</label>
			<input type="text" id="password" name="password" required value="<?php echo "{$info['password']}" ?>"><br>

			<input type="submit" name=" update_profile" value="Update">
		</form>
	</div>
    </center>
</body>
</html>