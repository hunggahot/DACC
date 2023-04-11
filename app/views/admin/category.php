<?php
include_once('../app/views/admin/layouts/header.php');
?>

<div class="container mt-5">
    <h1>Category List</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategoryModal">
        Add Category
    </button>
    <hr>
    <table id="categoryTable" class="table table-striped table-bordered dt-responsive nowrap">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categorylist as $category): ?>
            <tr>
                <td>
                    <?= $category['CategoryId'] ?>
                </td>
                <td>
                    <?= $category['CategoryName'] ?>
                </td>
                <td>
                    <button class="btn btn-primary edit-category" data-toggle="modal" data-target="#editCategoryModal-<?= $category['CategoryId'] ?>"
                        data-id="<?= $category['CategoryId']; ?>"
                        data-name="<?= $category['CategoryId']; ?>">Edit</button>

                    <button data-toggle="modal" data-target="#deleteCategoryModal"
                        class="btn btn-danger delete-category-btn"
                        data-id="<?= $category['CategoryId']; ?>">Delete</button>

                    <!-- Edit Category Modal -->
                    <div class="modal fade" id="editCategoryModal-<?= $category['CategoryId'] ?>" tabindex="-1"
                        role="dialog" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCategoryModalLabel">Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="?route=update-category" method="post" enctype="multipart/form-data">
                                        <input type="hidden" id="editCategoryId" name="CategoryId"
                                            value="<?= $category['CategoryId'] ?>" require>
                                        <div class="form-group">
                                            <label for="editCategoryName">Category Name</label>
                                            <input type="text" class="form-control" id="editCategoryName"
                                                name="CategoryName" value="<?= $category['CategoryName'] ?>" require>
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

<!-- Add Category Modal -->
<div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addCategoryForm">
                    <div class="form-group">
                        <label for="categoryname">Category Name</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="addCategory()">Save changes</button>
            </div>
        </div>
    </div>
</div>
<?php
include_once('../app/views/admin/layouts/footer.php');
?>