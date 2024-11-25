<?php
// error_reporting(0);
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    exit();
} elseif ($_SESSION['usertype'] == 'student') {
    header("location:login.php");
    exit();
}

$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";
$data = mysqli_connect($host, $user, $password, $db);

if (isset($_POST['addstudent'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 
    $usertype = "student";
    // Get the image file name
    $image = $_FILES['image']['name'];

    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user = mysqli_query($data, $check);
    $row_count = mysqli_num_rows($check_user);

    if ($row_count == 1) {
        echo "<script type='text/javascript'>
                alert('Username already exists.');
                </script>";
    } else {
        // Upload image file
        $file = $_FILES['image']['name'];
        $dst = "./image/" . $file;
        $dst_db = "image/" . $file;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $dst)) {
            $sql = "INSERT INTO user (username, phone, email, usertype, password, image) VALUES ('$username', '$phone', '$email', '$usertype', '$password', '$dst_db')";
            $result = mysqli_query($data, $sql);

            if ($result) {
                echo "<script type='text/javascript'>
                        alert('Student Data Uploaded Successfully');
                        </script>";
            } else {
                echo "Student Data Upload Failed";
            }
        } else {
            echo "Failed to upload the image file.";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <style>
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: auto;
            width: fit-content;
            font-family: Arial, sans-serif;
            background-color: skyblue;
            padding-bottom: 10px;
            padding-top: 20px;
            border-radius: 20px;
        }

        div {
            margin-bottom: 25px;
        }

        label {
            margin-left: 10px;
            font-weight: bold;
            font-size: 15px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="password"] {
            width: 250px;
            padding: 10px;
            border-radius: 20px;
            border: 1px solid black;
            margin-right: 10px;
            font-size: 15px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            padding: 10px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            color: white;
        }

        input[type="submit"]:hover {
            background-color: orange;
        }
    </style>
    <title>Add Student</title>
</head>
<body>
    <center>
        <div class="content">
            <?php
                include 'Admincss.php';
                include 'adminsidebar.php';
            ?>
            <h2>Add Student</h2>
            <form action="#" method="post" enctype="multipart/form-data">
                <div>
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" 
					 pattern="[a-zA-Z0-9\s]+" required>
                </div>

                <div>
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                </div>

                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div>
                    <label for="image">Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required>
                </div>

                <div>
                    <input type="submit" name="addstudent" value="Add Student">
                </div>
            </form>
        </div>
    </center>
</body>
</html>
