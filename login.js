// Αυτή η συνάρτηση καλείται όταν υποβάλλεται η φόρμα
function validateForm(event) {
    // Αποτρέπουμε την αυτόματη υποβολή της φόρμας
    event.preventDefault();

    // Λαμβάνουμε τις τιμές των πεδίων username και password
    let username = document.getElementById('fname').value;
    let password = document.getElementById('pass').value;

    // Έλεγχος αν το username ή το password είναι κενά
    if (username === "" || password === "") {
        alert("Το Όνομα Χρήστη και ο Κωδικός δεν μπορούν να είναι κενά");
        return false; // Δεν υποβάλλουμε τη φόρμα
    }

    // Παράδειγμα: Έλεγχος αν το username και το password είναι σωστά (για δοκιμαστικούς σκοπούς)
    if (username === "testuser" && password === "testpass") {
        alert("Επιτυχής σύνδεση");
        // Υποβάλλουμε τη φόρμα ή ανακατευθύνουμε τον χρήστη σε άλλη σελίδα
        window.location.href = "https://www.youtube.com/watch?v=dQw4w9WgXcQ" //surprise video
    } else {
        alert("Λάθος Όνομα Χρήστη ή Κωδικός");
        return false; // Δεν υποβάλλουμε τη φόρμα
    }
}
