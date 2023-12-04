<?php

include('../../config/app.php');
include_once('../controllers/StudentController.php');

if(isset($_POST['deleteStudent']))
{
    $id = validateinput($db->conn, $_POST['deleteStudent']);
    $student = new StudentController;
    $result = $student->delete($id);
    if($result)
    {
       redirect("Student Deleted Successfully","admin/student-view.php");
    }
    else
    {
        redirect("something went wrong","admin/student-view.php");
    }
}

if(isset($_POST['update_student']))
{
    $id = validateinput($db->conn,$_POST['student_id']);
    $inputData = [
        'fullname' =>validateinput($db->conn,$_POST['fullname']),
        'email' => validateinput($db->conn,$_POST['email']),
        'phone' => validateinput($db->conn,$_POST['phone']),
        'course' => validateinput($db->conn,$_POST['course']),
    ];
    $student = new StudentController;
    $result = $student->update($inputData, $id);

    if($result)
    {
       redirect("Student Added Successfully", "admin/student-view.php");
    }
    else
    {
        redirect("something went wrong", "student-view.php");
    }
}


if(isset($_POST['save_student']))
{
    $inputData = [
        'fullname' => validateinput($db->conn,$_POST['fullname']),
        'email' => validateinput($db->conn,$_POST['email']),
        'phone' => validateinput($db->conn,$_POST['phone']),
        'course' => validateinput($db->conn,$_POST['course']),
    ];

    $student = new StudentController;
    $result = $student->create($inputData);
    
    if($result)
    {
      redirect("Student Added Successfully","admin/student-add.php");
    }
    else
    {
        redirect("something went wrong","admin/student-add.php");
    }
}


?>