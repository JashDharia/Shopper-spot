<?php
//session_start();
include($_SERVER['DOCUMENT_ROOT'].'/vfl/products/add_product.php');
$cart=new Products();
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
                        <li><a href="https://localhost/vfl/index.php">Home</a></li>
                        <li><a href="https://localhost/vfl/products/">Products</a></li>
                        <li><a href="https://localhost/vfl/aboutUs.php">About</a></li>
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
                 <th>Product</th>
                 <th>Quantity</th>
                 <th>Subtotal</th>
             </tr>
             <!-- the carts products -->
<?php       

    $total=0;
    if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key){

            $a=explode("_", $key);
            $data=$cart->get_product_details($a[1]);
        while($row=mysqli_fetch_array($data)){

	?>
             <tr>
                 <td>
                     <div class="cart-info">
                        <img src="https://localhost/vfl/images/red-shoes.png">
                        <div>
                            <p><?php echo $row['product_name']; ?></p>
                            <small>Price: Rs.<?php echo $row['product_price']; ?></small>
                            <br>
                            <a href="#">Remove</a>
                        </div>
                     </div>
                 </td>
                 <td><input type="number" value="<?php echo $a[0] ?>"></td>
                 <td>Rs.<?php echo $row['product_price']; ?></td>
             </tr>
         <?php

        $total=$total+((integer)$row['product_price']*(integer)$a[0]);

        }
    
        }//for loop ends here 
    }
    ?>
             <!--cart stops here -->
         </table>
         <div class="total-price">
             <table>
                 <tr>
                     <td>Total</td>
                     <td>Rs.<?php echo $total; ?></td>
                 </tr>
                 <tr>
                 	<td></td>
                 	<td><a class="btn" href="https://localhost/vfl/checkout/">check out</a></td>
                 </tr>
             </table>
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

