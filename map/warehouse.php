<!-- //warehouse.php -->
<!-- //Δημιουργία πίνακα που εμφανίζει τα είδη αποθήκης -->

<table>
    <thead>
        <tr>
            <th>Είδος</th>
            <th>Κατηγορία</th>
            <th>Ποσότητα στη Βάση</th>
            <th>Ποσότητα σε Οχήματα</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("dbconn.php");
        $sql = "SELECT * FROM items";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['item_name'] . "</td>";
            echo "<td>" . $row['category'] . "</td>";
            echo "<td>" . $row['quantity_base'] . "</td>";
            echo "<td>" . $row['quantity_vehicle'] . "</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>
