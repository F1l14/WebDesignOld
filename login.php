<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <a href="https://www.youtube.com">
        <img src="imgs/ceid.jpg" height="100" title="Ceid logo">
    </a>
    <br>
</head>
<body>
    <a href="index.html" target="_self">
        Home
    </a>
    <br>
    

    <form action="login.php" method="POST">

            <label for="username">Username<br></label>
            <input type="text" name="username" placeholder="Test Name" maxlength="12">
            <br>

       
            <label for="pass">Password<br></label>
            <input type="password" name="pass" placeholder="test" maxlength="12">
        
            <input type="reset" value="Clear">
            <input type="submit" name=login value="Login">
       
    </form>

    <br>
    <button>
        Reload
    </button>
    <br>



</body>


</html>

<?php
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        //filtering malicious code as credentials
        $usr = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $pass= filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //checking if login button is pressed before showing error or ok
        if(isset($_POST["login"])){
            if(empty($usr)||empty($pass)){
                echo "Missing credentials";
            }
            else echo "ok";
        }
    }
?>