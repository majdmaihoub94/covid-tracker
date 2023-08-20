<?php
include('db_connection.php');

$currentPage = basename($_SERVER['PHP_SELF']);

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT * FROM bookings WHERE first_name LIKE ? OR last_name LIKE ? ";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bind_param('ss', $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM bookings";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Tracker-bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php include('./partials/header.php'); ?>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Bookings</h2>

            </div>
        </div>
    </section>


    <div class="container mt-5" style='height:100vh;'>
        <h2>Booking List</h2>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Center</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db_connection.php';
                $sql = "SELECT * FROM bookings";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["first_name"] . "</td>";
                    echo "<td>" . $row["last_name"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["center"] . "</td>"; // Assuming you store the center name directly; otherwise, you need to fetch the center's name from the `centers` table
                    echo "<td>
                    <button data-id='" . $row["id"] . "' class='btn btn-warning updateBtn' data-bs-toggle='modal' data-bs-target='#updateModal'>Update</button>
                    <a href='delete_booking.php?id=" . $row["id"] . "' class='btn btn-danger'>Delete</a>
                </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Booking</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm" class='d-flex flex-column' style="gap:10px">
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required>
                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Phone" required>
                        <input type="text" name="center" id="center" class="form-control" placeholder="Center" required>
                        <input type="hidden" name="bookingId" id="bookingId">
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ======= Footer ======= -->
    <?php include('./partials/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $('.updateBtn').on('click', function() {
                var bookingId = $(this).data('id');

                // Fetch booking data using AJAX and populate the form
                $.get('fetch_booking.php', {
                    id: bookingId
                }, function(data) {
                    var booking = JSON.parse(data);
                    $('#first_name').val(booking.first_name);
                    $('#last_name').val(booking.last_name);
                    $('#phone').val(booking.phone);
                    $('#center').val(booking.center);
                    $('#bookingId').val(bookingId);
                });
            });

            $('#updateForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'update_booking_action.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        alert('Booking updated!');
                        location.reload(); // Reload the page to see updated data
                    },
                    error: function() {
                        alert('An error occurred. Please try again.');
                    }
                });
            });
        });
    </script>
</body>

</html>