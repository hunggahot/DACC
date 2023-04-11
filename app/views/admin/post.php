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
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editPostModal-<?= $post['PostId'] ?>"
                        data-id="<?= $post['PostId']; ?>"
                        data-name="<?= $post['PostId']; ?>">Details</button>

                        <a href="?route=delete-post&PostId=<?= $post['PostId'] ?>" class="btn btn-danger">Delete</a>

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
                                            <label >User Name: <?= $post['FullName'] ?> </label> 
                                            </br>
                                            <label >Post Des: <?= $post['PostDes'] ?> </label>                                           
                                        </div>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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