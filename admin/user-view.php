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
                    <h4>Users View</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role As</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $user = new UserController;
                                    $result =  $user->index();
                                    if ($result) {

                                        foreach($result as $row)
                                        {
                                            ?>
                                                <tr>
                                                    <td><?= $row['id'] ?></td>
                                                    <td><?= $row['fname'] ?></td>
                                                    <td><?= $row['lname'] ?></td>
                                                    <td><?= $row['email'] ?></td>
                                                    <td><?= $row['password'] ?></td>
                                                    <td><?= $row['role_as'] ?></td>
                                                    <td>
                                                        <a href="user-edit.php?id=<?=$row['id'];?>" class="btn btn-success">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form action="codes/user-code.php" method="POST">
                                                            <button type="submit" name="deleteUser" value="<?= $row['id'] ?>" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php
                                        }
                            
                                    } 
                                    else 
                                    {
                                        echo "no record found";
                                    }
                                    
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
include('includes/scripts.php');
?>