<?php
include('../config/app.php');
include_once('../controllers/AuthenticationController.php');
$authenticated = new AuthenticationController;
$authenticated->admin();

include_once('controllers/UsersController.php');

include('includes/header.php');
?>

<div class="container-fluid px-4">
    <div class="row mt-4">
        <div class="col-md-12">
            <?php include('../message.php'); ?>
            <div class="card">
                <div class="card-header">
                    <h4>Users Edit</h4>
                </div>
                <div class="card-body">
                <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = validateinput($db->conn,$_GET['id']);
                            $user = new UserController;
                            $result = $user->edit($user_id);

                            if($result)
                            {
                                ?>
                                    <form action="codes/user-code.php" method="POST">
                                        <input type="hidden" name="user_id" value="<?=$result['id']?>">

                                        <div class="mb-3">
                                            <label for="">First Name</label>
                                            <input type="text" name="fname" value="<?=$result['fname']?>" required class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Last Name</label>
                                            <input type="text" name="lname" value="<?=$result['lname']?>" required class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Email ID</label>
                                            <input type="text" name="email" value="<?=$result['email']?>" required class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Password</label>
                                            <input type="text" name="password" value="<?=$result['password']?>" required class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="">Role As</label>
                                            <input type="text" name="role_as" value="<?=$result['role_as']?>" required class="form-control" />
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_user" class="btn btn-primary">Update User</button>
                                        </div>
                                    </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Record Found</h4>";
                            }
                        }
                        else
                        {
                            echo "<h4>Something Went Wront</h4>";
                        }
                    ?>  

                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>