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

    <!-- Χρήση βιβλιοθήκης όπως το Toastr για ειδοποιήσεις σε αλλαγές κατάστασης (π.χ., νέο αίτημα, αλλαγή θέσης βάσης κλπ)-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
    <div id="map">
        <!-- Κώδικας για τον διαδραστικό χάρτη -->
    </div>

    <script>
    // Φόρτωση markers από τον server
    function loadMarkers() {
        fetch('../loadMarkers.php')
            .then(response => response.json())
            .then(data => {
                // Εμφάνιση οχημάτων
                data.vehicles.forEach(vehicle => {
                    L.marker([vehicle.lat, vehicle.lng], {className: 'marker-vehicle'})
                        .addTo(map)
                        .bindPopup(`<b>${vehicle.username}</b><br>Κατάσταση: ${vehicle.status}<br>Φορτίο: ${vehicle.cargo}`);
                });

                // Εμφάνιση αιτημάτων
                data.requests.forEach(request => {
                    L.marker([request.lat, request.lng], {className: 'marker-request'})
                        .addTo(map)
                        .bindPopup(`<b>${request.name}</b><br>Τηλέφωνο: ${request.phone}<br>Ποσότητα: ${request.quantity}`);
                });

                // Εμφάνιση προσφορών
                data.offers.forEach(offer => {
                    L.marker([offer.lat, offer.lng], {className: 'marker-offer'})
                        .addTo(map)
                        .bindPopup(`<b>${offer.name}</b><br>Τηλέφωνο: ${offer.phone}<br>Ποσότητα: ${offer.quantity}`);
                });

                // Προσθήκη γραμμών σύνδεσης για ενεργά tasks
                function drawTaskLines(vehicle, tasks) {
                    tasks.forEach(task => {
                        var line = L.polyline([
                            [vehicle.lat, vehicle.lng],
                            [task.lat, task.lng]
                        ], {color: 'purple', weight: 2}).addTo(map);
                    });
                }

                // Παράδειγμα κλήσης της συνάρτησης μετά την ανάκτηση δεδομένων
                data.vehicles.forEach(vehicle => {
                    var activeTasks = data.requests.filter(req => req.assigned_vehicle === vehicle.username)
                        .concat(data.offers.filter(off => off.assigned_vehicle === vehicle.username));
                    drawTaskLines(vehicle, activeTasks);
                });

            })
            .catch(error => console.log('Error loading markers:', error));
    }

    // Κλήση της λειτουργίας κατά την έναρξη
    loadMarkers();

    // Αυτόματη ανανέωση δεδομένων κάθε 30 δευτερόλεπτα
    setInterval(loadMarkers, 30000);
</script>

<script>
    function showNotification(message, type) {
        toastr.options = {
            "positionClass": "toast-top-right",
            "timeOut": "3000"
        };
        toastr[type](message);
    }

    // Παράδειγμα χρήσης σε περίπτωση επιτυχούς ενημέρωσης θέσης βάσης
    showNotification("Η νέα θέση της βάσης επικυρώθηκε!", "success");
</script>

</body>
</html>
