<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit(); // Added exit() to stop further execution
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
    exit(); // Added exit() to stop further execution
}


// Establish database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";
$data = mysqli_connect($host, $user, $password, $db);

// Check if connection is successful
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $regno = $_POST['regno'];
    $name = $_POST['name'];
    $totalAmount = $_POST['total_amount'];
    $paidAmount = $_POST['paid_amount'];

    // Insert the data into the database
    $query = "INSERT INTO fees (regno, name, total_amount, paid_amount) VALUES ('$regno', '$name', '$totalAmount', '$paidAmount')";

    if (mysqli_query($data, $query)) {
		echo "<script type='text/javascript'>
		alert('Student fee record Uploaded Successfully');
		</script>";
    } else {
        echo "Error: " . mysqli_error($data);
    }
}

// Close the database connection
mysqli_close($data);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Add Student Fee Record</title>
    <link rel="stylesheet" type="text/css" href="Admincss.php">
    <link rel="stylesheet" type="text/css" href="style3.css">
</head>
<body>
<?php

include 'Admincss.php';
include 'adminsidebar.php';

?>

    <center>
        <div class="content">
            <h2>Add Student Fee Record</h2>
            <form method="post">
                <label for="regno">ID Number:</label>
				<input type="text" id="regno" name="regno"
				pattern="[0-9]+" required><br>


                <label for="name">Name:</label>
                <input type="text" id="name" name="name" 
				pattern="[a-zA-Z-s ]"required><br>

                <label for="total_amount">Total Amount:</label>
                <input type="text" id="total_amount" name="total_amount" pattern="[0-9]+"required><br>

                <label for="paid_amount">Paid Amount:</label>
                <input type="text" id="paid_amount" name="paid_amount" pattern="[0-9]+"required><br>
				
				

                <input type="submit" value="Add Record">
            </form>
        </div>
    </center>
</body>
</html>
