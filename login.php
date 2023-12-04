<?php
include('config/app.php');
include('codes/authenticaction_code.php');
$auth->isLoggedIn();
include('includes/header.php');
include('includes/navbar.php'); 
?>

<div class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">

               <?php include('message.php'); ?>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Login Form</h4>
                    </div>
                    <div class="card-body">
 
                        <form action="" method="POST">      
                
                            <div class="mb-2">
                                <label>Email Id</label>
                                <input type="text" name="email" placeholder="Enter Email Address" class="form-control">
                            </div>
                            <div class="mb-2">
                                <label>Password</label>
                                <input type="text" name="password" placeholder="Enter password" class="form-control">
                            </div>
                            <div class="mb-2">
                                <button type="submit" name="login_btn" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>