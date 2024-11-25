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
	<style>
	img{
            width: 40%;
			height: 60%;
            margin-left: 320px;
        }
		h2{
			margin-left:320px;
		}
	</style>

	</head>
    <body>
	 <div>
   <h2>Welcome To Student Dashboard</h2>
   <img src="student.png" alt="Student Dashboard">
</div>


</body>
</html>