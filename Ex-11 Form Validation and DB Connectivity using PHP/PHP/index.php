<!--
Question 6
Create a PHP form that collects user input for their name, email, and 
preferred date/time for an appointment. Perform form validation to ensure that all
fields are filled out and that the email is valid. Insert the data into a MySQL 
database table called "appointments". Finally, display a message to the user 
indicating whether the insertion was successful or not.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Appointment Scheduler</title>
    </head>
    <body>        
        <?php
        $success="";
        $name_err="";
        $mail_err="";
        $date_err="";
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {            
            $name=$_POST['name'];
            $mail=$_POST['email'];
            $date=$_POST['datetime'];
            if(empty(trim($name)))
            {
                $name_err='*Name field cannot be empty.';
            }
            if(!preg_match("/^[A-Za-z]+$/", trim($name)))
            {
                $name_err='*Name field should contain only letters.';
            }
            if(empty(trim($mail)))
            {
                $mail_err='*Email field cannot be empty.';
            }
            if(!filter_var(trim($mail),FILTER_VALIDATE_EMAIL))
            {
                $mail_err='*Please enter a valid Email.';
            }
            if(empty(trim($date)))
            {
                $date_err='*Please choose a date and time.';
            }
            if(empty($name_err)&&empty($date_err)&&empty($mail_err))
            {
                $servername="localhost";
                $username="root";
                $password="";
                $databasename="appointments";
                $conn=new mysqli($servername,$username,$password,$databasename);
                $sql="INSERT INTO appointments VALUES('$name','$mail','$date')";
                $conn->query($sql);
                $success='The details of '.$name.' are successfully inserted in the database';
                //$sql1="TRUNCATE TABLE appointments";
                //$conn->query($sql1);
                $conn->close();                
            }            
        }
        ?>
        <h1>Enter the details to Schedule an Appointment</h1><br><br><br>
        <div class="container">
            <form action="#" method="post">
                Name: <input type="text" name="name" placeholder="Enter your Name"><br><span style="color: red"><?php echo $name_err; ?></span><br><br>
                Email: <input type="email" name="email" placeholder="Enter your Email"><br><span style="color: red"><?php echo $mail_err; ?></span><br><br>
                Appointment Date & Time: <input type="datetime-local" name="datetime" placeholder="Choose date and time"><br><span style="color: red"><?php echo $date_err; ?></span><br><br>
                <input type="submit" value="Submit">
            </form>      
        </div><br><br>
        <h2><?php echo $success; ?></h2>        
    </body>
</html>
