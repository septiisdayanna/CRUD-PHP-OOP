<?php
 session_start();

 define('DB_HOST', 'localhost');
 define('DB_USER', 'root');
 define('DB_PASSWORD', '');
 define('DB_DATABASE', 'db-student');
 define('SITE_URL', 'http://localhost/CRUD-PHP-OOP/');

include_once('DBConn.php');
$db = new DBConn;


function base_url($slug)
{
    echo SITE_URL.$slug;
}


function redirect($message,$page)
{
    $redirectTo = SITE_URL.$page;
    $_SESSION['message'] = "$message";
    header("Location: $redirectTo");
    exit(0);
}

function validateinput($dbcon, $input)
{
    return mysqli_real_escape_string($dbcon, $input);
}

?>