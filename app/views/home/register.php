<?php
include_once('../app/views/home/layouts/header.php');
?>
<body>

<div class="login-page bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
              <h3 class="mb-3">Login Now</h3>
                <div class="bg-white shadow rounded">
                    <div class="row">
                        <div class="col-md-7 pe-0">
                            <div class="form-left h-100 py-5 px-5">
                                <form action="?route=register" method="post" class="row g-4">
                                        <div class="col-12">
                                            <label>Fullname<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Fullname" id="FullName" name="FullName" required>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <label>Username<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Username" id="UserName" name="UserName" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Email<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-person-fill"></i></div>
                                                <input type="text" class="form-control" placeholder="Enter Email" id="Email" name="Email" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" class="form-control" placeholder="Enter Password" id="Pass" name="Pass" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <label>Confirm Password<span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <div class="input-group-text"><i class="bi bi-lock-fill"></i></div>
                                                <input type="password" class="form-control" placeholder="Enter Confirm Password" id="ConfirmPass" name="ConfirmPass" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="float-end text-primary">Go to log in !!!</a>
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary px-4 float-end mt-4">Register</button>
                                        </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 ps-0 d-none d-md-block">
                            <div class="form-right h-100 bg-primary text-white text-center pt-5">
                                <i class="bi bi-bootstrap"></i>
                                <h2 class="fs-1">Welcome To Market!!!</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-end text-secondary mt-3">Bootstrap 5 Login Page Design</p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
 
</body>
<?php
include_once('../app/views/home/layouts/footer.php');
?>