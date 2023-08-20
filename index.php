<?php
$currentPage = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covid-Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <!-- ======= Header ======= -->
    <?php include('./partials/header.php'); ?>
    <!-- End Header -->
    <div class="container jumbotron  d-flex align-items-center">
        <div class="row ">
            <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Together we fight
                    COVID-19</h1>
                <p>Rhoncus morbi et augue nec, in id ullamcorper at sit. Condimentum sit nunc in eros scelerisque sed.
                    Commodo in viverra nunc, ullamcorper ut. Non, amet, aliquet scelerisque nullam sagittis, pulvinar.
                    Fermentum scelerisque sit consectetur hac mi. Mollis leo eleifend ultricies purus iaculis.</p>
                <div>
                    <div class="text-center text-lg-start">
                        <a href="#about" class="btn btn-primary mt-3 scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                            <span class="px-3">Get Started</span>
                            <i class="fas fa-arrow-right "></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
                <img src="assets/img/hero-img.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column justify-content-center count-box">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <b>Total Cases</b>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column justify-content-center count-box">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <b>Active Cases</b>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column justify-content-center count-box">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <b>Recovered</b>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column justify-content-center count-box">
                        <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                        <b>Deaths</b>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Counts Section -->

    <!-- ======= Prevention Section ======= -->
    <section id="values" class="values">
        <div class="container">
            <h2 class="text-center">Prevention</h2>
            <p class='px-5 text-center'>Protect yourself and others around you by knowing the facts and taking appropriate precautions.
                Floow advice provided by your local health authority.
            </p>
            <div class="row">
                <div class="col-lg-4">
                    <div class="box">
                        <img src="assets/img/values-1.png" class="img-fluid" alt="">
                        <h3>Get vaccinated</h3>
                        <p> soon as it’s your turn and follow local guidance on vaccination</p>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box">
                        <img src="assets/img/values-2.png" class="img-fluid" alt="">
                        <h3>Keep physical distance</h3>
                        <p>at least 1 metre from others, even if they don’t appear to be sick. Avoid crowds and close contact.</p>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="box">
                        <img src="assets/img/values-3.png" class="img-fluid" alt="">
                        <h3>Clean your hands</h3>
                        <p>with alcohol-based hand rub or soap and water.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Prevention Section -->


    <!-- ======= symptoms Section ======= -->
    <section id="features" class="features">

        <div class="container">
            <h2 class='px-5'>Symptoms</h2>
            <p class='px-5 text-left'>
                COVID-19 affects different people in different ways. Most infected people
                will develop mild to moderate illness and recover without hospitalization.
            </p>
            <div class="row">
                <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
                    <div class="row align-self-center gy-4">
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Aches and pains</h3>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Diarrhoea</h3>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Headache</h3>
                            </div>
                        </div>
                        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
                            <div class="feature-box d-flex align-items-center">
                                <i class="bi bi-check"></i>
                                <h3>Sore throat</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="assets/img/symp.png" class="img-fluid" alt="">
                </div>
            </div>
    </section>

    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">
            <header class="section-header">
                <p>Contact Us</p>
            </header>
            <div class="row gy-4">
                <div class="col-lg-12">
                    <form id="contactForm" class="php-email-form">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./assets/js/main.js"></script>
    <script>
        $(document).ready(function() {
            $('#contactForm').on('submit', function(e) {
                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'submit_contact.php',
                    data: $(this).serialize(),
                    beforeSend: function() {
                        $('.loading').show();
                        $('.sent-message').hide();
                        $('.error-message').hide();
                    },
                    success: function(response) {
                        $('.loading').hide();
                        if (response === "success") {
                            $('.sent-message').show();
                            $('#contactForm')[0].reset();
                        } else {
                            $('.error-message').text('There was an error sending the email. Please try again later.').show();
                        }
                    },
                    error: function() {
                        $('.loading').hide();
                        $('.error-message').text('An error occurred. Please try again.').show();
                    }
                });
            });
        });
    </script>
</body>

</html>