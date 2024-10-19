<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <a href="https://www.youtube.com">
        <img src="imgs/ceid.jpg" height="100" title="Ceid logo">
    </a>
    <br>
</head>
<body>
    <a href="index.php" target="_self">
        Home
    </a>
    <br>
    
    <!--php section gets the current page name with a filter for special characters-->
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">

            <label for="username">Username<br></label>
            <input type="text" name="username" placeholder="Test Name" maxlength="12">
            <br>

       
            <label for="pass">Password<br></label>
            <input type="password" name="pass" placeholder="test" maxlength="12">
        
            <input type="reset" value="Clear">
            <input type="submit" name=login value="Login">
       
    </form>




</body>


</html>

<?php
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        //filtering malicious code as credentials
        $usr = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $pass= filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);
        
        //checking if login button is pressed before showing error or ok
        if(isset($_POST["login"])){
            if(!empty($usr) && !empty($pass)){
                $result="";
                include("dbconn.php");
                
                
                $compare_pass = $conn->prepare("SELECT password FROM users WHERE username = ?");
                $compare_pass->bind_param("s", $usr);
                try{
                    $compare_pass->execute();
                    $result= $compare_pass->get_result();
                    
                }catch (mysqli_sql_exception){
                    echo "SQL error";
                }

                if(mysqli_num_rows($result)>0){
                    if(password_verify($pass, mysqli_fetch_assoc($result)["password"])){
                        echo "correct password" . "<br>";
                        $_SESSION["username"] = $usr;
                        // hashing the password with bcrypt and storing it in session
                        $_SESSION["password"] = password_hash($pass, PASSWORD_DEFAULT);
                        header("Location: map.php");
                    }else{
                        echo "Wrong password" . "<br>";
                    }
                }else{
                    echo "This user does not exist";
                }

                mysqli_close($conn);
                //redirecting after opening session
               // header("Location: homepage.php");
            }
            else {
                echo "Missing credentials";
            }
        }
    }
?>