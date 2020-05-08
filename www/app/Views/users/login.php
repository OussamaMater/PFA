<?php require_once APPROOT . '/views/inc/header.php' ?>
<!-- ? Login Starts -->

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-login flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Log In</h5>
                    <form class="form-signin"
                        action="<?php echo URLROOT; ?>users/login"
                        method="POST">
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="email" id="inputEmail" name="email"
                                class="form-control" placeholder="Email address"
                                value="<?php echo (!empty($data['email_err'])) ? '' : $data['email'];?>"
                                required autofocus>
                            <label for="inputEmail">Email address</label>
                            <div class="text-danger"><small><?php echo $data['email_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="password" id="inputPassword" name="password"
                                class="form-control" placeholder="Password"
                                value="<?php echo (!empty($data['password_err'])) ? '' : $data['password'];?>"
                                required>
                            <label for="inputPassword">Password</label>
                            <div class="text-danger"><small><?php echo $data['password_err']; ?></small>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1">Remember password</label>
                        </div>
                        <button class="btn btn-lg btn-outline-success btn-block text-uppercase" type="submit">Log
                            In</button>
                        <a class="d-block text-center mt-2 small"
                            href="<?php echo URLROOT;?>users/signup"
                            id="logging">Sign Up</a>
                        <hr class="my-4">
                        <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i
                                class="fab fa-google mr-2"></i> Sign in with Google</button>
                        <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i
                                class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ? Login ends -->
<?php require_once APPROOT . '/views/inc/socialmedia.php';?>
<?php require_once APPROOT . '/views/inc/footer.php';
