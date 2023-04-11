<?php
include_once('../app/views/home/layouts/header.php');
?>
<div class="row justify-content-center mt-5">
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h3 class="text-center">EDIT AVATAR</h3>
        <p class="text-danger">
          <?php
            if(isset($_SESSION['Error'])){
              echo "Loi: <br/>" . $_SESSION['Error'];
            }
          ?>
        </p>
      </div>
      <div class="card-body">
        <form action="?route=edit-avatar" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="avatar">Avatar: </label>
            <input type="file" class="form-control" id="avatar" name="avatar" required>
          </div>
          <br />
          <button type="submit" class="btn btn-primary w-100">Upload Avatar</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>

<?php
include_once('../app/views/home/layouts/footer.php');
?>