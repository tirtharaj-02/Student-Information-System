<?php
session_start();

if(!isset($_SESSION['username']))
{
    header("location:login.php");
}
elseif($_SESSION['usertype']=='admin')
{
    header("location:login.php");
}
include 'studentcss.php';
include 'studentsidebar.php';


?>


<!DOCTYPE html>
<html>
    <head>
        <title>Student Dashboard</title>
    </head>
    <body>

    </body>
</html>
