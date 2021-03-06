<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');
include('config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="/favicon.ico?v=2">
    <title>Teacher Account</title>
    <?php include('header.php'); ?>
</head>

<body>
    <?php include('navigator.php'); ?>
    <div class="container-fluid">
        <div class="row p-5 my-4 rounded-3">
            <div class="col-md-5 d-flex flex-column justify-content-center align-items-center">
                <img style="width: 500px; height:auto;" src="<?= BASE_URL . PUBLIC_DIR . '/assets/img/teacher.svg'; ?>" alt="">
                <h2 class="mt-3 fw-bold text-success">Thesis Project Management System</h2>
            </div>
            <div class="col-md-7">
                <a class="fs-5" style="text-transform:none;" href="<?= site_url('pages/choose'); ?>"><i class="fa-solid fa-arrow-left-long fa-lg text-dark"></i> Go Back</a>
                <h2 class="mt-4 mb-4">Teacher Account</h2>
                <p class="mt-2 mb-4 fs-6"><span>Create your account. After creating your account, you can start joining a class together with your teachers and classmates.</span></p>

                <a id="signin" class="col-12 bg-white btn btn-outline-secondary p-2" role="button" href="<?=$google_client->createAuthUrl()?>">
                    <!-- <img width="20px" style="margin-bottom:3px; margin-right:10px" alt="Google sign-in" src='https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png'> -->
                    <span class="fa fa-google"></span> Sign up with Google
                    <?php $_SESSION['user_type'] = "faculty"; ?>
                    <?php $_SESSION['user_activity'] = "signup"; ?>
                </a>

                <div class="signup-or-container mt-4 mb-4"><div class="signup-border"></div><span>or</span></div>

                <div id="message"></div>
                <form id="signup-validate" class="needs-validation" action="<?= site_url('account/register'); ?>" method="post">
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="fname" class="form-label mb-0">First Name</label>
                            <input type="hidden" class="form-control form-control-sm mb-0" name="user-type" id="user-type" value="Teacher">
                            <input type="text" class="form-control form-control-sm mb-0" name="fname" id="fname" placeholder="First Name" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="mname" class="form-label mb-0">Middle Name</label>
                            <input type="text" class="form-control form-control-sm mb-0" name="mname" id="mname" placeholder="Middle Name">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="lname" class="form-label mb-0">Last Name</label>
                            <input type="text" class="form-control form-control-sm mb-0" name="lname" id="lname" placeholder="Last Name" required>
                        </div>
                        <div class="col-md-2 mb-2">
                            <label for="nameex" class="form-label mb-0">Name Ext.</label>
                            <select name="nameex" id="nameex" class="form-control form-control-sm mb-0">
                                <option></option>
                                <option value="Jr.">Jr.</option>
                                <option value="Sr.">Sr.</option>
                                <option value="I">I</option>
                                <option value="II">II</option>
                                <option value="III">III</option>
                                <option value="IV">IV</option>
                            </select>
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="uname" class="form-label mb-0">Username</label>
                            <input type="text" class="form-control form-control-sm mb-0" name="uname" id="uname" placeholder="Username" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="email" class="form-label mb-0">Email</label>
                            <input type="email" class="form-control form-control-sm mb-0" name="email" id="email" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 mb-2">
                            <label class="form-label">Address</label>
                            <select name="region" class="form-control form-control-sm" id="region" required></select>
                            <input type="hidden" class="form-control form-control-sm" name="region_text" id="region-text">
                        </div>
                        <div class="col-sm-3 mb-2 province">
                            <label class="form-label">Province</label>
                            <select name="province" class="form-control form-control-sm" id="province" required></select>
                            <input type="hidden" class="form-control form-control-sm" name="province_text" id="province-text">
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label class="form-label">City / Municipality</label>
                            <select name="city" class="form-control form-control-sm" id="city" required></select>
                            <input type="hidden" class="form-control form-control-sm" name="city_text" id="city-text">
                        </div>
                        <div class="col-sm-3 mb-2">
                            <label class="form-label">Barangay</label>
                            <select name="barangay" class="form-control form-control-sm" id="barangay" required></select>
                            <input type="hidden" class="form-control form-control-sm" name="barangay_text" id="barangay-text">
                        </div>
                    </div>  
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="contact" class="form-label mb-0">Contact No.</label>
                            <input type="text" class="form-control form-control-sm mb-0" name="contact" id="contact" placeholder="Contact No." required>
                        </div> 
                        <div class="col-md-3 mb-2">
                            <label for="gender" class="form-label mb-0">Gender</label>
                            <select name="gender" id="gender" class="form-control form-control-sm mb-0" required>
                                <option value="N/A">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-2">
                            <label for="bdate" class="form-label mb-0">Birthdate</label>
                            <input type="date" class="form-control form-control-sm mb-0" name="bdate" id="bdate" required>
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="designation" class="form-label mb-0">Designation</label>
                            <select name="designation" id="designation" class="form-control form-control-sm mb-0" required>
                                <option value="N/A" disabled>Select Designation</option>
                                <option value="Instructor I">Instructor I</option>
                                <option value="Instructor II">Instructor II</option>
                                <option value="Instructor III">Instructor III</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="position" class="form-label mb-0">Position</label>
                            <select name="position" id="position" class="form-control form-control-sm mb-0" required>
                                <option value="N/A" disabled>Select Position</option>
                                <option value="Student">Adviser</option>
                                <option value="Faculty">Faculty</option>
                                <option value="Program Chair">Program Chair</option>
                                <option value="Dean">Dean</option>
                            </select>
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-md-6 mb-2">
                            <label for="password" class="form-label mb-0">Password</label>
                            <input name="password" placeholder="Password" id="password" type="password" class="form-control-sm form-control" required>
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="confirm_password" class="form-label mb-0">Confirm Password</label>
                            <input name="confirm_password" placeholder="Repeat Password" id="confirm_password" type="password" class="form-control-sm form-control" required>
                        </div>  
                    </div> 
                    <div class="col-md-12 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="YES" id="CONSENT" name="CONSENT" onchange="consent();" required>
                            <label class="form-check-label" for="consent" style="color: blue">I agree to terms and conditions</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" id="submit" class="btn btn-success btn-lg col-12" disabled value="Sign Up">
                    </div>
                </form>
                <div class="signup-container text-center">
                    <span>Already have an account? <a href="<?= site_url('pages/login'); ?>"> Sign in </a></span>
                </div>
            </div>
        </div>
    </div>
    <?php include('footer.php'); ?>
</body>

</html>