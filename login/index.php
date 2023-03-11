<?php 
//include('login.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/vfl/login/login.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Shopper's Spot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://localhost/vfl/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
         <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="https://localhost/vfl/index.html"><img src="https://localhost/vfl/images/logo.png" width="150px" alt="logo"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="https://localhost/vfl/index.php">Home</a></li>
                        <li><a href="https://localhost/vfl/products/">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="https://localhost/vfl/profile/">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>   

        <!-- -------account page------ -->
        <div class="account-page">
            <div class="container">
                <div class="row">
                    <div class="col-2">
                        <img src="https://localhost/vfl/images/basket.png" width="75%">
                    </div>
                    <div class="col-2">
                        <div class="form-container">
                            <div class="form-btn">
                                <span onclick="login()">Login</span>
                                <span onclick="register()">Register</span>
                                <hr id="Indicator">
                            </div>

                            <form id="LoginForm" method="POST">
                                <input type="text" placeholder="email" name="email">
                                <input type="password" placeholder="Password" name="password">
                                <select name="user_type">
                                    <option value="user">user</option>
                                    <option value="shop">shop</option>
                                </select>
                                <button type="submit" name="submit" class="btn">Login</button>
                                <button id="google" class="btn">login with google</button>
                                <a href="#">Forgot Password</a>
                            </form>
                            <script type="text/javascript">
                                $("#google").click(function(){
                                    location.href="https://localhost/vfl/login/google.php";
                                });
                            </script>
                            <form method="POST" id="RegForm">
                                <input type="text" placeholder="Username" name="username">
                                <input type="email" placeholder="Email" name="emails">
                                <input type="password" placeholder="Password" name="passwords">
                                <button type="submit" class="btn" name="register">Register</button>
                                <button class="btn shop">for shops</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".shop").click(function(){
                    location.href="https://localhost/vfl/signup/";
                });
            });
        </script>
        <?php
    //just temporary
    if(isset($_POST['submit'])){
        
        $email=$_POST['email'];
        $password=$_POST['password'];
        $user_type=$_POST['user_type'];
        $login= new Login();
        if($login->user_Login($email,$password,$user_type)){
            echo "<script>alert('you are logged in');</script>";
            header("location:https://localhost/vfl/");
        }
        else{
            echo "<script>alert('there was an error!');</script>";
        }
    }
    if(isset($_POST['register'])){
       
        $email=$_POST['emails'];
        $password=$_POST['passwords'];
        $username=$_POST['username'];
        $signup=new Login();
        if($signup->user_signup($email,$password,$username)){
        echo "<script>alert('hi');</script>";     
        }
    }
?>
    
    <!-------js for toggle menu------>  
    <script>
        var MenuItems = document.getElementById("MenuItems");
        MenuItems.style.maxHeight = "0px";
        
        function menutoggle(){
            if(MenuItems.style.maxHeight == "0px")
            {
                MenuItems.style.maxHeight = "200px";
            }
            else
            {
                MenuItems.style.maxHeight = "0px";
            }
        }
    </script>

    <!-- -------js for toggle form--------- -->
    <script>
        var LoginForm = document.getElementById("LoginForm");
        var RegForm = document.getElementById("RegForm");
        var Indicator = document.getElementById("Indicator");
         
         function register(){
             RegForm.style.transform = "translateX(0px)";
             LoginForm.style.transform = "translateX(0px)";
             Indicator.style.transform = "translateX(50px)";
         }
         function login(){
             RegForm.style.transform = "translateX(300px)";
             LoginForm.style.transform = "translateX(300px)";
             Indicator.style.transform = "translateX(0px)";
         }
    </script>
</body>
</html>
