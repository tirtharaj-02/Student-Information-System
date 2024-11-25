<?php
	// Database connection code
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "bcaproject";

	$conn = mysqli_connect($host, $user, $password, $db);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// Retrieve data from form
		$name = $_POST["name"];
		$photo = $_POST["photo"];
		$permanent_address = $_POST["permanent_address"];
		$temporary_address = $_POST["temporary_address"];
		$parent_name = $_POST["parent_name"];
		$dob = $_POST["dob"];
		$introduction = $_POST["introduction"];

		// Insert data into database
		$sql = "INSERT INTO student (name, photo, grade, permanent_address, temporary_address, parent_name, dob, introduction) VALUES ('$name', '$photo', '$permanent_address', '$temporary_address', '$parent_name', '$dob', '$introduction')";

		if (mysqli_query($conn, $sql)) {
			echo "Student added successfully.";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		
	}

	mysqli_close($conn);


	?>


<!DOCTYPE html>
<html>
<head>
	<?php 
	include "studentsidebar.php";
	include 'studentcss.php';
	?>
	<title> Student info</title>
    <link rel="stylesheet" type="text/css" href="stdinfo.css">
</head>
<body>
<center>
	<h1> Student Information Fill-up </h1>

	<form  method="POST" enctype="multipart/form-data">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name"><br>

		<label for="photo">Photo:</label>
		<input type="file" id="photo" name="photo"><br>


		<label for="permanent_address">Permanent Address:</label>
		<input type="text" id="permanent_address" name="permanent_address"><br>

		<label for="temporary_address">Temporary Address:</label>
		<input type="text" id="temporary_address" name="temporary_address"><br>

		<label for="parent_name">Parent Name:</label>
		<input type="text" id="parent_name" name="parent_name"><br>

		<label for="dob">Date of Birth:</label>
		<input type="date" id="dob" name="dob"><br>

		<label for="introduction">Short Introduction:</label>
		<textarea id="introduction" name="introduction"></textarea><br>

		<input type="button" id="submit" value="Submit">
	</form>
	</center>
</body>
</html>
