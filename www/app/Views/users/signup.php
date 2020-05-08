<?php require_once APPROOT . '/views/inc/header.php' ?>
<!-- ? SignUp starts -->

<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="card card-signin flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Sign Up</h5>
                    <form class="form-signin"
                        action="<?php echo URLROOT; ?>users/signup"
                        method="POST">
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" text" id="inputFName" name="firstname"
                                class="form-control" placeholder="First Name"
                                value="<?php echo (!empty($data['firstname_err'])) ? '' : $data['firstname'];?>"
                                required />
                            <label for="inputFName">First Name</label>
                            <div class="text-danger"><small><?php echo $data['firstname_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" text" id="inputLName" name="lastname"
                                class="form-control" placeholder="Last Name"
                                value="<?php echo (!empty($data['lastname_err'])) ? '' : $data['lastname'];?>"
                                required />
                            <label for="inputLName">Last Name</label>
                            <div class="text-danger"><small><?php echo $data['lastname_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" text" id="inputAddress" name="address"
                                class="form-control" placeholder="Address"
                                value="<?php echo (!empty($data['address_err'])) ? '' : $data['address'];?>"
                                required />
                            <label for="inputAddress">Address</label>
                            <div class="text-danger"><small><?php echo $data['address_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" tel" id="inputPhone" name="phone"
                                class="form-control" placeholder="90-900-900" pattern="[2-9]{2}-[0-9]{3}-[0-9]{3}"
                                value="<?php echo (!empty($data['phone_err'])) ? '' : $data['phone'];?>"
                                required />
                            <label for="inputPhone">Phone</label>
                            <div class="text-danger"><small><?php echo $data['phone_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" email" id="inputEmail" name="email"
                                class="form-control" placeholder="Email address"
                                value="<?php echo (!empty($data['email_err'])) ? '' : $data['email'];?>"
                                required />
                            <label for="inputEmail">Email address</label>
                            <div class="text-danger"><small><?php echo $data['email_err']; ?></small>
                            </div>
                        </div>
                        <hr />
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="password" id="inputPassword" name="password"
                                class="form-control" placeholder="Password"
                                value="<?php echo (!empty($data['password_err'])) ? '' : $data['password'];?>"
                                required>
                            <label for="inputPassword">Password</label>
                            <div class="text-danger"><small><?php echo $data['password_err']; ?></small>
                            </div>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="password" id="inputPassword" name="confpassword"
                                class="form-control" placeholder="Password"
                                value="<?php echo (!empty($data['confpassword_err'])) ? '' : $data['confpassword'];?>"
                                required>
                            <label for="inputPassword">Confirm Password</label>
                            <div class="text-danger"><small><?php echo $data['confpassword_err']; ?></small>
                            </div>
                        </div>
                        <button class="btn btn-lg btn-outline-success btn-block text-uppercase" type="submit">
                            Sign Up
                        </button>
                        <a class="d-block text-center mt-2 small"
                            href="<?php echo URLROOT;?>users/login"
                            id="logging">Log In</a>
                        <hr class="my-4" />
                        <button class="btn btn-lg btn-google btn-block text-uppercase btn-danger" type="submit">
                            <i class="fab fa-google mr-2"></i> Sign up with Google
                        </button>
                        <button class="btn btn-lg btn-facebook btn-block btn-info text-uppercase" type="submit">
                            <i class="fab fa-facebook-f mr-2"></i> Sign up with Facebook
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ? SignIn ends -->
<?php require_once APPROOT . '/views/inc/socialmedia.php';?>
<?php require_once APPROOT . '/views/inc/footer.php';
