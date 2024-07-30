<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $order_id = $_POST['order_id'];

    $sql = "UPDATE orders SET status='Completed' WHERE id=$order_id";

    if ($conn->query($sql) === TRUE) {
        echo "Status order berhasil diperbarui!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: index.php");
    exit();
}
?>