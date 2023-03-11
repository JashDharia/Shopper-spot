<?php 
    //session_start();
    include('add_product.php'); 
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
         <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="https://localhost/vfl/index.php"><img src="https://localhost/vfl/images/logo.png" width="150px" alt="logo"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="https://localhost/vfl/index.php">Home</a></li>
                        <li><a href="https://localhost/vfl/products/index.php">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <?php 
                        if(isset($_SESSION['user_id'])){
                          ?>
                        <li><a href="https://localhost/vfl/profile/?id=<?php echo $_SESSION['user_id'] ?>&user=<?php echo $_SESSION['user_type'] ?>">Profile</a></li>
                          <?php
                        }
                        ?>
                    </ul>
                </nav>
                <a href="https://localhost/vfl/cart/"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>   
    
     <div class="small-container">
         <div class="row row-2">
             <h2>All Products</h2>
             <select>
                 <option>Default sorting</option>
                 <option>Sort by Price</option>
                 <option>Sort by Manufacturer</option>
                 <option>Sort by rating</option>
             </select>
         </div>
           <!--this is for the demo-->
           <div class="row">
         <?php
             $products = new Products();
             $data=$products->get_products();
        if($data!=NULL){
          $i=0;
            while($row=mysqli_fetch_array($data)){
              $i++;
                ?>
              <div class="col-4 <?php echo $row['id'] ?>" id="prod_<?php echo $row['id'] ?>">
                 <img src="data:image/jpeg;base64,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" alt="">
                 <h4><?php echo htmlspecialchars($row['product_name']); ?></h4>
                 <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                 </div>
                 <p><?php echo htmlspecialchars($row['product_price']); ?></p>
             </div>
             <script type="text/javascript">
               $(".<?php echo $row['id'] ?>").on("click",function(){
                location.href="https://localhost/vfl/products/productdetails.php?prod_id=<?php echo $row['id']; ?>";
               });
             </script>
                <?php
                if($i%4==0){
                  echo "</div>";
                  echo "<div class='row'>";
                }
            } 
        }
        ?>
             </div>
             <div class="row">
             <div class="col-4">
                 <img src="https://localhost/vfl/images/personal-care-product1.png" alt="">
                 <h4>650ml Shampoo</h4>
                 <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                 </div>
                 <p>Rs.512.00</p>
             </div>
             <div class="col-4">
                <img src="https://localhost/vfl/images/lays.jpg" alt="">
                <h4>167gm Blue Lays</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.65.00</p>
            </div>
            <div class="col-4">
                <img src="https://localhost/vfl/images/red-shoes.png" alt="">
                <h4>Red Running Shoes For Men</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-half-o"></i>
                </div>
                <p>Rs.800.00</p>
            </div>
            <div class="col-4">
                <img src="https://localhost/vfl/images/red-shirt.png" alt="">
                <h4>Red Casual shirt for Men</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.650.00</p>
            </div>
         </div>  
<!--end of demo-->
           <div class="row">
             <div class="col-4">
                 <img src="https://localhost/vfl/images/personal-care-product1.png" alt="">
                 <h4>650ml Shampoo</h4>
                 <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-o"></i>
                    <i class="fa fa-star-o"></i>
                 </div>
                 <p>Rs.512.00</p>
             </div>
             <div class="col-4">
                <img src="https://localhost/vfl/images/lays.jpg" alt="">
                <h4>167gm Blue Lays</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.65.00</p>
            </div>
            <div class="col-4">
                <img src="https://localhost/vfl/images/red-shoes.png" alt="">
                <h4>Red Running Shoes For Men</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-half-o"></i>
                </div>
                <p>Rs.800.00</p>
            </div>
            <div class="col-4">
                <img src="https://localhost/vfl/images/red-shirt.png" alt="">
                <h4>Red Casual shirt for Men</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.650.00</p>
            </div>
         </div>  
         <div class="row">
            <div class="col-4">
                <img src="https://localhost/vfl/images/dairy-product1.png" alt="">
                <h4>500ml Milk</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.30.00</p>
            </div>
            <div class="col-4">
                <img src="https://localhost/vfl/images/personal-care-product1.png" alt="">
                <h4>650ml Shampoo</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-half-o"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.512.00</p>
            </div>
            <div class="col-4">
               <img src="https://localhost/vfl/images/tomato.png" alt="">
               <h4>Local Tomato(1kg)</h4>
               <div class="rating">
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star"></i>
                  <i class="fa fa-star-o"></i>
                  <i class="fa fa-star-o"></i>
               </div>
               <p>Rs.40.00</p>
           </div>
           <div class="row">
            <div class="col-4">
                <img src="https://localhost/vfl/images/oil.png" alt="">
                <h4>1L Soyabean Oil</h4>
                <div class="rating">
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star"></i>
                   <i class="fa fa-star-o"></i>
                </div>
                <p>Rs.110.00</p>
            </div>
        </div> 
        <div class="page-btn">
          <span>1</span>
          <span>2</span> 
          <span>3</span> 
          <span>4</span>  
          <span>&#10132;</span>  
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
<!--this is just a demo-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
</body>
</html>