<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
<?php include('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Laundry</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Order Laundry</h1>
    <form id="order-form" action="submit_order.php" method="post">
        <label for="customer_name">Nama Pelanggan:</label>
        <input type="text" id="customer_name" name="customer_name" required>
        
        <label for="item_type">Jenis Barang:</label>
        <input type="text" id="item_type" name="item_type" required>
        
        <label for="weight">Berat (kg):</label>
        <input type="number" id="weight" name="weight" step="0.01" required>
        
        <label for="price">Harga (Rp):</label>
        <input type="number" id="price" name="price" step="0.01" required>
        
        <button type="submit">Catat Order</button>
    </form>    
    <h2>Daftar Order</h2>
    <table>
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Jenis Barang</th>
                <th>Berat (kg)</th>
                <th>Harga (Rp)</th>
                <th>Status</th>
                <th>Tanggal Order</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM orders ORDER BY order_date DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['item_type'] . "</td>";
                    echo "<td>" . $row['weight'] . "</td>";
                    echo "<td>" . $row['price'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>" . $row['order_date'] . "</td>";
                    echo "<td><button onclick='updateStatus(" . $row['id'] . ")'>Selesai</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>Belum ada order!</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <script src="script.js"></script>
</body>
</html>