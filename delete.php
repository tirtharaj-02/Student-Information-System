<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";

$conn = mysqli_connect($host, $user, $password, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if student_id is set and not empty
if (isset($_GET['student_id']) && !empty($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    // Delete student record from user table
    $sql = "DELETE FROM user WHERE username='$student_id'";

    if (mysqli_query($conn, $sql)) {
         header("location: view_student.php");
    } else {
        echo '<div class="alert alert-danger" role="alert">Error deleting record: ' . mysqli_error($conn) . '</div>';
    }
} else {
    echo '<div class="alert alert-danger" role="alert">Invalid student ID</div>';
}

mysqli_close($conn);
?>
