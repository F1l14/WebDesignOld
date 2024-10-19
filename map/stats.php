//stats.php
//Χρήση βιβλιοθήκης όπως το Chart.js για καταγραφή στατιστικών.

<canvas id="serviceStats" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('serviceStats').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Νέα Αιτήματα', 'Νέες Προσφορές', 'Διεκπεραιωμένα Αιτήματα', 'Διεκπεραιωμένες Προσφορές'],
            datasets: [{
                label: 'Πλήθος',
                data: [10, 20, 5, 15], // Προσθέστε τα πραγματικά δεδομένα από τη βάση
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

