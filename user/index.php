<?php 
session_start(); 
include($_SERVER['DOCUMENT_ROOT'].'/vfl/user/user.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopper's Spot</title>
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
                <a href="https://localhost/vfl/cart/"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div> 
        </div>
    </div>  
    <div style="padding:20px;">
      <div>

    <img src="data:image/jpeg;base64,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" width="200" height="200">
      </div>
      <?php
    //echo $_COOKIE['user'];
    $user = new Users();
    $data = $user->get_user_mail();
    echo $data['email'];
    //print_r($data);
    //$d = $user->get_user_image($data['user_id']);
    //print_r($d);
    ?>
    </div>
    <div style="padding: 10px; max-width: 200px;">
      <form method="post">
      <button class="btn">logout</button>
      </form>
      <?php
      if(isset($_POST['logout'])){
        echo "<script>alert('hi');</script>";
        unset($_COOKIE['user']);
      }
      ?>
    </div>
    <div style="padding: 10px;">
      <div>
        <h3>My Orders</h3>
      </div>
      <div class="table-responsive">
        <table class="table">
          <tr>
            <th>
              
            </th>
          </tr>
        </table>
      </div>
    </div>
<!--end of demo-->
     <!-----offers----->
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
