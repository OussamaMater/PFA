<?php require_once APPROOT . '/views/inc/header.php' ?>
<!-- ? content starts -->

<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-9 text-left">
            <h3 id="storytext">What are you waiting for? Share your stories!</h3>
        </div>
        <div class="col-md-3">
            <a href="<?php echo (isLoggedIn()) ? '#addPost' : ''.URLROOT.'users/login' ;?>"
                class="btn btn-success btn-block" id="storybtn" data-toggle="modal">Add
                Story</a>
        </div>
    </div>
</div>
<!-- ? AddStoryModel starts -->

<div class="modal fade" id="addPost" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModelTitle">Share Your Story</h5>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form class="form-signin"
                        action="<?php echo URLROOT; ?>camps/stories"
                        method="POST" id="storyform" enctype="multipart/form-data">
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="text" id="storyName" name="storyName"
                                class="form-control" placeholder="Story Name" value="" required>
                            <label for="storyName">Story Name</label>
                        </div>
                        <div class="form-label-group">
                            <input style="border-radius:0 ;" type="text" id="storyDescription" name="storyDescription"
                                class="form-control" placeholder="Story Description" value="" required>
                            <label for="storyDescription">Story Description</label>
                        </div>
                        <div class="form-label-group">
                            <textarea rows="20" cols="100" style="border-radius:0 ;" id="storyStory" name="story"
                                class="form-control" value="" required></textarea>
                        </div>
                        <div class="form-label-group">
                            <input id="upload" type="file" name="storypicture" class="form-control border-0"
                                style="opacity: 0;">
                            <div>
                                <label>Choose file</label>
                                <label for="upload" class="btn btn-light m-0" style="display: block;"><i
                                        class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                        class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="addstory" value="addPost" form="storyform" id="editstory"
                    class="btn btn-lg btn-outline-primary btn-block text-uppercase">
                    Post
                </button>
                <button type="button" id="storybtn" class="btn btn-lg btn-outline-success btn-block text-uppercase"
                    data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ? AddStoryModel ends -->

<!-- ? DeleteStoryModel starts -->

<div class="modal fade" id="showDetails" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModelTitle">User informations</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this post?
            </div>
            <div class="modal-footer">
                <button style="border-radius: 0;" type="button"
                    class="btn btn-lg btn-outline-success btn-block text-uppercase" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- ? DeleteStoryModel ends -->

<br>
<br>
<!-- ? StoryCard starts -->

<div class="container">
    <div class="<?php echo (isset($_SESSION['add_post'])) ? "alert alert-{$_SESSION['class']} fade show" : "" ?>"
        style=" border-radius:0;" role=" alert">
        <?php  if (isset($_SESSION['add_post'])) : ?>
        <?php echo $_SESSION['add_post'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">x</button>
        <?php else : ?>
        <?php endif ?>
    </div>
    <?php if (!empty($data['story'])) : ?>
    <?php foreach ($data['story'] as $story) : ?>
    <form class="form-signin"
        action="<?php echo URLROOT; ?>camps/stories" method="POST">
        <div class="card" style=" border-radius:0;">
            <div class="card-header">
                <?php echo $story->userName; ?>
                <?php if (!isLoggedIn() || $_SESSION['user_id'] != $story->Writer) : ?>
                <button
                    href="<?php echo (!isLoggedIn()) ?  ''.URLROOT.'users/login' : '#showDetails' ;?>"
                    style="border-radius: 0;" class="btn btn-outline-success float-right" data-toggle="modal"><i
                        class="fas fa-info"></i></button>
                <?php endif ?>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card-body text-left">
                        <h5 class="card-title"><?php echo $story->Name; ?>
                        </h5>
                        <hr>
                        <p><?php echo $story->Description; ?>
                        </p>
                        <p class="card-text collapse" id="collapseExample"><?php echo $story->Content; ?>
                        </p>
                        <p><small> <em><?php echo $story->Date; ?></em>
                            </small></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <img id="storypicture"
                        src="../PICS/<?php echo $story->imageName;?>">
                </div>
            </div>
            <div class="card-footer text-muted">
                <div class="row">
                    <div class="col-md-4">
                        <?php echo (!isLoggedIn() || $_SESSION['user_id'] != $story->Writer) ? '' : '<button type="submit" name="action" value="'.$story->storyId.'"id="deletestory" class="btn btn-outline-danger btn-block">Delete</button>';?>
                    </div>
                    <div class="col-md-4"><a id="readstory" href="#collapseExample"
                            class="btn btn-outline-success btn-block" data-toggle="collapse" role="button"
                            aria-expanded="false" aria-controls="collapseExample">Read</a>
                    </div>
                    <div class="col-md-4"><?php echo (!isLoggedIn() || $_SESSION['user_id'] != $story->Writer) ? '' : '<button name="edit" id="editstory" class="btn btn-outline-primary btn-block">Edit</button>';?>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br>
    <?php endforeach ?>
    <?php else :?>
    <img style="display: block;
    margin: 0 auto;" class="center" src="../PICS/giphy.gif">
    <div class="noPosts">
        <p class="text-center">
            <span id="nopost">N</span>
            <span id="nopost">O</span>
            <span id="nopost">&nbsp;</span>
            <span id="nopost">P</span>
            <span id="nopost">O</span>
            <span id="nopost">S</span>
            <span id="nopost">T</span>
            <span id="nopost">S</span>
            <span>&nbsp;</span>
            <span id="nopost">Y</span>
            <span id="nopost">E</span>
            <span id="nopost">T</span>
        </p>
    </div>
    <?php endif ?>
</div>

<!-- ? StoryCard ends -->

<!-- ? content ends-->
<?php require_once APPROOT . '/views/inc/socialmedia.php';?>
<?php require_once APPROOT . '/views/inc/footer.php';
