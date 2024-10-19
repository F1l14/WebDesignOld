<?php
    session_start();
    // Έλεγχος αν ο χρήστης είναι συνδεδεμένος
    if (!isset($_SESSION["username"])) {
        // Ανακατεύθυνση στο login αν δεν είναι συνδεδεμένος
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Map</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    <div id="map">
        <!-- Κώδικας για τον διαδραστικό χάρτη -->
    </div>
</body>
</html>
