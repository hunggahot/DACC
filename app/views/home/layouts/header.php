<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="../app/views/resources/css/bootstrap.min.css">
  <link rel="stylesheet" href="../app/views/resources/css/mysite.css">
</head>
<body>
<header class="p-3 mb-3 border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="?" class="nav-link px-2 link-secondary">Home</a></li>
        </ul>
  
        <?php
        session_start();
        ?>
        <div class="dropdown text-end">
          <?php if (isset($_SESSION['UserId'])): ?>
            
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
            <span><img src="../app/images/<?php echo $_SESSION['Avatar']; ?>"  class="img-circle" width="50" height="50"></span>
            
          </a>
          <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
            <li><p class="dropdown-header">Hello <?php echo $_SESSION['FullName']; ?> </p></li>
            <li><a class="dropdown-item" href="?route=edit-avatar">Update Avatar</a></li>
            <li><a class="dropdown-item" href="?route=my-post&UserId=<?php echo $_SESSION['UserId'];?>">My post</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="?route=logout">Sign out</a></li>
          </ul>
          <?php else: ?>
          <a href="?route=login" class="btn btn-outline-primary me-2">Login</a>
          <a href="?route=register" class="btn btn-primary">Register</a>
          <?php endif; ?>
        </div>
    </div>
  </header>
  <div class="container">
</body>
</html>


