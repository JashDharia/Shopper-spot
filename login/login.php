<?php
session_start();
include($_SERVER['DOCUMENT_ROOT'].'/vfl/config.php');

class Login extends Database{
    use Sanitize;
    public function user_Login($email,$password,$user_type){
        //$santizie=new Sanitize();
        if(isset($_SESSION['user_id'])){
            echo "<script>alert('you are already logged in!); location.replace('https://localhost/vfl/');</script>";
            header("location:https://localhost/vfl/");
        }
        $email=$this->test_input($email);
        $password=$this->test_input($password);

        $link=$this->connect();
        if($user_type=="shop"){
        $stmt=$link->prepare("SELECT passwords,id FROM shop WHERE email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($hash,$id);
        $stmt->fetch();
    }
    else{
        $stmt=$link->prepare("SELECT passwords,id FROM users WHERE email=?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($hash,$id);
        $stmt->fetch();   
    }
        if($hash!=NULL){
            if(password_verify($password,$hash)){
                $_SESSION['user_id']=$id;
                $_SESSION['user_type']=$user_type;
                return true;
            }
        }
    }
    public function user_signup($email,$password,$username){
        
        $link=$this->connect();
        
        $email=mysqli_real_escape_string($link,$this->test_input($email));
        $password=mysqli_real_escape_string($link,$this->test_input($password));
        $username=mysqli_real_escape_string($link,$this->test_input($username));
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        $url=$this->getName(rand(10,50));

        $sql="SELECT email FROM users WHERE email='$email'";
        if(mysqli_query($link,$sql)){
           return false; 
        }
        else{
            $sql="INSERT INTO users(email,user_name,passwords,user_url)VALUES('$email','$username','$password','$url')";
            if(mysqli_query($link,$sql)){
                return true;
            }
            else{
                echo "<script>alert(".$link->error.");</script>";
            }
        }
    }    

    //function to get a random string
    public function getName($n) { 
        
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
        $randomString = ''; 
        for ($i = 0; $i < $n; $i++) { 
            $index = rand(0, strlen($characters) - 1); 
            $randomString .= $characters[$index]; 
        } 
        return $randomString; 
    } 
}
trait Sanitize{
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

?>