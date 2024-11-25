<?php
    // Check if the delete button is clicked
    if (isset($_GET['id'])) {
        $teacher_id = $_GET['id'];

         // Database credentials
            $host = "localhost";
            $user = "root";
            $password = "";
            $dbname = "bcaproject";
    
        
        // Connect to the database
        $connection = mysqli_connect($host, $user, $password, $dbname);

        // Delete the teacher from the database
        $query = "DELETE FROM teacher WHERE id = '$teacher_id'";
        mysqli_query($connection, $query);

        // Close the database connection
        mysqli_close($connection);

        // Redirect the user back to the teacher list page
        header("Location: view_teacher.php");
    }
?>

<!-- Display the table of teachers -->
<table class="table">
    <thead>
        <tr>
            <th>Teacher Name</th>
            <th>About Instructors</th>
            <th>Image</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // Connect to the database
            $connection = mysqli_connect('localhost', 'username', 'password', 'database_name');

            // Fetch all teachers from the database
            $query = "SELECT * FROM teachers";
            $result = mysqli_query($connection, $query);

            // Loop through each teacher and display their details in a row
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>"></td>
            <td class="btn btn-success">
                <a href="view_teacher.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this teacher?')">Delete</a>
            </td>
        </tr>
        <?php
            }

            // Close the database connection
            mysqli_close($connection);
        ?>
    </tbody>
</table>
