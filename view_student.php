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
    
    // Database connection
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "bcaproject";

    $conn = mysqli_connect($host, $user, $password, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve data from database
    $sql = "SELECT * FROM user where usertype= 'student' ";
    $result = mysqli_query($conn, $sql);

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
    <meta charset="utf-8">
    <title>Admin Dashboard</title> 
</head>
<body>
    <?php
        include 'Admincss.php';
    ?>

    <?php
        include 'adminsidebar.php';
    ?>
    
        <div class="content">
        <center>
    <h1> Student Data</h1>
    
    <table border="1px" class="table">
        <tr>
            <th class="table_th">Username</th>
            <th class="table_th">Email</th>
            <th class="table_th">Phone</th>
            <th class="table_th">Password</th>
            <th class="table_th">image</th>
            <th class="table_th">Delete</th>
            <th class="table_th">Update</th>
        </tr>
        <?php
        // Display data from database
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {   
                echo "<tr>";
                echo "<td class='table_td'>" . $row['username'] . "</td>";
                echo "<td class='table_td'>" . $row['email'] . "</td>";
                echo "<td class='table_td'>" . $row['phone'] . "</td>";
                echo "<td class='table_td'>" . str_repeat('#', 15) . substr($row['password'], 15) . "</td>";
                echo "<td class='table_td'><img src='" . $row['image'] . "' alt='" . $row['username'] . "'></td>";
                echo "<td class='table_td'><a onclick=\"javascript:return confirm('Are you sure to delete this record?');\" href='delete.php?student_id={$row['username']}' class='btn btn-danger'>Delete</a>
                
                </td>";
                
                
                echo "<td class='table_td'><a href='updatestudent.php?student_id={$row['id']}' class='btn btn-success'>Update</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No data found</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
</center>

                    </div>
                
</body>
</html>
