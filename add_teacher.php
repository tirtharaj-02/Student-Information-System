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

$host= "localhost";
$user= "root";
$password= "";
$db= "bcaproject";

$data = mysqli_connect($host, $user, $password, $db);

if(isset($_POST['add_teacher'])){

    $t_name = $_POST['name'];

    $t_description = $_POST['description'];

    $file =$_FILES['image']['name'];

    $dst= "./image/".$file;
    $dst_db = "image/".$file;

    move_uploaded_file($_FILES['image']['tmp_name'], $dst);

    $sql= "INSERT INTO teacher (name, description, image) values ('$t_name', '$t_description', '$dst_db')";

    $result= mysqli_query($data,$sql);

    if ($result) {
        header('location:add_teacher.php');
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        .content {
      margin-top: 35px; 
     }

      form {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 35%;
        margin: 0 auto;
        padding: 12px;
        background-color: paleturquoise;
        border-radius: 25px;
      }

      label {
        font-size: 15px;
        font-weight: bold;
        margin-bottom: 10px;
      }
      .my-textarea-class {
          padding: 10px;
        margin-bottom: 15px;
        width: 70%;
        border-radius: 20px;
        border: none;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2); 
      }
      input[type="file"] {
        padding: 10px;
        margin-bottom: 15px;
        width: 80%;
        border-radius: 20px;
        border: none;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
        overflow: visible;
        background-color: whitesmoke;
      }


      input[type="text"]
      {
        padding: 10px;
        margin-bottom: 15px;
        width: 70%;
        border-radius: 20px;
        border: none;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
      }

      input[type="submit"] {
        padding: 10px 20px;
        background-color: #4CAF50;
        border: none;
        border-radius: 30px;
        font-size: 18px;
        cursor: pointer;
        color: white;
      }

      input[type="submit"]:hover {
        background-color: orange;
      }

    </style> 

    </head>
    <body>

    <center>
   

    <div class= "content">
    
    <h1> Add Teacher</h1>
    </div>
    <div>

    <form action="#" method="POST" enctype="multipart/form-data">

    <div>
    <label> Teacher Name:</label>
    <input type="text" name="name" pattern="[A-Za-z\s]+" required title="Only alphabets and spaces are 
    allowed.">


    </div>
    <br>

    <div>
    <label> Description:</label>
    <textarea name="description" class="my-textarea-class" required></textarea>

    </div>
    <br>

    <div>
    <label> Image:</label>
    <input type="file" name="image">
    </div>
    <br>
    <div>

    <input type="submit" name="add_teacher" value="Add Teacher" >
    </div>
    </form>
    </div>


    </center>
    </body>
</html>