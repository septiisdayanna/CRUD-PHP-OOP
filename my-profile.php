<?php
include('config/app.php');
include_once('controllers/AuthenticationController.php');

$authenticated = new AuthenticationController;
$data = $authenticated->authDetail();

include('includes/header.php');
include('includes/navbar.php'); 
?>

<div class="py-5">
    <div class="container">

        <?php include('message.php'); ?>
        <h1>My Profile Page</h1>
        <hr>
        <h4>Full Name : <?= $data['fname'].''.$data['lname']; ?></h4>
        <h4>Email : <?= $data['email']; ?></h4>
        <h4>Created At : <?= date('d-m-y',strtotime($data['created_at'])); ?></h4>
    </div>
</div>

<?php
include('includes/footer.php');
?>