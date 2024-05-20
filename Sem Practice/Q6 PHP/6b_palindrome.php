<!DOCTYPE html>
<!--
 Create a PHP script that checks whether a given number is a palindrome or not 
using loops.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Palindrome</title>
    </head>
    <body>
        <form method="post">
            Enter a number:<input type="number" name="num"><br>
            <input type="submit" value="Submit">
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $num=$_POST['num'];
            $rev=0;
            $n=$num;
            while($n>0)
            {
                $rem=$n%10;
                $rev=$rev*10+$rem;
                $n=(int)($n/10);
            }
            if($num==$rev)
                echo 'Palindrome';
            else
                echo 'Not a Palindrome';
        }
        ?>
    </body>
</html>
