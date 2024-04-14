<!DOCTYPE html>
<html>
<head>
    <title>Age Categorization</title>
</head>
<body>
    <h2>Age Categorization</h2>
    <form method="post">
        Enter your age: <input type="text" name="age"><br><br>
        <input type="submit" value="Submit"><br><br>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $age = $_POST['age'];
        if ($age < 13) {
            echo "You are a child.";
        } elseif ($age >= 13 && $age < 20) {
            echo "You are a teenager.";
        } elseif ($age >= 20 && $age < 60) {
            echo "You are an adult.";
        } else {
            echo "You are a senior citizen.";
        }
    }
    ?>
</body>
</html>
