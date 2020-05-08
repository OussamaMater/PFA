<?php require_once APPROOT . '/views/inc/header.php' ?>
<!-- ? EditProfile starts -->

<div class="container">
    <div class="row">
        <!-- edit form column -->
        <div class="col-md-3">
        </div>
        <div class="col-md-9 personal-info">
            <?php if (!isLoggedIn()) : ?>
            <div class="alert alert-info alert-dismissable col-md-12">
                This is an <strong>.alert</strong>. Use this to show important messages to the user.
            </div>
            <?php else : ?>
            <h3>Profile Setting</h3>
            <form class="form-horizontal" method="POST" action="">
                <div class="form-group">
                    <label class="col-lg-8 control-label">First name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-8 control-label">Last name:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <h3>Account Setting</h3>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Email:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="text">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-3 control-label">Confirm Password:</label>
                    <div class="col-lg-8">
                        <input class="form-control" type="password">
                    </div>
                </div>
                <h3>Contact Setting</h3>
                <label class="col-lg-3 control-label">Phone Number:</label>
                <div class="col-lg-8">
                    <input class="form-control" type="tel">
                </div>
                <?php endif ?>
            </form>
        </div>
    </div>
</div>

<!-- ? SignUp ends -->
<?php require_once APPROOT . '/views/inc/socialmedia.php';?>
<?php require_once APPROOT . '/views/inc/footer.php';
