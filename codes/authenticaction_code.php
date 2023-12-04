<?php
//include('config/app.php');
include_once('controllers/RegisterController.php');
include_once('controllers/LoginController.php');

$auth = new LoginController;

if (isset($_POST['logout_btn'])) 
{
    $checkLoggedOut = $auth->logout();
    if ($checkLoggedOut){
        redirect("Logged Out Succesfully", "login.php");
    } 
}

if (isset($_POST['login_btn'])) 
{
    $email = validateinput($db->conn, $_POST['email']);
    $password = validateinput($db->conn, $_POST['password']);
    
    $checkLogin = $auth->userLogin($email,$password);
    if ($checkLogin) 
    {
        if ( $_SESSION['auth_role'] == '1') 
        {
            redirect("Logged In Succesfully", "admin/index.php");
        }
        else
        {
            redirect("Logged In Succesfully", "index.php");
        }
    } 
    else 
    {
        redirect("Invalid Email Id or Password", "login.php");
    } 
}


if(isset($_POST['register_btn']))
{
    $fname = validateinput($db->conn, $_POST['fname']);
    $lname = validateinput($db->conn, $_POST['lname']);
    $email = validateinput($db->conn, $_POST['email']);
    $password = validateinput($db->conn, $_POST['password']);
    $confirm_password = validateinput($db->conn, $_POST['confirm_password']);

    $register = new RegisterController;
    $result_password = $register->confirmPassword($password,$confirm_password);
    if ($result_password) 
    {
        $result_user = $register->isUserExists($email);
        if ($result_user) {
            redirect("Already Email Exists", "register.php");
        } else {
            $register_query = $register->registration($fname,$lname,$email,$password);
            if ($register_query) {
                redirect("Registered Succesfully", "register.php");
            } else {
                redirect("Something Went Wrong", "register.php");
            }
            
        }
        
    } else 
    {
        redirect("Password and Confirm Password Does not match", "register.php");
    }
    
}

?>