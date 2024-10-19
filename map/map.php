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
            })
            .catch(error => console.log('Error loading markers:', error));
    }

    // Κλήση της λειτουργίας κατά την έναρξη
    loadMarkers();
</script>

</body>
</html>
