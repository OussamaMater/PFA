<?php

/**
 * Controller
 *
 * Camps Controller
 */
class Camps extends Controller
{
    public function __construct()
    {
        $this->storiesModel = $this->model('Stories');
    }
    public function index()
    {
        redirect('errors/notfound');
    }
    public function locations()
    {
        $this->view('camps/nearme');
    }
    public function stories()
    {
        if (isLoggedIn()) {
            $stories = $this->storiesModel->getStories();
            $data    = [
                'story' => $stories
            ];
            if ((filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') && (filter_has_var(INPUT_POST, 'action'))) {
                if ($this->storiesModel->deleteStory($_POST['action'])) {
                    flash('add_post', "We're sorry to see you deleting your stories", 'info');
                    redirect('camps/stories');
                    return;
                }
            } elseif ((filter_input(INPUT_SERVER, 'REQUEST_METHOD') == 'POST') && (filter_input(INPUT_POST, 'addstory')=='addPost')) {
                $addData = [
                    'writer'          => $_SESSION['user_id'],
                    'name'            => trim(filter_input(INPUT_POST, 'storyName')),
                    'description'     => trim(filter_input(INPUT_POST, 'storyDescription')),
                    'content'         => trim(filter_input(INPUT_POST, 'story')),
                    'imageName'       => trim($_FILES['storypicture']['name']),
                    'date'            => date("Y-m-d"),
                    'name_err'        => '',
                    'description_err' => '',
                    'content_err'     => '',
                    'image_err'       => ''
                ];
                $fileExt = explode('.', $_FILES['storypicture']['name']);
                $fileExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');
                if (strlen($addData['name'])<10) {
                    $addData['name_err'] = 'A good name could be helpful!';
                }
                if (strlen($addData['description'])<20) {
                    $addData['description_err'] = 'Brief things are the best';
                }
                if (!in_array($fileExt, $allowed)) {
                    $addData['image_err'] = 'Image extension is not allowed';
                } elseif ($_FILES['storypicture']['size']>1000000) {
                    $addData['image_err'] = 'Image is too big';
                }
                if (strlen($addData['content'])<255) {
                    $addData['content_err'] = 'This story is too short to be shared!';
                }
                if (empty($addData['image_err']) && empty($addData['content_err']) && empty($addData['name_err']) && empty($addData['description_err'])) {
                    if ($this->storiesModel->addStories($addData)) {
                        move_uploaded_file($_FILES['storypicture']['tmp_name'], UPLOADS.$_FILES['storypicture']['name']);
                        flash('add_post', 'Yay <i class="fas fa-laugh-beam"></i> ! Your story has been added', 'success');
                        redirect('camps/stories');
                    }
                    return;
                }
                flash('add_post', 'huh <i class="fas fa-sad-tear"></i> guess you messed up things, try again!', 'danger');
                $this->view('camps/stories', $data);
            }
            $this->view('camps/stories', $data);
        }
        $stories = $this->storiesModel->getStories();
        $data    = [
                    'story' => $stories
                ];
        $this->view('camps/stories', $data);
    }
}
