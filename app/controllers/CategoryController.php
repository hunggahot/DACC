<?php
require_once('../app/models/Category.php');

class CategoryController
{
    public function index()
    {
        $categorylist = Category::getAll();
        require_once('../app/views/admin/category.php');
    }

    public function createCategory()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $categoryname = $_POST['categoryname'];
            $categorydes = $_POST['categorydes'];
            $isSuccess = Category::create($categoryname, $categorydes);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    public function editCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $categoryid = $_POST['id'];
            $isSuccess = Category::find($categoryid);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    public function updateCategory()
    {
        $categoryid = $_REQUEST['CategoryId'];
        $categoryname = $_REQUEST['CategoryName'];
        $categorydes = $_REQUEST['CategoryDes'];
        $isSuccess = Category::update($categoryid, $categoryname, $categorydes);
        if ($isSuccess)
            // Redirect to homepage
            header('Location: ?route=category');
        else
            header('Location: ?route=failure');
        exit;
    }

    public function deleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $categoryid = $_POST['CategoryId'];
            $isSuccess = Category::delete($categoryid);
            echo json_encode((['success' => $isSuccess]));
        }
    }
}