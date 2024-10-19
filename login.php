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
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <label for="username">Username<br></label>
        <input type="text" name="username" placeholder="Test Name" maxlength="12">
        <br>
        <label for="pass">Password<br></label>
        <input type="password" name="pass" placeholder="test" maxlength="12">
        <input type="reset" value="Clear">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>

<?php
    if(isset($_POST["username"]) && isset($_POST["pass"])){
        $usr = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
        $pass = filter_input(INPUT_POST, "pass", FILTER_SANITIZE_SPECIAL_CHARS);

        if(isset($_POST["login"])){
            if(!empty($usr) && !empty($pass)){
                include("dbconn.php");

                $compare_pass = $conn->prepare("SELECT password FROM users WHERE username = ?");
                $compare_pass->bind_param("s", $usr);
                try {
                    $compare_pass->execute();
                    $result = $compare_pass->get_result();
                } catch (mysqli_sql_exception) {
                    echo "SQL error";
                }

                if(mysqli_num_rows($result) > 0){
                    if(password_verify($pass, mysqli_fetch_assoc($result)["password"])){
                        $_SESSION["username"] = $usr;
                        $_SESSION["password"] = password_hash($pass, PASSWORD_DEFAULT);
                        header("Location:map/map.php");
                        exit; // Σταματά την εκτέλεση για να λειτουργήσει η ανακατεύθυνση
                    } else {
                        echo "Wrong password<br>";
                    }
                } else {
                    echo "This user does not exist";
                }

                mysqli_close($conn);
            } else {
                echo "Missing credentials";
            }
        }
    }
?>
