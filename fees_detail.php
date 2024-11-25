<?php
error_reporting(0);
session_start();

// Connect to database
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";
$conn = mysqli_connect($host, $user, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Select data from table
$sql = "SELECT * FROM `fees`"; // Removed unnecessary space after table name
$result = mysqli_query($conn, $sql);

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Student Dashboard</title>
    <style>
        table {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            font-family: Arial, sans-serif;
            font-size: 20px;
        }
        
        th,
        td {
            border: 1px solid;
            padding: 8px;
            text-align: left;
            background-color: lightblue;
            border-color: black;
        }
        
        th {
            background-color: skyblue;
            font-weight: bold;
        }
        
        h1 {
            font-style: normal;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="">
    <div>
        <?php include 'studentcss.php'; ?>
        <?php include 'studentsidebar.php'; ?>
    </div>
</head>

<body>
    <center>
        <div class="content">
            <h1 style="text-align:center"> Fees Details</h1>
            <?php
// Assuming $result contains the student fee records fetched from the database

echo "<table>";
echo "<tr><th>ID Number</th><th>Name</th><th>Total Amount</th><th>Paid Amount</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["regno"] . "</td>";
    echo "<td>" . $row["name"] . "</td>";
    echo "<td>" . $row["total_amount"] . "</td>";
    echo "<td>" . $row["paid_amount"] . "</td>";
	
    echo "</tr>";
}

echo "</table>";
?>



        </div>
    </center>
</body>

</html>
