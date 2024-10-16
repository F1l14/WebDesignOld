<?php
    session_start();
?><!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
        <title>NDP</title>
        <?php include("header.html")?>
    </head>
    <header>
    <h1>Natural Disasters Panel</h1>
    Test
    </header>
    <body>
        <!--Comment-->
        
        <hr>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque ullam, iure laboriosam veritatis debitis tenetur ab dolore suscipit. Iure enim dicta veritatis obcaecati aspernatur officia voluptatum labore vero maxime temporibus.</p>
        Body text


        <a href="https://www.google.com" target=_self title="This takes you to google">
            Google
        </a>
        <br>
        <a href="login.php" target=_self title="Takes you to login page">
            Login<br>
        </a>
    </body>
</html>

<?php
    //if session exists redirect to homepage
    if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
        header("Location:homepage.php");
    }
?>