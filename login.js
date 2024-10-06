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
        // Αποσχολιάστε την παρακάτω γραμμή για ανακατεύθυνση μετά την επιτυχή σύνδεση
        // window.location.href = "dashboard.html";
    } else {
        alert("Λάθος Όνομα Χρήστη ή Κωδικός");
        return false; // Δεν υποβάλλουμε τη φόρμα
    }
}
