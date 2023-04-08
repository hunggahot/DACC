<?php
require_once('../app/models/Image.php');

class ImageController
{
    public function index()
    {
        $imagelist = Image::getAll();
        require_once('../app/views/admin/image.php');
    }

    public function createImage()
    {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $postid = $_POST['postid'];
            $isUploaded = $this->uploadImageFile();
            if ($isUploaded == 1) {
                $imagepath = htmlspecialchars(basename($_FILES["imagepath"]['name']));
            }
            $isSuccess = Image::create($postid, $imagepath);
            echo json_encode(['success' => $isSuccess]);
        }
    }

    public function updateImage()
    {
        $imageid = $_REQUEST['ImageId'];
        $postid = $_REQUEST['PostId'];
        $isUploaded = $this->uploadImageFile();

        if ($isUploaded == 1) {
            $imagepath = htmlspecialchars(basename($_FILES["imagepath"]['name']));
        }
        $isSuccess = Image::update($imageid, $postid, $imagepath);
        echo json_encode(['success' => $isSuccess]);
    }

    public function uploadImageFile()
    {
        $target_dir = "../app/views/resources/images/";
        $target_file = $target_dir . basename($_FILES["imagepath"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["imagepath"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check file size
        if ($_FILES["imagepath"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["imagepath"]["tmp_name"], $target_file)) {
                // echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
                return 1;
            } else {
                // echo "Sorry, there was an error uploading your file.";
                return 0;
            }
        }
    }

    public function deleteImage()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $imageid = $_POST['ImageId'];
            $isSuccess = Image::delete($imageid);
            echo json_encode((['success' => $isSuccess]));
        }
    }

}