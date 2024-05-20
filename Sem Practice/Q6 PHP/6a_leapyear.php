<!DOCTYPE html>
<!--
Create a PHP script that prompts the user to input a year and checks whether 
it's a leap year or not.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Leap Year</title>
    </head>
    <body>
        <form method="post">
            Enter a Year:<input type="number" name="num"><br>
            <input type="submit" value="Submit">
        </form>
        <?php
            if($_SERVER["REQUEST_METHOD"]=="POST"){
                $year=$_POST['num'];
                if(($year%4==0 && $year%100!=0)||($year%400==0))
                    echo 'Leap Year';
                else
                    echo 'Not a Leap year';
            }
        ?>
    </body>
</html>
