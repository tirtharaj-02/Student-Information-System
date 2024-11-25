<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
}

include 'Admincss.php';
include 'adminsidebar.php';

// Database credentials
$host = "localhost";
$user = "root";
$password = "";
$dbname = "bcaproject";

// Create connection
$conn = mysqli_connect($host, $user, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to fetch teacher data
$sql = "SELECT * FROM teacher";

// Execute the query
$result = mysqli_query($conn, $sql);

// Check if there are any records in the result set
if (mysqli_num_rows($result) > 0) {
} else {
    // If there are no records in the result set, display an error message
    echo "No records found.";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
<style>
    .content {
        width: 50%;
        margin: 0 auto;
        text-align: center;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 8px;
        border: 2px solid black;
    }

    th {
        background-color: lightblue;
    }

    .table_th {
        font-weight: bolder;
    }

    .table_td {
        text-align: left;
        background-color: skyblue;
    }

    img {
        width: 80px;
        height: 80px;
    }
</style>


	<title>View Teacher Data</title> 

	</head>
    <body>

    <div class="content">
  <center>
    <h1>View Teacher Data</h1>
  </center>
  <div class="text-center">
    <table border="1px" class="table">
      <thead>
        <tr>
          <th class="table_th">Teacher Name</th>
          <th class="table_th">About Instructors</th>
          <th class="table_th">Image</th>
          <th class="table_th">Delete</th>
          <th class="table_th">Update</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td class='table_td'>" . $row['name'] . "</td>";
                echo "<td class='table_td'>" . $row['description'] . "</td>";
                echo "<td class='table_td'><img src='" . $row['image'] . "' alt='" . $row['name'] . "'></td>";
                echo "<td class='table_td'><a onclick=\"javascript:return confirm('Are you sure to delete this record?');\" href='delete_teacher.php?id={$row['id']}' class='btn btn-danger'>Delete</a></td>";
                echo "<td class='table_td'><a href='update_teacher.php?id={$row['id']}' class='btn btn-success'>Update</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No data found</td></tr>";
        }
    
        ?>
      </tbody>
    </table>
  </div>
</div>

    </tbody>
</table>

      
        </center>
   
    </body>
</html>