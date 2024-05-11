<!--
1.Create a PHP form that collects user input for their address, city, and state.
Perform form validation to ensure that all fields are filled out and
that the state is a valid two-letter abbreviation.Insert the data into a MySQL database table called "addresses".
Finally, display a message to the user indicating whether the insertion was successful or not.
-->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $success="";
            $addrerr="";
            $cityerr="";
            $stateerr="";
            
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $addr=$_POST['address'];
                $city=$_POST['city'];
                $state=$_POST['state'];
                
                if(empty(trim($addr)))
                    $addrerr="*Address cannot be empty";
                if(empty(trim($city)))
                    $cityerr="*City cannot be empty";
                if(empty(trim($state)))
                    $stateerr="*State cannot be empty";
                else if(strlen($state)!=2 || !ctype_alpha($state))
                    $stateerr="*State is invalid";
                
                
                if(empty($addrerr) && empty($cityerr) && empty($stateerr))
                {
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $databasename="internet programming";

                    $conn=new mysqli($servername,$username,$password,$databasename);            
                    $conn->query("INSERT INTO addresses VALUES('$addr','$city','$state');");                
                    
                    $success="The record submitted is successfully inserted in the database.";
                }                
            }                        
        ?>
        <div class="container">
            <form action="#" method="post">
                Enter Address:<input type="text" placeholder="Enter Address" name="address"><br><span style="color: red"><?php echo $addrerr; ?></span><br><br>
                Enter City:<input type="text" placeholder="Enter City" name="city"><br><span style="color: red"><?php echo $cityerr; ?></span><br><br>
                Enter State:<input type="text" placeholder="Enter State" name="state"><br><span style="color: red"><?php echo $stateerr; ?></span><br><br>
                <input type="submit" value="SUBMIT">
            </form><br><br><br>
            <h1><?php echo $success; ?></h1>
        </div>
    </body>
</html>
