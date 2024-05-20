<!--
Build a PHP script that prompts the user to input a password and checks its 
strength based on criteria such as length, presence of special characters, 
uppercase and lowercase letters, and numbers.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Password PHP</title>
    </head>
    <body>
        <form method="post">
            Enter password:<input type="password" name="pwd"><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $pwd=$_POST['pwd'];
                $len= strlen($pwd)>=8;
                $special= preg_match('/[!@#$%^&*()~`]/', $pwd);
                $upper= preg_match('/[A-Z]/', $pwd);
                $lower= preg_match('/[a-z]/', $pwd);
                $numb= preg_match('/\d/', $pwd);
                if($len && $special && $upper && $lower && $numb)
                    echo 'Strong';
                else
                    echo 'Weak';
            }
        ?>
    </body>
</html>
