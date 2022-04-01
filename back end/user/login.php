<?php    
include('../connection/connection.php');
include('../cors/index.php');
function Createlogin()
     {
           global $conn;
           if(isset($_POST['email']) && isset($_POST['password']))
           { 
              $email=$_POST['email'];
              $password=$_POST['password'];
                $dbpassword = 'select password from users where email = $email';
               if(empty($password)){
                  return 'Invalid email or password';
                } 
           if (password_verify($password,$dbpassword)) {     
              $message= "Comparison MATCHES!!!";
              return json_encode(['message' => $message]);
          } else {
            $message= "password does NOT Match";
            return json_encode(['message' => $message]);
          }
          }
        }
     echo createlogin();
     