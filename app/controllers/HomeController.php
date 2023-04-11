<?php
require_once('../app/models/Category.php');
require_once('../app/models/Post.php');
class HomeController{
    public function index(){
        $categorylist = Category::getAll();
        $postlist = Post::getAll();
        require_once('../app/views/home/trang-chu.php');
    }
}