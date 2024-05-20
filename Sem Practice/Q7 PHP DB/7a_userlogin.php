<!--
Build a login form using HTML and PHP that allows users to enter their email 
address and password, and checks this information against the database to 
authenticate them. Validate the Form using PHP regular expressions.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>User Login</title>
        <style>
            span{
                color: red;
            }
        </style>
    </head>
    <body>
        <?php
            $unameerr="";
            $pwderr="";
            $result="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $uname=$_POST['uname'];
                $pwd=$_POST['pwd'];
                if(empty(trim($uname)))
                    $unameerr="*Username cannot be empty";
                else if(!preg_match("/^[A-Za-z]+$/", $uname))
                        $uname="*Invalid Username";
                if(empty(trim($pwd)))
                    $pwderr="*Password cannot be empty";
                if(empty($unameerr) && empty($pwderr))      
                {
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $databasename="internet programming";
                    $conn=new mysqli($servername,$username,$password,$databasename);
                    $sql="Select password FROM usertable WHERE name='$uname'";
                    $result=$conn->query($sql);
                    if($result->num_rows>0)
                    {
                        $row=$result->fetch_assoc();
                        $pass=$row['password'];
                        if($pass===$pwd)
                            $result="Success";
                        else
                            $result="Invalid Password";
                    }
                    else
                        $result="Username not found";
                    $conn->close();
                }
            }
        ?>
        <form method="post">
            Username:<input type="text" name="uname"><br><span><?php echo $unameerr; ?></span><br><br>
            Password:<input type="password" name="pwd"><br><span><?php echo $pwderr;?></span><br><br>
            <input type="submit" value="Submit">
        </form>
        <div><?php echo $result; ?></div>
    </body>
</html>
