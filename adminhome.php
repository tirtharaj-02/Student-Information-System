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
    

?>


<!DOCTYPE html>
<html>
<head>
    <style>
        img{
            width: 70%;
            margin-left: 45px;
        }
        </style>
	
	<title>Admin Dashboard</title> 

	</head>
    <body>

	<?php

include 'Admincss.php';
include 'adminsidebar.php';

?>


   
    </body>
   <center>
   <div>
   <h1>Welcome To Admin Dashboard</h1>
   <img src="Dashboard.png" alt="Admin Dashboard">
</div>

</center>
</html>