<?php
require_once('../app/models/Comment.php');

class CommentController
{

    public function index()
    {
        $commentlist = Comment::getAll();
        require_once('../app/views/admin/comment.php');
    }

    public function createComment()
    {
        session_start();
        $userid = $_POST['userid'];
        $postid = $_POST['postid'];
        $comment = $_POST['comment'];
        $datetime = date('d-m-Y H:i:s');
        $isSuccess = Comment::create($userid, $postid, $comment, $datetime);
        echo json_encode(['success' => $isSuccess]);
    }

    public function editComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $commentid = $_POST['id'];
            $isSuccess = Comment::find($commentid);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    public function updateComment()
    {
        $commentid = $_REQUEST['CommentId'];
        $userid = $_REQUEST['UserId'];
        $postid = $_REQUEST['PostId'];
        $comment = $_REQUEST['Comment'];
        $date = date('d-m-Y H:i:s');

        $datetime = $date . ' <small><em>(đã chỉnh sửa)</em></small>';
        $isSuccess = Comment::update($commentid, $userid, $postid, $comment, $datetime);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=comment');
        else
            header('Location: ?route=failure');
        exit;
    }

    public function deleteComment()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $commentid = $_POST['CommentId'];
            $isSuccess = Comment::delete($commentid);
            echo json_encode((['success' => $isSuccess]));
        }
    }
}