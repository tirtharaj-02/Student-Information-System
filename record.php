<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='student')
{
    header("location:login.php");
}

include 'Admincss.php';
include 'adminsidebar.php';

$host = "localhost";
$user = "root";
$password = "";
$dbname = "bcaproject";

// Create connection
$data = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['submit'])) {
    // Get the form data
    $name = $_POST['name'];
    $faculty = $_POST['faculty'];
    $semester = $_POST['semester'];
    $grade = $_POST['grade'];
    
    // Insert the form data into the database for each subject
    $subjects = array("numerical_methods", "Operating_System", "Software_Engineering", "DBMS", "Scripting_Language","Project");
    foreach ($subjects as $subject) {
        // Check if a record already exists for this name and subject
        $check_query = "SELECT * FROM grades WHERE name='$name' AND subject='$subject'";
        $check_result = mysqli_query($data, $check_query);
        $row_count = mysqli_num_rows($check_result);

        if($row_count > 0) {
            // Update the existing record
            $update_query = "UPDATE grades SET grade='$grade' WHERE name='$name' AND subject='$subject'";
            $result = mysqli_query($data, $update_query);

            if ($result) {
                echo "<script>alert('Record updated successfully');</script>";
            } else {
                echo "<script>alert('Record not updated successfully');</script>";
            }
        } else {
            // Insert a new record
            $insert_query = "INSERT INTO grades (name, faculty, semester, subject, grade) VALUES ('$name', '$faculty', '$semester', '$subject', '$grade')";
            $result = mysqli_query($data, $insert_query);

            if ($result) {
                echo "<script>alert('Record submitted successfully');</script>";
            } else {
                echo "<script>alert('Record not submitted successfully');</script>";
            }
        }
    }

    // Close the database connection
    mysqli_close($data);
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>Grade Submission</title>
    <style>
      form {
  max-width: 400px;
  margin: 0 auto;
  font-family: Arial, sans-serif;
  background-color: skyblue;
  padding: 10px;
  border-radius: 22px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

h1 {
  text-align: center;
  font-size: 25px;
  margin-bottom: 25px;
}

label {
  display: block;
  font-size: 14px;
  margin-bottom: 10px;
}

input[type="text"], select {
  width: 100%;
  padding: 5px;
  font-size: 15px;
  border-radius: 22px;
  border: none;
  margin-bottom: 20px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  font-size: 15px;
  border: none;
  border-radius: 30px;
  cursor: pointer;
}

input[type="submit"]:hover {
  background-color: orange;
}

    </style>
</head>
<body>
    <center>
        
	<h2>Grade Submission</h2>
	<form method="post" action="#">
        <div>
        <label for="name">Student Name:</label>
		<input type="text" id="name" name="name">
        </div>

        <div>
		<label for="faculty">Faculty:</label>
        <select id="faculty" name="faculty">

        <option value="">--</option>
        <option value="BCA">BCA</option>
        <option value="BIM">BIM</option>
        <option value="BBA">BBA</option>
        </select>
        </div>

        <div>
		<label for="semester">Semester:</label>
        <select id="semester" name="semester">

        <option value="">--</option>
        <option value="">1</option>
        <option value="">2</option>
        <option value="">3</option>
        <option value="">4</option>
        <option value="">5</option>
        <option value="">6</option>
        <option value="">7</option>
        <option value="">8</option>
        </select>
        </div>

        <div>
    <label for="subject">Subject:</label>
    <select id="subject" name="subject">
        <option value="">--</option>
        <option value="numerical_methods">Numerical Methods</option>
        <option value="Operating_System">Operating System</option>
        <option value="Software_Engineering">Software Engineering</option>
        <option value="DBMS">DBMS</option>
        <option value="Scripting_Language">Scripting Language</option>
        <option value="Project">Project</option>
        <!-- add more options as needed -->
    </select>
    </div>


            <div>
            <label for="grade">Grade:</label>
            <select id="grade" name="grade">

            <option value="">--</option>
            <option value="A">A</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B">B</option>
            <option value="B-">B-</option>
            <option value="C+">C+</option>
            <option value="C">C</option>
            <option value="C-">C-</option>
            <option value="D+">D+</option>
            <option value="D">D</option>
            <option value="F">F</option>
            <!-- add more options as needed -->
            </select>
            </div>


		<input type="submit" name="submit" value="Submit">
	</form>
    </center>
</body>
</html>
