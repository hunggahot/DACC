<?php
require_once('../app/models/Post.php');

class PostController
{
    public function index()
    {
        $postlist = Post::getAll();
        require_once('../app/views/admin/post.php');
    }

    function createPost()
    {

        $userid = $_POST['userid'];
        $categoryid = $_POST['categoryid'];
        $posttitle = $_POST['posttitle'];
        $postdes = $_POST['postdes'];
        $posttime = date('d-m-Y H:i:s');
        $isSuccess = Post::create($userid, $categoryid, $posttitle, $postdes, $posttime);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?');
        else
            header('Location: ?route=failure');
        exit;

    }
    public function editPost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $postid = $_POST['id'];
            $isSuccess = Post::find($postid);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    function updatePost()
    {
        $postid = $_REQUEST['PostId'];
        $userid = $_REQUEST['UserId'];
        $categoryid = $_REQUEST['CategoryId'];
        $posttitle = $_REQUEST['PostTitle'];
        $postdes = $_REQUEST['PostDes'];
        $time = date('d-m-Y H:i:s');

        $posttime = $time . ' <small><em>(đã chỉnh sửa)</em></small>';
        $isSuccess = Post::update($postid, $userid, $categoryid, $posttitle, $postdes, $posttime);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=post');
        else
            header('Location: ?route=failure');
        exit;
    }

    function deletePost()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $postid = $_POST['PostId'];
            $isSuccess = Post::delete($postid);
            echo json_encode((['success' => $isSuccess]));
        }
    }
}