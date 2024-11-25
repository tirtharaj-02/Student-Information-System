<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";

$data = mysqli_connect($host, $user, $password, $db);

$id = $_GET['student_id'];
$sql = "SELECT * FROM user WHERE id= '$id'";
$result = mysqli_query($data, $sql);

$jack = mysqli_fetch_assoc($result);

if (isset($_POST['update'])) {
    $name = mysqli_real_escape_string($data, $_POST['username']);
    $email = mysqli_real_escape_string($data, $_POST['email']);
    $phone = mysqli_real_escape_string($data, $_POST['phone']);
    $password = mysqli_real_escape_string($data, $_POST['password']); // Use the raw password directly

    // Check if the username already exists for another user
    $check_query = "SELECT id FROM user WHERE username='$name' AND id != '$id'";
    $check_result = mysqli_query($data, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Username already exists
        echo "<script type='text/javascript'>
                alert('Username already exists! Please choose a different username.');
                window.history.back();
            </script>";
    } else {
        // Proceed to update the user data
        $query = "UPDATE user SET username='$name', email='$email', phone='$phone', password='$password' WHERE id='$id'";

        $result2 = mysqli_query($data, $query);

        if ($result2) {
            echo "<script type='text/javascript'>
                    alert('Student Data Updated Successfully');
                    window.location.href = 'view_student.php';
                </script>";
        } else {
            echo "<script type='text/javascript'>
                    alert('Failed to update student data. Please try again.');
                    window.history.back();
                </script>";
        }
    }
}
?>


<?php include 'adminsidebar.php'; ?>

<?php include 'Admincss.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
          crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
          crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <meta charset="utf-8">
    <title>Update Student form</title>
    <style>
        form {
            max-width: 500px;
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: dodgerblue;
        }

        label {
            display: initial;
            font-weight: italic;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            display: block;
            width: 80%;
            padding: 8px;
            margin-bottom: 20px;
            text-align: left;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            box-sizing: border-box;
        }

        input[type="button"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 15px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<center>
    <div class="content">
        <h2>Update Student</h2>
        <form action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required value='<?php echo "{$jack['username']}"; ?>' pattern="[a-zA-Z0-9\s]+" >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required value='<?php echo "{$jack['email']}"; ?>'>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required
                   value='<?php echo "{$jack['phone']}"; ?>'>

            <label for="password">Password:</label>
            <input type="text" id="password" name="password" required value='<?php echo "{$jack['password']}"; ?>'>

            <input type="submit" class="btn btn-success" name="update" value="Update">

            <input type="button" class="btn btn-warning" onClick="location.href='view_student.php'" value='exit'>
        </form>
    </div>
</center>
</body>
</html>
