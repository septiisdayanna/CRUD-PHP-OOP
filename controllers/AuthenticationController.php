<?php

class AuthenticationController
{   
   public $conn;
   public function __construct()
   {
        $db = new DBConn;
        $this->conn = $db->conn;
        $this->checkIsLoggedIn();
   } 

   public function admin()
   {
        $user_id = $_SESSION['auth_user']['user_id'];
        $checkAdmin = "SELECT id,role_as FROM users WHERE id='$user_id' AND role_as='1' LIMIT 1";
        $result = $this->conn->query($checkAdmin);
        if ( $result->num_rows == 1) {
            return true;
        } else {
            redirect("Your are not authorized as admin", "index.php");
        }
   }

   private function checkIsLoggedIn()
   {
        if(!isset($_SESSION['authenticated']))
        {
            redirect("Login to Access the page", "login.php");
            return false;
        }
        else 
        {
            return true;
        }
   }
   
   public function authDetail()
   {
        $checkAuth = $this->checkIsLoggedIn();
        if ( $checkAuth) {
            $user_id =  $_SESSION['auth_user']['user_id'] ;

            $getUserData = "SELECT * FROM users WHERE id='$user_id' LIMIT 1";
            $result = $this->conn->query($getUserData);
            if ( $result->num_rows > 0) {
                $data = $result->fetch_assoc();
                return $data;
            } else {
                redirect("Something Went Wrong", "login.php");
            }
            
        } else {
            return false;
        }
        
   }
}   

?>