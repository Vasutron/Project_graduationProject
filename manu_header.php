<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">Timely Repairs</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="request_repair.php">Request Repair</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="status.php">Check Repair Status</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="repair.php">Repair Process & Warranty</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="articles.php">Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact Us</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <?php
                    if(isset($_SESSION['UserID'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Welcome :
                            <?php if(isset($_SESSION['cus_pic'])) { ?>
                            <img src="image/<?php echo $_SESSION['cus_pic']; ?>" width="30" height="30"
                                class="rounded-circle me-2">
                            <?php } ?> <strong><?php echo $_SESSION['Name']; ?></strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"><?php include('counter.php'); ?></a>
                    </li>
                    <li>
                        <a type="nav-link" class="btn btn-danger ms-auto" href="logout.php">Logout</a>
                    </li>
                    <?php } else { ?>
                    <li>
                        <a type="nav-link" class="btn btn-primary ms-auto" href="index.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-third.php">Contact Us</a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
</header>