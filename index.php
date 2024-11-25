<?php

    error_reporting(0);
    session_start();
    session_destroy();
    
    if($_SESSION['message'])
    {

        $message=$_SESSION['message'];
        echo " <script type='text/javascript'>
        
        alert('$message');
        
        </script>";
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="bcaproject";
    
    $data= mysqli_connect($host,$user,$password,$db);
    
    $sql="SELECT * FROM teacher";
    $result= mysqli_query($data,$sql);
    

?>



<!DOCTYPE html>
    <html>
    <head>
        <title>
            Student Information System 
        </title>
        <link rel="stylesheet" type="text/css" href="index.css">
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav>
            <label class="logo"> Student Information System</label>
            <ul>
           <li> <a href="Search_Algo.php" class="fa fa-search" aria-hidden="true"> Search</a></li>

    
                   <li> <a href="calendar.php" class="fa fa-calendar" aria-hidden="true"> Calendar</a> </li>

                 <li>  <a  href="info.php" class="fa fa-info" aria-hidden="true"> Info</a> </li>

                 <li>  <a  href="admit.php" class="fa fa-registered" aria-hidden="true"> Verify</a> </li>

                   <li> <a href=" login.php" class="btn btn-success"> Login</a> </li>
            </ul>


        </nav>
        <div class="section1">
        <label class="img_text"></label>
            <img class="main_img" src="sms3.jpg">

        </div>
        <div class="container">


            <div class="row">

                <div class="col-md-4">
                    <img class="welcome_img" src="kcmit1.jpg">

                </div>

                <div class="col-md-8">
                    <p> 
                    "Welcome to College"used to greet incoming college students and introduce them to the campus community. It marks the beginning of a new academic journey and serves as an important milestone in a student's life. The welcome process typically involves orientation programs, campus tours, and informational sessions to help new students navigate campus resources, meet faculty and staff, and get a sense of the college culture. The goal is to ensure that students feel comfortable and supported as they begin their college experience, and to set them up for success both academically and socially.
                    </p>
                     
                </div>

            </div>
        </div>
</br>
        <center>
            <h1> Instructors</h1>
        
            <div class="container">
                    <div class="row">
                        <?php 
                        while ($info = $result->fetch_assoc()) {
                        ?>
                        <div class="col-md-4">
                            <img class="teacher" src="<?php echo $info['image']; ?>">
                            <h3><?php echo $info['name']; ?></h3>
                            <h5><?php echo $info['description']; ?></h5>
                        </div>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
        </center>
                <center>
            <h3> Courses</h3>
             
        <div class="container">


            <div class="row">

                <div class="col-md-4">
                    <img class="teacher" src="bca.jpg">
                    
                    

                </div>
                <div class="col-md-4">
                    <img class="teacher" src="bim.jpg">
                    
                    

                </div>
                <div class="col-md-4">
                    <img class="teacher" src="bba.png">
                    
                    
                </div>
               
                </center>

                </div>
               

    </body>

    </html>