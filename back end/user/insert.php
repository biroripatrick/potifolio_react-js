<?php
include('../connection/connection.php');
include('../cors/index.php');
    function CreateUser()
     {
           global $conn;
           if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['c_password']))
           {
               $username=$_POST['username'];  
               $email=$_POST['email']; 
               $password=$_POST['password']; 
               $c_password=$_POST['c_password'];
                if ($password != $c_password){      //Check passwords for macth
                $message="password does not match try again";
                return json_encode(['message' => $message]);
           }
               $passwordHash = password_hash($password, PASSWORD_DEFAULT);//Hash(Encrypt) the password
               $sql="INSERT INTO users (username,email,password) VALUES ('$username','$email','$passwordHash')"; 
                         if(mysqli_query($conn,$sql)){
                             $message =  "User successfully created.";
                            return json_encode(['message' => $message]);
                        }
            }else{
                //TODO return missing field error message
                $message =  "missing field .";
                return json_encode(['message' => $message]);
            }
     }

     $response = createUser();
     echo $response;
        
