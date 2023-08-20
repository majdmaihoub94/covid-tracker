<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $center = $_POST['center'];

    $stmt = $conn->prepare("INSERT INTO bookings (first_name, last_name, address, phone, center) VALUES (?, ?, ?, ?, ?)");

    $stmt->bind_param("sssss", $first_name, $last_name, $address, $phone, $center);

    if ($stmt->execute()) {
        echo "Booking saved successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();

    $conn->close();
} else {
    echo "Invalid request method!";
}
