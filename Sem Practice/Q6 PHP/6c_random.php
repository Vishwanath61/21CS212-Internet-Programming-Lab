<!DOCTYPE html>
<!--
Create a PHP script that generates a random number between 1 and 100 and 
prompts the user to guess the number. Provide feedback to the user if their 
guess is too high, too low, or correct.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Random Guess</title>
    </head>
    <body>
        <form method="post">
            Enter a Number:<input type="number" name="num"><br><br>
            <input type="submit" value="Submit">
        </form>
        <?php 
            $randomnumber= rand(1,100);
            echo "<script>console.log('$randomnumber');</script>";
        ?>
        <?php            
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $guess=$_POST['num'];
                if($guess==$randomnumber)
                    echo 'Congratulations! You guessed the correct number.';
                else if($guess>$randomnumber)
                    echo 'Guess is high';
                else
                    echo 'Guess is low';
            }
        ?>
    </body>
</html>
