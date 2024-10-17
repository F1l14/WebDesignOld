<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <?php include("header.html")?>
    <link rel="stylesheet" href="style.css">
This is the Homepage
<hr>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
        <input type="submit" name="logout" value="Logout">
    </form>

    <article>
        <h2>Items</h2>
        <ol>
            <li>bread</li>
            <li>spoons
                <ul>
                    <li>long</li>
                    <li>short</li>
                </ul>
            </li>
            <li>food</li>
        </ol>
    </article>


    <article>
        <h2>Personnel</h2>
        <ul>
            <li>James</li>
            <li>Jonathan</li>
            <li>Lilly</li>
        </ul>
    </article>
</body>
</html>
<?php
    if(isset($_POST["logout"])){
        session_destroy();
        header("Location:index.php");
    }
?>