<?php

include('signup.php');

$email=$_POST['email'];
$password=$_POST['password'];
$shop_name=$_POST['shop_name'];
$address=$_POST['address'];
$phone_no=$_POST['phone_no'];
$gst=$_POST['gst'];
echo $email;
$signup=new Signup();
if($signup->sign_up($email,$password,$shop_name,$address,$phone_no,$gst)){
    echo "<script>alert('success');</script>";
    return "true";
}
else{
    echo "<script>alert('error');</script>";
    return "true";
}

?>