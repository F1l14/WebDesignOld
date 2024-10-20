<!-- announcements.php -->
<!-- Φόρμα και διαχείριση ανακοινώσεων. -->

<form action="create_announcement.php" method="POST">
    <label for="title">Τίτλος Ανακοίνωσης:</label>
    <input type="text" name="title" required>
    <label for="description">Περιγραφή:</label>
    <textarea name="description" required></textarea>
    <button type="submit">Δημιουργία Ανακοίνωσης</button>
</form>
