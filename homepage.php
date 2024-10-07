<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

This is the Homepage
<hr>
</head>
<body>
    <form action="homepage.php" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>
<?php
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location:index.php");
    }
?>