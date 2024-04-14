<!DOCTYPE html>
<html>
<head>
    <title>GCD Calculator</title>
</head>
<body>
    <h2>GCD Calculator</h2>
    <form method="post">
        Enter the first number: <input type="text" name="num1" required><br><br>
	    Enter the second number: <input type="text" name="num2" required><br><br>
        <input type="submit" value="Calculate GCD"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];
        function GCD($num1, $num2) {
            $num1 = abs($num1);
            $num2 = abs($num2);
            while ($num2) {
                $temp = $num2;
                $num2 = $num1 % $num2;
                $num1 = $temp;
            }
            return $num1;
        }
            $gcd = GCD($num1, $num2);
            echo "<p>The GCD of $num1 and $num2 is: $gcd</p>";
        }
    ?>
</body>
</html>
