<?php
session_start();



include 'studentcss.php';

include 'studentsidebar.php';

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

// Fetch data from the database
$sql = "SELECT * FROM grades";
$result = mysqli_query($data, $sql);

// Close the database connection
mysqli_close($data);

?>


<!DOCTYPE html>
<html>
 <head>

 <title> View Record </title>

 <style>
    table {
  
  width: 60%;
  border: 1px solid black;
}

th, td {
  text-align: left;
  padding: 8px;
}

th {
  background-color: skyblue;
  
}

td {
  border: 1px solid black;
}


 </style>

    </head>
    <body>
        <div class="content">
            <center>
            <h1> Academic Record </h1>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Faculty</th>
                        <th>Semester</th>
                        <th>Subject</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['faculty']; ?></td>
                        <td><?php echo $row['semester']; ?></td>
                        <td><?php echo $row['subject']; ?></td>
                        <td><?php echo $row['grade']; ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </center>
        </div>
</body>
</html>
