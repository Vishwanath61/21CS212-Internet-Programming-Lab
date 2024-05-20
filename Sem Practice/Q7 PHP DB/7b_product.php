<!--
Build a product order form using HTML and PHP that allows users to select a 
product, enter a quantity, and submit the order to be stored in a MySQL 
database. Validate the Form using PHP regular expressions.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Product PHP</title>
    </head>
    <body>
        <?php
            $pderr="";
            $qterr="";
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                $pd=$_POST['pd'];
                $qt=$_POST['qt'];                
                if(empty(trim($pd)))
                    $pderr="Name cannot be empty";
                else if(!preg_match("/^[A-Za-z]+$/", $pd))
                    $pderr="Invalid Product name";   
                if(empty(trim($qt)))
                    $qterr="Quantity cannot be empty";
                if(empty($pderr) && empty($qterr))
                {
                    $servername="localhost";
                    $username="root";
                    $password="";
                    $databasename="internet programming";
                    $conn=new mysqli($servername,$username,$password,$databasename);
                    $sql="INSERT INTO `order` (product,quantity) VALUES('$pd',$qt)";
                    $conn->query($sql);
                    $conn->close();                    
                }
            }            
        ?>
        <form method="post">
            Product name:<input type="text" name="pd"><br><span style="color: red"><?php echo $pderr; ?></span><br><br>
            Quantity:<input type="number" name="qt"><br><span style="color: red"><?php echo $qterr; ?></span><br><br>
            <input type="submit" value="Submit">
        </form>
    </body>
</html>
