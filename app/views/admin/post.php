<?php
include_once('../app/views/admin/layouts/header.php');
?>

<div class="container mt-5">
    <h1>Post List</h1>
    <hr>
    <table id="postTable" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postlist as $post): ?>
            <tr>
                <td>
                    <?= $post['PostId'] ?>
                </td>
                <td>
                    <?= $post['PostTitle'] ?>
                </td>
                <td>
                    <button class="btn btn-primary edit-post" data-toggle="modal" data-target="#editPostModal-<?= $post['PostId'] ?>"
                        data-id="<?= $post['PostId']; ?>"
                        data-name="<?= $post['PostId']; ?>">Details</button>

                    <button data-toggle="modal" data-target="#deletePostModal"
                        class="btn btn-danger delete-post-btn"
                        data-id="<?= $post['PostId']; ?>">Delete</button>

                    <!-- Edit Post Modal -->
                    <div class="modal fade" id="editPostModal-<?= $post['PostId'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="editPostModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPostModalLabel">Edit Post</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="?route=update-post" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="editPostId" name="PostId"
                                            value="<?= $post['PostId'] ?>" require>
                                        <div class="form-group">
                                            <label for="editPostName">Post Name</label>
                                            <input type="text" class="form-control" id="editPostName"
                                                name="PostName" value="<?= $post['PostName'] ?>" require>
                                        </div>
                                        <button type="submit" class="btn btn-primary ">Save changes</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Add Post Modal -->
<div class="modal fade" id="addPostModal" tabindex="-1" role="dialog" aria-labelledby="addPostModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPostModalLabel">Add Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addPostForm">
                    <div class="form-group">
                        <label for="Postname">Post Name</label>
                        <input type="text" class="form-control" id="Postname" name="Postname" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addPost()">Save changes</button>
            </div>
        </div>
    </div>
</div>

<?php
include_once('../app/views/admin/layouts/footer.php');
?>