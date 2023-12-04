<?php

include('../../config/app.php');
include_once('../controllers/UsersController.php');

if(isset($_POST['deleteUser']))
{
    $id = validateinput($db->conn, $_POST['deleteUser']);
    $User = new UserController;
    $result = $User->delete($id);
    if($result)
    {
       redirect("User Deleted Successfully","admin/user-view.php");
    }
    else
    {
        redirect("something went wrong","admin/user-view.php");
    }
}

if(isset($_POST['update_user']))
{
    $id = validateinput($db->conn,$_POST['user_id']);
    $inputData = [
        'fname' =>validateinput($db->conn,$_POST['fname']),
        'lname' =>validateinput($db->conn,$_POST['lname']),
        'email' => validateinput($db->conn,$_POST['email']),
        'password' => validateinput($db->conn,$_POST['password']),
        'role_as' => validateinput($db->conn,$_POST['role_as']),
    ];
    $user = new UserController;
    $result = $user->update($inputData, $id);

    if($result)
    {
       redirect("User Added Successfully", "admin/user-view.php");
    }
    else
    {
        redirect("something went wrong", "user-view.php");
    }
}


if(isset($_POST['save_user']))
{
    $inputData = [
        'fname' =>validateinput($db->conn,$_POST['fname']),
        'lname' =>validateinput($db->conn,$_POST['lname']),
        'email' => validateinput($db->conn,$_POST['email']),
        'password' => validateinput($db->conn,$_POST['password']),
        'role_as' => validateinput($db->conn,$_POST['role_as']),
    ];

    $user = new UserController;
    $result = $user->create($inputData);
    
    if($result)
    {
      redirect("User Added Successfully","admin/user-add.php");
    }
    else
    {
        redirect("something went wrong","admin/student-add.php");
    }
}


?>