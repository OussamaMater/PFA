<?php require_once APPROOT . '/views/inc/header.php' ?>
<!-- ? EditProfile starts -->
<div class="container">
    <div class="row">
        <div class="col-lg-10 col-xl-9 mx-auto">
            <div class="alert alert-success" role="alert">
                Welcome back <?php echo ucwords($_SESSION['user_fname']) ?>
            </div>
            <div class="<?php echo (isset($_SESSION['update_profile'])) ? "alert alert-secondary fade show" : "" ?>"
                role=" alert">
                <?php  if (isset($_SESSION['update_profile'])) : ?>
                <?php echo $_SESSION['update_profile'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
                <?php else : ?>
                <?php endif ?>
            </div>
            <div class="card card-profile flex-row my-5">
                <div class="card-img-left d-none d-md-flex">
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Profile Settings</h5>
                    <form class="form-signin"
                        action="<?php echo URLROOT; ?>users/profile"
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
                        <h5 class="card-title text-center">Contact Settings</h5>
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
                        <h5 class="card-title text-center">Profile Setting</h5>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type=" email" id="inputEmail" name="email"
                                class="form-control" placeholder="Email address"
                                value="<?php echo (!empty($data['email_err'])) ? '' : $data['email'];?>"
                                required />
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
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="password" id="inputCONPassword" name="confpassword"
                                class="form-control" placeholder="Confirm Password"
                                value="<?php echo (!empty($data['confpassword_err'])) ? '' : $data['confpassword'];?>"
                                required>
                            <label for="inputCONPassword">Confirm Password</label>
                            <div class="text-danger"><small><?php echo $data['confpassword_err']; ?></small>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-lg btn-outline-success btn-block text-uppercase"
                            name="action" value="update">
                            Update
                        </button>
                        <button type="button" class="btn btn-lg btn-outline-danger btn-block text-uppercase"
                            data-toggle="modal" data-target="#confirmDelete">
                            Delete
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="confirmDelete" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="ModelTitle">Delete Confirmation</h5>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete your account?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit"
                                            class="btn btn-lg btn-outline-danger btn-block text-uppercase" name="action"
                                            value="delete">
                                            Delete
                                        </button>
                                        <button type="button"
                                            class="btn btn-lg btn-outline-success btn-block text-uppercase"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ? SignUp ends -->
<?php require_once APPROOT . '/views/inc/socialmedia.php';?>
<?php require_once APPROOT . '/views/inc/footer.php';
