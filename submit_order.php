<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form
    $customer_name = $_POST['customer_name'];
    $item_type = $_POST['item_type'];
    $weight = $_POST['weight'];
    $price = $_POST['price'];

    // Menyiapkan statement SQL dengan parameter
    $stmt = $conn->prepare("INSERT INTO orders (customer_name, item_type, weight, price) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdd", $customer_name, $item_type, $weight, $price);

    // Menjalankan query
    if ($stmt->execute()) {
        echo "Order berhasil ditambahkan!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();

    // Redirect ke index.php
    header("Location: index.php");
    exit();
}
?>
