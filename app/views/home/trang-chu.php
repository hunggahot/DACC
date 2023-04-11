<?php
include_once('../app/views/home/layouts/header.php');
?>

<button type="button" onclick="createPost()" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
    Create Post
</button>
<div class="modal fade" id="createPostModal" tabindex="-1" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createPostModalLabel">Create Post</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="?route=create-post" method="post">
                    <div clas="mb-3">
                        <input type="hidden" id="userid" name="userid" value="<?= $_SESSION['UserId']; ?>"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="categoryid">Loại sản phẩm</label>
                        <select class="form-select" name="categoryid" id="categoryid">
                            <?php foreach ($categorylist as $category): ?>
                                <option value="<?= $category['CategoryId'] ?>"> <?= $category['CategoryName'] ?> </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="posttitle" class="form-label">Title</label>
                        <input type="text" class="form-control" id="posttitle" name="posttitle">
                    </div>
                    <div class="mb-3">
                        <label for="postdes" class="form-label">Description</label>
                        <textarea class="form-control" id="postdes" name="postdes" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </form>
                            </div>

        </div>
    </div>
</div>

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
            <button class="like-btn"><i class="fa fa-thumbs-up"></i> Like</button>
            <button class="comment-btn"><i class="fa fa-comment"></i> Comment</button>
            <button class="share-btn"><i class="fa fa-share"></i> Share</button>
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