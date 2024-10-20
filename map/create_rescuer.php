<!-- // create_rescuer.php -->
<!-- // Φόρμα για δημιουργία νέων λογαριασμών διασωστών. -->

<form action="create_rescuer_action.php" method="POST">
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit">Create Account</button>
</form>