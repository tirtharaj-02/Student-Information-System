<?php
session_start();
error_reporting(0);

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

// Database credentials
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

if(isset($_GET['id']))
{
    $t_id = $_GET['id'];
    $sql = "SELECT * FROM teacher WHERE id='$t_id'";
    $result = mysqli_query($data, $sql);
    if (!$result) {
        die("Error executing query: " . mysqli_error($data));
    }
    $info = $result->fetch_assoc();        
}

if(isset($_POST['update_teacher']))
{
    $id= $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    
        $file = $_FILES['image']['name'];
        $dst = "./image/".$file;
        $dst_db = "image/".$file;
        move_uploaded_file($_FILES['image']['tmp_name'],$dst);

        if($file)
        {
          // Update image path in the database
          $sql2 = "UPDATE teacher SET name='$name', description='$description', image='$dst_db' WHERE id='$id'";
        }
        else {
            // Keep old image path in the database
            $sql2 = "UPDATE teacher SET name='$name', description='$description'  WHERE id='$id'";
        }
    
    $result2 = mysqli_query($data,$sql2);

    if($result2) {
        echo "<script>alert('Update success');</script>";
        header("location: view_teacher.php");
    } 
    

}
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>Admin Dashboard</title> 
    <style type="text/css">
        label{
            display:inline-flexbox;
            width: 150px;
            text-align: right;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .form_deg
        {
            background-color: plum;
            width: 500px;
            padding-top: 50px;
            padding-bottom: 7px;
        }
    </style>
</head>
<body>
    <div class="content">
        <center>
            <h1> Update Teacher Data</h1>
            
            <form class="form_deg" action="#" method="POST" enctype="multipart/form-data">
                <input type="text" name="id" value="<?php echo $info['id'] ?>" hidden>
                <div>
                    <label>Teacher Name</label>
                    <input type="text" name="name" value="<?php echo $info['name'] ?>" pattern="[A-Za-z\s]+">
                </div>

                <div>
                    <label>About Teacher</label>
                    <textarea name="description" rows="4"><?php echo $info['description'] ?></textarea>
                </div>

                <div>
                    <label>Old Image</label>
                    <img width="100px" height="100px" src="<?php echo $info['image'] ?>">
                </div>

                <div>
                    <label>New Image</label>
                    <input type="file" name="image">
                </div>

                <div>
                    <input type="submit" name="update_teacher" value=" update_teacher" class="btn btn-success">
                </div>
            </form>

        </center>
    </div>
</body>
</html>
