<?php
$servername = "localhost";
$username = "root";
$password = "merdeka2022";
$dbname = "laundry";

// Membuat Koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>