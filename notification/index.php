<?php
session_start();
include('notifications.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Products - Shopper's Spot</title>
    <link rel="stylesheet" href="https://localhost/vfl/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
         <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="index.html"><img src="https://localhost/vfl/images/logo.png" width="150px" alt="logo"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="https://localhost/vfl/index.html">Home</a></li>
                        <li><a href="products.html">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="https://localhost/vfl/profile/?id=<?php echo $_SESSION['user_id'] ?>&user=<?php echo $_SESSION['user_type'] ?>">Account</a></li>
                    </ul>
                </nav>
                <a href="cart.html"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>   
    <!-- -----cart item details----- -->
     <div class="small-container cart-page">
         <table>
             <tr>
                <span>
                 <th>Your Notifications</th>
                 <th></th>
                 <th></th>
                </span>
             </tr>
             <?php 
                $notification = new Notifications();
                $ntf = $notification->get_notifications();
                if($ntf!=NULL){
                while($row=mysqli_fetch_array($ntf)){
                ?>
             <tr>
                 <td>
                     <div class="cart-info">
                       
                        <div>
                            <p>Red Running Shoes</p>
                            <small>Price: Rs.800.00</small>
                            <br>
                            <a href="#">Remove</a>
                        </div>
                     </div>
                 </td>
                 <td><input type="number" value="1"></td>
                 <td>Rs.800.00</td>
             </tr>
             <?php
            }
        }
        else{
            ?>
            <tr>
                 <td>
                     <div class="cart-info">
                       No notification to display
                     </div>
                 </td>
                 <td></td>
                 <td></td>
             </tr>
            <?php
        }
             ?>
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

