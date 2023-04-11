<?php
include_once('../app/views/home/layouts/header.php');
?>
<?php foreach ($postlist as $post): ?>
<div class="post">
    <div class="post-header">
        <img class="avatar" src="../app/images/<?php echo $post['Avatar']; ?>" alt="User Avatar">
        <div class="post-info">

            <h4 class="username">
                <?php echo $post['FullName']; ?>
            </h4>
            <p class="timestamp">
                <?php echo $post['PostTime']; ?>
            </p>
        </div>
    </div>
    <div class="post-content">
        <h2>
            <?php echo $post['PostTitle']; ?>
        </h2>
        <p>
            <?php echo $post['PostDes']; ?>
        </p>
        <!--<img src="../app/images/" alt="Post Image">-->
    </div>
    <div class="post-actions">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal-<?= $post['PostId'] ?>"><i class="fa fa-share"></i>
            Edit</button>
        <a href="?route=delete-mypost&PostId=<?= $post['PostId'] ?>" class="btn btn-danger">Delete</a>
        <div class="modal fade" id="createPostModal-<?= $post['PostId'] ?>" tabindex="-1" aria-labelledby="createPostModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="?route=edit-post" method="post">
                        <input type="hidden" id="editCategoryId" name="CategoryId"
                                            value="<?= $post['PostId'] ?>" require>
                            <div class="form-group">
                                <label for="category">Loại sản phẩm</label>
                                <select class="form-control" name="category" id="category">
                                    <?php foreach ($categorylist as $category): ?>
                                    <option value="<?= $category['CategoryId']; ?>"
                                        <?php if ($post['CategoryId'] == $category['CategoryId']) echo 'selected'; ?>>
                                        <?= $category['CategoryName'] ?></option>

                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                            <label for="editCategoryName">Title</label>
                                            <input type="text" class="form-control" id="editCategoryName"
                                                name="CategoryName" value="<?= $post['PostTitle'] ?>" require>
                                        </div>
                                        <div class="form-group">
                                            <label for="editCategoryName">Des</label>
                                            <input type="text" class="form-control" id="editCategoryName"
                                                name="CategoryName" value="<?= $post['PostDes'] ?>" require>
                                        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>
<?php endforeach; ?>





<script>
function createPost() {
    var isLoggedIn = <?php echo isset($_SESSION['UserId']) ? 'true' : 'false'; ?>;

    if (!isLoggedIn) {
        window.location.href = "?route=login";
    }
}
</script>
<?php
include_once('../app/views/home/layouts/footer.php');
?>