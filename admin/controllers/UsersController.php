<?php

class UserController
{
    public $conn;
    public function __construct()
    {
        $db = new DBConn;
        $this->conn = $db->conn;
    }

    public function index()
    {
        $usersQuery = "SELECT * FROM users";
        $result = $this->conn->query($usersQuery);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }


    public function create($inputData)
    {
        $data = "'" . implode ( "','", $inputData) . "'";
        $usersQuery = "INSERT INTO users (id,fname,lname,email,password,role_as) VALUES ($data)";
        
        $result = $this->conn->query($usersQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function edit($id)
    {
        $users_id = validateinput($this->conn, $id);
        $usersQuery = "SELECT * FROM users WHERE id='$users_id' LIMIT 1";
        $result = $this->conn->query($usersQuery);
        if($result->num_rows == 1){
            $data = $result->fetch_assoc();
            return $data;
        }else{
            return false;
        }
    }

    public function update($inputData, $id)
    {
        $users_id = validateinput($this->conn, $id);
        $fname = $inputData['fname'];
        $lname = $inputData['lname'];
        $email = $inputData['email'];
        $password = $inputData['password'];
        $role_as = $inputData['role_as'];

        $usersQuery = "UPDATE users SET fname='$fname', lname='$lname', email='$email', password='password', role_as='$role_as' WHERE id='$users_id' LIMIT 1";
        $result = $this->conn->query($usersQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $users_id = validateinput($this->conn,$id);
        $usersDeleteQuery = "DELETE FROM users WHERE id='$users_id' LIMIT 1";
        $result = $this->conn->query($usersDeleteQuery);
        if($result){
            return true;
        }else{
            return false;
        }
    }
}
?>