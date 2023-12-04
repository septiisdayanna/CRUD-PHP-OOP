<?php
include('../config/app.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();

include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Student Add</h4>
                </div>
                <div class="card-body">

                    <form action="codes/student-code.php" method="POST">
                        <div class="mb-3">
                            <label for="">Full Name</label>
                            <input type="text" name="fullname" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Email ID</label>
                            <input type="text" name="email" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Course</label>
                            <input type="text" name="course" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Phone No</label>
                            <input type="text" name="phone" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_student" class="btn btn-primary">Save Student</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>