<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">COVID TRACKER</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav justify-content-center margin-header">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'index.php') ? 'active' : ''; ?>" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'updates.php') ? 'active' : ''; ?>" href="updates.php">Updates</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'centers.php') ? 'active' : ''; ?>" href="centers.php">Vaccenation Centeres
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo ($currentPage === 'faq.php') ? 'active' : ''; ?>" href="faq.php">FAQ
                    </a>
                </li>
                <!-- ... other links ... -->
            </ul>
            <a class='btn btn-primary ' href='book-test.php'>Book a test</a>
        </div>
    </div>
</nav>