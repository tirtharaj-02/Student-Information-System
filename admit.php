<?php
session_start();

// Establish database connection
$host = "localhost";
$user = "root";
$password = "";
$db = "bcaproject";
$data = mysqli_connect($host, $user, $password, $db);

// Check if connection is successful
if (!$data) {
    die("Connection error: " . mysqli_connect_error());
}

// Process admission form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Sanitize and validate user inputs
    $firstname = isset($_POST['firstname']) ? htmlspecialchars(trim($_POST['firstname'])) : null;
    $middlename = isset($_POST['middlename']) ? htmlspecialchars(trim($_POST['middlename'])) : null;
    $lastname = isset($_POST['lastname']) ? htmlspecialchars(trim($_POST['lastname'])) : null;
    $email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) : null;
    $phone = isset($_POST['phone']) ? htmlspecialchars(trim($_POST['phone'])) : null;
    $dob = isset($_POST['dob']) ? htmlspecialchars(trim($_POST['dob'])) : null;
    $gender = isset($_POST['gender']) ? htmlspecialchars(trim($_POST['gender'])) : null;
    $address = isset($_POST['address']) ? htmlspecialchars(trim($_POST['address'])) : null;

    // Insert user data into database
    $sql = "INSERT INTO admission (firstname, middlename, lastname, email, phone, dob, gender, address) 
            VALUES ('$firstname', '$middlename', '$lastname', '$email', '$phone', 
            '$dob', '$gender', '$address')";
    $result = mysqli_query($data, $sql);

    if ($result) {
        // Show success message
        echo "<script type='text/javascript'>
                alert('Form was submitted successfully...');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        // Show error message
        echo "<script type='text/javascript'>
                alert('Submission failed...');
                window.location.href = 'index.php';
              </script>";
        exit();
    }
}
?>




<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <style>
        .center {
            text-align: right;
        }

        .adm {
            font-size: 36px;
            font-weight: lighter;
            margin-bottom: 30px;
        }

        .addmission_form {
            width: 300px;
            background-color: darkcyan;
            padding: 20px;
            border-radius: 30px;
        }

        .adm_int {
            margin-bottom: 10px;
            margin-right: 20px;
            display: flex;
            flex-direction: column;
        }

        .input_deg {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #e8e8e8;
            font-size: 16px;
        }

        select option[value=""] {
            color: #e8e8e8;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
            height: 80px;
            resize: none;
        }
    </style>
	<script>
    function validateForm() {
        var firstName = document.getElementById("firstname").value;
        var middleName = document.getElementById("middlename").value;
        var lastName = document.getElementById("lastname").value;
        var address = document.getElementById("address").value;
        var dobInput = document.getElementById("dob");
        var dob = new Date(dobInput.value);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();

        // Check if the birthday has occurred this year
        if (today.getMonth() < dob.getMonth() || (today.getMonth() == dob.getMonth() && today.getDate() < dob.getDate())) {
            age--;
        }

        var regex = /^[a-zA-Z]+$/;

        if (!regex.test(firstName)) {
            alert("First name should contain only alphabetic characters.");
            return false;
        }

        if (!regex.test(middleName)) {
            alert("Middle name should contain only alphabetic characters.");
            return false;
        }

        if (!regex.test(lastName)) {
            alert("Last name should contain only alphabetic characters.");
            return false;
        }
		

        if (age < 6) {
            alert("Age must be greater than 6 years.");
            return false;
        }

        return true;
		
		if (!regex.test(address)) {
            alert("Address should contain only alphabetic characters.");
            return false;
        }
    }
</script>

</head>
<body>

    <center>
        <h1 class="adm">Registration Form </h1>
        <div align="center" class="addmission_form">
            <form action="" method="post" onsubmit="return validateForm()">
                <div class="adm_int">
                    <label class="label_text">First Name:</label>
                    <input class="input_deg" type="text" name="firstname" id="firstname" required>
                </div>
                <div class="adm_int">
                    <label class="label_text">Middle Name:</label>
                    <input class="input_deg" type="text" name="middlename" 
					id="middlename" required >
                </div>
                <div class="adm_int">
                    <label class="label_text">Last Name:</label>
                    <input class="input_deg" type="text" name="lastname" id="lastname" required>
                </div>
					<div class="adm_int">
						<label class="label_text">Email</label>
						<input class="input_deg" type="text" id="email" name="email" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" required>
					</div>

                <div class="adm_int">
                    <label class="label_text">Phone </label>
                    <input class="input_deg" type="text" name="phone" pattern="[0-9]{10}" required>
                </div>
                <div class="adm_int">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="adm_int">
                    <label for="gender">Gender:</label>
                    <select name="gender" required>
                        <option value="">--</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="adm_int">
                    <label for="address">Address:</label>
                    <textarea name="address" id="address" required></textarea>
                </div>
                <div>
                    <input class="btn btn-info" id="submit" type="submit" value="submit" name="submit">
                </div>
            </form>
        </div>
    </center>
</body>
</html>
