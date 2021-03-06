<?php
defined('PREVENT_DIRECT_ACCESS') or exit('No direct script access allowed');
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico?v=2">
    <title>Choose Account</title>
    <?php include('header.php'); ?>
</head>

<body>
    <?php include('navigator.php'); ?>
    <div class="container-fluid">
        <div class="row p-5 my-4 rounded-3">
            <div class="col-md-6 d-flex flex-column justify-content-center align-items-center">
                <img style="width: 500px; height:auto;" src="<?= BASE_URL . PUBLIC_DIR . '/assets/img/choose.svg'; ?>" alt="">
                <h2 class="mt-3 fw-bold text-success">Thesis Project Management System</h2>
            </div>
            <div class="col-md-6">
                <a class="fs-5" style="text-transform:none;" href="<?= site_url('pages/login'); ?>"><i class="fa-solid fa-arrow-left-long fa-lg text-dark"></i> Go Back</a>
                <h3 class="mt-5 mb-4"><span>Choose an account</span></h3>
                <div class="usertypes-options">
                    <a class="col-md-12 btn btn-lg btn-outline-secondary py-4 mb-3 text-start choose-account" role="button" href="<?= site_url('pages/teacher'); ?>">
                        <div class="row text-left">
                            <div style="height: auto; min-width: 50px;" class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-chalkboard-user fa-2x text-success"></i>    
                            </div>                        
                            <div class="col-md-10 d-flex flex-column align-items-start justify-content-start">
                                <h5 class="mb-2">I'm a Teacher</h5>
                                <p class="fs-6">For teachers, advisers</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-md-12 btn btn-lg btn-outline-secondary py-4 mb-3 text-start choose-account" role="button" href="<?= site_url('pages/student'); ?>">
                        <div class="row text-left">
                            <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-user-graduate fa-2x text-success"></i>    
                            </div>                        
                            <div class="col-md-10 d-flex flex-column align-items-start justify-content-start">
                                <h5 class="mb-2">I'm a Student</h5>
                                <p class="fs-6">For students</p>
                            </div>
                        </div>
                    </a>
                    <a class="col-md-12 btn btn-lg btn-outline-secondary py-4 mb-4 text-start choose-account" role="button" href="<?= site_url('pages/staff'); ?>">
                        <div class="row">
                            <div class="col-md-2 d-flex flex-column align-items-center justify-content-center">
                                <i class="fa-solid fa-user-tie fa-2x text-success"></i>    
                            </div>                        
                            <div class="col-md-10 d-flex flex-column align-items-start justify-content-start">
                                <h5 class="mb-2">I'm R&D Staff</h5>
                                <p class="fs-6">For research and development office staffs</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="signup-container text-center">
                    <span>Already have an account? <a href="<?= site_url('pages/login'); ?>"> Sign in </a></span>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>