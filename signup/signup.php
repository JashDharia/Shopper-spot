<?php

include('../config.php');

class Signup extends Database{

    public function sign_up($email,$password,$shop_name,$address,$phone_no,$gst){

        $email=$this->test_input($email);
        $password=$this->test_input($password);
        $shop_name=$this->test_input($shop_name);
        $address=$this->test_input($address);
        $gst=$this->test_input($gst);
        $phone_no=$this->test_input($phone_no);
        
        $link=$this->connect();

        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
        $url=$this->getName(rand(10,50));
        $sql="INSERT INTO shop(email,passwords,user_url,shop_name,shop_address,phone_no,gst_no) VALUES('$email','$password','$url','$shop_name','$address','$phone_no','$gst')";    
        $res=mysqli_query($link,$sql);
        if($res!=NULL){
            return TRUE;
        }
        else{
            return false;
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
            $sql="INSERT INTO users(email,user_name,passwords)VALUES('$email','$username','$password')";
            if(mysqli_query($link,$sql)){
                return true;
            }
            else{
                return false;
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
    //function to sanitizes data
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    
    }
}


?>