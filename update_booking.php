<?php
include 'db_connection.php';

if (isset($_POST['bookingId'])) {
    $id = $_POST['bookingId'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $center = $_POST['center'];

    $sql = "UPDATE bookings SET first_name = ?, last_name = ?, phone = ?, center = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssi', $first_name, $last_name, $phone, $center, $id);

    if ($stmt->execute()) {
        echo "Booking updated successfully";
    } else {
        echo "Error updating booking";
    }
}
