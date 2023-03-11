<?php 
include('add_product.php'); 
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
                        <li><a href="index.html">Home</a></li>
                        <li><a href="https://localhost/vfl/products/index.php">Products</a></li>
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <?php
                        if(isset($_SESSION['user_id'])){
                            if(!isset($_SESSION['user_type'])){
                            ?>
                        <li><a href="https://localhost/vfl/profile/?id=<?php echo $_SESSION['user_id'].'&user=shop' ?>">Account</a></li>
                    <?php }else{ ?>
                        <li><a href="https://localhost/vfl/profile/?id=<?php echo $_SESSION['user_id'].'&user=customer' ?>">Account</a></li>
                        <?php
                    }
                }
                        else{
                        ?>
                         <li><a href="https://localhost/vfl/login/">login</a></li>
                         <li><a href="https://localhost/vfl/signup/">signup</a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </nav>
                <a href="cart.html"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div> 
        </div>
    </div> 
    <?php
if(!isset($_SESSION['user_id'])){
    echo "you have to log in to access this page!";
    header("https://localhost/vfl/403.php");
}
else{
    ?>
    <div style="padding:20px;">
    <h3>Add products</h3>
    <form method="POST">
        <table>
            <tr>
                <td>
                    product name
                </td>
                <td>
                    <input type="text" name="product_name">
                </td>
            </tr>
            <tr>
                <td>
                    Category
                </td>
                <td>
                    <select name="product_category">
                        <option value="electronics">electronics</option>
                        <option>food</option>
                        <option>clothing</option>
                        <option>odds and ends</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    subcat
                </td>
                <td>
                    <select name="product_subcat">
                        <option value="mobile">mobile</option>
                        <option>womens</option>
                        <option>mens</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    quantity
                </td>
                <td>
                    <input type="number" value="1" min="1" name="product_quantity">
                </td>
            </tr>
            <tr>
                <td>
                    price
                </td>
                <td>
                    <input type="text" name="product_price">
                </td>
            </tr>
            <tr>
                <td>
                    Product description
                </td>
                <td>
                    <input type="text" name="product_description">
                </td>
            </tr>
            <tr>
                <td>
                    Image
                </td>
                <td>
                    <input type="file" name="image">
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button class="btn" name="submit">add product</button>
                </td>
            </tr>
        </table>
    </form>
    </div>
<?php
        if(isset($_POST['submit'])){
            $new_product=new Products();
            //$prod_name,$prod_description,$prod_price,$prod_quantity,$prod_category
            if($new_product->add_product($_POST['product_name'],$_POST['product_description'],$_POST['product_price'],$_POST['product_quantity'],$_POST['product_category'],$_POST['product_subcat'])){
                //echo "<script>alert('success!');</script>";
                $target_dir = $_SERVER['DOCUMENT_ROOT']."/vfl/images/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["image"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
    
            }//1st if ends here for adding product
        }
    }
?>
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
