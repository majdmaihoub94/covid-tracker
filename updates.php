<?php
include('db_connection.php');

$currentPage = basename($_SERVER['PHP_SELF']);

$search = isset($_GET['search']) ? $_GET['search'] : '';

if ($search) {
    $sql = "SELECT * FROM updates WHERE title LIKE ? ";
    $stmt = $conn->prepare($sql);
    $likeSearch = "%$search%";
    $stmt->bind_param('ss', $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM updates";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Tracker-updates</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php include('./partials/header.php'); ?>
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Updates</h2>
                <ol>
                    <li><a href="index.php">Home</a></li>
                    <li>Updates</li>
                </ol>
            </div>
        </div>
    </section>

    <section class="facts section-bg">
        <div class="container">
            <div class="row counters">
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Total Cases</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Active Cases</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Recovered</p>
                </div>
                <div class="col-lg-3 col-6 text-center">
                    <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                    <p>Deaths</p>
                </div>
            </div>
        </div>
    </section>
    <section id="recent-blog-posts" class="recent-blog-posts">
        <div class="container">
            <header class="section-header ">
                <p>Latest Updates</p>
            </header>
            <div class="row">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-lg-4">
                            <div class="post-box">
                                <div class="post-img"><img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt=""></div>
                                <span class="post-date"><?= $row["timestamp"]; ?></span>
                                <h3 class="post-title"><?= $row["title"]; ?></h3>
                                <span class="post-date"><?= $row["description"]; ?></span>
                                <a href="#" class="readmore stretched-link mt-auto"><span class="mr-5">Read More</span><i class="fa fa-arrow-right "></i></a>
                            </div>
                        </div>
                <?php
                    }
                } else {
                    echo "No Updates ";
                }
                ?>
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