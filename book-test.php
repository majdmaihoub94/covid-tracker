<?php
include('db_connection.php');

$currentPage = basename($_SERVER['PHP_SELF']);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Tracker-book a test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php include('./partials/header.php'); ?>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Book a test</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Book a test</li>
                </ol>
            </div>

        </div>
    </section>


    <div class="container mt-5 mb-5">
        <h2>Booking Form</h2>
        <div id="message" role="alert"></div>
        <form id="bookingForm">
            <div class="mb-3">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="firstName" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="lastName" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" class="form-control" id="phone" name="phone" required placeholder="+44xxxxxxxxxx">
            </div>
            <div class="mb-3">
                <label for="center" class="form-label">Center</label>
                <select class="form-control" id="center" name="center" required>
                    <?php
                    $sql = "SELECT * FROM centers";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Book</button>
        </form>
    </div>



    <!-- ======= Footer ======= -->
    <?php include('./partials/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    </script>
    <script script src="https://code.jquery.com/jquery-3.6.0.min.js">

    </script>
    <script>
        $(document).ready(function() {
            $('#bookingForm').on('submit', function(e) {
                e.preventDefault();
                const phoneNumber = $('#phone').val();
                const ukPhoneNumberPattern = /^(?:\+44|0)[7-9]\d{9}$/;
                if (!ukPhoneNumberPattern.test(phoneNumber)) {
                    $('#message').text('Please enter a valid UK phone number.').addClass('alert alert-danger').removeClass('alert-success');
                    return false;
                }
                $.ajax({
                    type: 'POST',
                    url: 'submit_booking.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#bookingForm')[0].reset();
                        $('#message').text('Submitted Succssesfully').addClass('alert alert-success').removeClass('alert-danger');
                    },
                    error: function() {
                        $('#message').text('An error occurred. Please try again.').addClass('alert alert-danger').removeClass('alert-success');
                    }
                });
            });
        });
    </script>
</body>

</html>