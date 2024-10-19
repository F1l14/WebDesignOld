<?php
// Επιστρέφει δεδομένα οχημάτων, αιτημάτων και προσφορών σε μορφή JSON
include('../dbconn.php');

$queryVehicles = "SELECT * FROM vehicles";
$queryRequests = "SELECT * FROM requests";
$queryOffers = "SELECT * FROM offers";

$resultVehicles = mysqli_query($conn, $queryVehicles);
$resultRequests = mysqli_query($conn, $queryRequests);
$resultOffers = mysqli_query($conn, $queryOffers);

$data = [
    'vehicles' => mysqli_fetch_all($resultVehicles, MYSQLI_ASSOC),
    'requests' => mysqli_fetch_all($resultRequests, MYSQLI_ASSOC),
    'offers' => mysqli_fetch_all($resultOffers, MYSQLI_ASSOC)
];

header('Content-Type: application/json');
echo json_encode($data);
?>
