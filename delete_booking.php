<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "DELETE FROM bookings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    if ($stmt->execute()) {
        header("Location: booking-table.php?msg=Booking Deleted Successfully");
        exit();
    } else {
        echo "Error deleting booking!";
    }
} else {
    echo "Invalid Request!";
}
