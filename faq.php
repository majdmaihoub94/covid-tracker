<?php
include('db_connection.php');
$currentPage = basename($_SERVER['PHP_SELF']);
$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT * from faq WHERE question LIKE ?";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bind_param('s', $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM faq";
    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Tracker-FAQ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php include('./partials/header.php'); ?>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>FAQ</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>FAQ</li>
                </ol>
            </div>

        </div>
    </section>

    <section id="faq" class="faq" style='height: 100vh'>
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Frequently Asked Questions</p>
            </header>
            <div class="row">
                <div class="col-lg-12">
                    <form class="d-flex mb-3" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search by question..." aria-label="Search" value="<?= $search; ?>">
                        <button class="btn btn-outline-primary" type="submit">Search</button>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="faqlist">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $faq_id = $row["id"];
                        ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-content-<?= $faq_id; ?>">
                                            <?= $row["question"]; ?>
                                        </button>
                                    </h2>
                                    <div id="faq-content-<?= $faq_id; ?>" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                        <div class="accordion-body">
                                            <?= $row["description"]; ?>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<h1>No results found</h1>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- ======= Footer ======= -->
    <?php include('./partials/footer.php'); ?>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous">
    </script>
    <script src="./assets/js/main.js"></script>
</body>

</html>