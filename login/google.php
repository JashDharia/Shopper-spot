<?php
session_start();
//check if user is already logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://localhost/vfl/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="https://localhost/vfl/images/logo.png" width="150px" alt="logo"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="https://localhost/vfl/">Home</a></li>
                        <li><a href="https://localhost/vfl/products/">Products</a></li>
                        
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div> 
        </div>
    </div>  
    <table style="max-width: 400px;">
    <tr>
        <td>
            <img src="https://img-authors.flaticon.com/google.jpg" style="max-width: 200px; max-height: 200px;">
        </td>
        <td>
            <button name="submit" onclick="googleSignin()" style="padding: 10px;">signin with Google</button>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <button name="signout" onclick="googleSignout()" style="padding: 10px;">signout</button>
        </td>
    </tr>
    </table>
<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.6.0/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.6.1/firebase-analytics.js"></script>
<script src="http://localhost/vfl/config.js"></script>
<script src="http://localhost/vfl/login/login.js"></script>
<div class="offer">
         <div class="small-container">
             <div class="row">
                 <div class="col-2">
                     <img src="https://localhost/vfl/images/hoodie.png" class="offer-img">
                 </div>
                 <div class="col-2">
                     <p>Exclusively Available on Shopper's Spot.</p>
                     <h1>Red Hoodie for Women</h1>
                     <small>Comfortable Hoodies. Available in all sizes.</small>
                     <a href="#" class="btn">Buy Now &#10132;</a>
                 </div>
             </div>
         </div>
    </div>
    <!-----testimonial------>
    <div class="testimonial">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                 <i class="fa fa-quote-left"></i>
                   <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, error voluptates? Voluptatum eius atque nobis modi accusamus minima amet nisi neque?</p> 
                   <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                   </div>
                   <h3>~Yohan Gupta</h3>
                </div>
                <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, error voluptates? Voluptatum eius atque nobis modi accusamus minima amet nisi neque?</p>
                      <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-o"></i>
                       <i class="fa fa-star-o"></i>
                    </div>
                    <h3>~Jaden Furtado</h3>
                   </div>
                   <div class="col-3">
                    <i class="fa fa-quote-left"></i>
                      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum, error voluptates? Voluptatum eius atque nobis modi accusamus minima amet nisi neque?</p> 
                    <div class="rating">
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star"></i>
                       <i class="fa fa-star-o"></i>
                    </div>
                    <h3>~Jash Dharia</h3>
                   </div>
            </div>
        </div>
    </div>
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
</body>
</html>