<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="logo">
            <a href="https://www.youtube.com">
                <img src="imgs/ceid.jpg" height="100" title="Ceid logo">
            </a>
        </div>
        <br>
        <a href="index.php" target="_self" class="home-link">Home</a>
        <br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="login-form">
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter Username" maxlength="12" required>
            <br>
            <label for="pass">Password</label>
            <input type="password" name="pass" placeholder="Enter Password" maxlength="12" required>
            <br>
            <input type="submit" name="login" value="Login" class="btn-login">
            <input type="reset" value="Clear" class="btn-clear">
        </form>
    </div>
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
                } catch (mysqli_sql_exception $e) {
                    echo "SQL error: " . $e->getMessage();
                    exit;
                }

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if (password_verify($pass, $row["password"])) {
                        $_SESSION["username"] = $usr;
                        header("Location: ./map/map.php");
                        exit; // Σταματά την εκτέλεση για να λειτουργήσει η ανακατεύθυνση
                    } else {
                        echo "Wrong password<br>";
                    }
                } else {
                    echo "This user does not exist<br>";
                }

                $compare_pass->close();
                $conn->close();
            } else {
                echo "Missing credentials<br>";
            }
        }
    }
?>