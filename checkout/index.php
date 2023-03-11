<?php
//session_start();
include($_SERVER['DOCUMENT_ROOT'].'/vfl/products/add_product.php');

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
    <script src="https://apis.google.com/js/platform.js?onload=onLoadCallback" async defer></script>
<script>
</script>
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
                        <li><a href="#">About</a></li>
                        <li><a href="#">Contact</a></li>
                        <?php
                        if(isset($_SESSION['user_id'])){
                        ?>
                        <li><a href="https://localhost/vfl/profile/?id=<?php echo $_SESSION['user_id'] ?>&user=<?php echo $_SESSION['user_type'] ?>">Account</a></li>
                        <?php
                    }
                        ?>
                    </ul>
                </nav>
                <a href="cart.html"><img src="https://localhost/vfl/images/shopping-cart.png" width="30px" height="30px"></a>
                <img src="https://localhost/vfl/images/menu_icon.png" class="menu-icon" onclick="menutoggle()">
            </div>
        </div>   
    <!-- -----cart item details----- -->
    <div style="padding-left: 20px;">
        <h2>Your order summary</h2>
    </div>
    <div class="responsive-table" style="max-width: 800px; padding-left: 10px;">
        <table>
            <tr>
                <td>
                    email
                </td>
                <td>
                    <textarea class="input" id="email" cols="50" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    phone no
                </td>
                <td>
                    <textarea class="input" id="phone" cols="50" rows="2"></textarea>
                </td>
            </tr>
            <tr>
                <td>
                    address
                </td>
                <td>
                    <textarea type="text" cols="50" rows="3" name="address" placeholder="your address" id="address"></textarea>
                </td>
            </tr>
            <tr>
                <td>Your order summary</td>
                <td>
                    <div class="table-responsive">
                        <table class="table">
        <?php       
        $cart=new Products();
        foreach ($_SESSION['cart'] as $key) {
        $a=explode("_", $key);
        $data=$cart->get_product_details($a[1]);
        while($row=mysqli_fetch_array($data)){
            ?>
            <tr>
                <td>
                    <?php echo $row['product_name']; ?>
                </td>
                <td>
                    <?php echo $row['product_price']; ?>
                </td>
            </tr>
            <?php
            }
        }
    ?>
                        </table>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    Select date of delievery
                </td>
                <td>
                    <input type="date" id="date">
                </td>
            </tr>
            <tr>
                <td>
                    Select time of delievery
                </td>
                <td>
                    <input type="time" name="time">
                </td>
            </tr>
            <tr>
                <td>
                    Place your order
                </td>
                <td>
                    <a href="#" class="btn confirm">confirm</a>
                </td>
            </tr>
        </table>
    </div>
    <?php
    
    /**
     *  Do a GET request
     *  @param  string      Resource to fetch
     *  @param  array       Associative array with additional parameters
     *  @return array       Associative array with the result
     */

    function get_data()
    {
        // the query string
        //$query = http_build_query(array('access_token' => $_SESSION['user_google_token']));
        // construct curl resource
        //$token=$_SESSION['token'];
        //echo $token;
        //$curl = curl_init("https://www.googleapis.com/calendar/v3/calendars/calendarId?access_token=".$token."");
        $url="https://www.googleapis.com/calendar/v3/calendars/primary?access_token=".$_COOKIE['user']."";
        $ch = curl_init();  
        curl_setopt($ch,CURLOPT_URL,$url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        //  curl_setopt($ch,CURLOPT_HEADER, false); 

        $output=curl_exec($ch);

        curl_close($ch);
        return json_decode($output, true);
    }
    print_r(get_data());
    ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".confirm").click(function(){
                //var phone = $("#phone").val();
                var address = $("#address").val();
                add_event();
            });
        });
    </script>
    <!-------js for toggle menu------>  
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
        <script src="http://localhost/vfl/checkout/calendar.js"></script>

</body>
</html>

