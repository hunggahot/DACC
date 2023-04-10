<?php
include_once('../app/views/home/layouts/header.php');
?>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPostModal">
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
                    <input type="hidden" id="userid" name="userid"
                                            value="<?php echo $_SESSION['UserId']; ?>" require>
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

<?php
include_once('../app/views/home/layouts/footer.php');
?>