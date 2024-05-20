<!DOCTYPE html>
<!--
Create a contact form using HTML and PHP that allows users to submit their 
name, email address, and message, and stores this information in a MySQL 
database. Validate the Form using PHP regular expressions
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact us</title>
        <style>
            span{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
            $nameerr="";
            $mailerr="";
            $meserr="";
            $success="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $name=$_POST['name'];
                $mail=$_POST['mail'];
                $mes=$_POST['mes'];
                if(empty(trim($name)))
                    $nameerr="*Name cannot be empty";
                else if(!preg_match("/^[A-Za-z]+$/", $name))
                     $nameerr="*Invalid Name";
                if(empty(trim($mail)))
                    $mailerr="*Mail cannot be empty";
                else if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
                    $mailerr="*Invalid Mail";
                if(empty(trim($mes)))
                    $meserr="*Message cannot be empty";
                if(empty(trim($nameerr))&& empty(trim($mailerr))&&empty(trim($meserr)))
                {
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $databasename="internet programming";
                    $conn=new mysqli($servername,$username,$password,$databasename);
                    $sql="INSERT into contact(name,mail,message) values ('$name','$mail','$mes')";
                    $conn->query($sql);
                    $conn->close();
                    $success="Successfully Inserted";
                }
            }
        ?>
        <form method="post">
            Name:<input type="text" name="name"><br><span><?php echo $nameerr; ?></span><br><br>
            Email:<input type="email" name="mail"><br><span><?php echo $mailerr; ?></span><br><br>
            Message:<textarea name="mes"></textarea><br><span><?php echo $meserr; ?></span><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
