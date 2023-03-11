<?php 
    //session_start();
    include('add_product.php'); 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- my css-->
<style type="text/css">
    .signup_form{
        padding: 50px;
    }
</style>
 <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<title>Shop</title>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
</head>
<body>
<!--this is just a demo-->

<div style="padding: 20px;">
<?php
if(isset($_SESSION['user_id'])){
    echo '<a href="https://localhost/vfl/products/Products.php">Add products</a>';
}
    ?>
    <br>
    <div class="products">
        <?php 
        $products = new Products();
        $data=$products->get_my_products();
        if($data!=NULL){
            while($row=mysqli_fetch_array($data)){
                echo htmlspecialchars($row['shop_id']);
                echo "<br>";
                echo htmlspecialchars($row['product_price']);
                echo "<br>";
                echo htmlspecialchars($row['prod_subcat']);
                echo "<br>";
                ?>
                <button class="edit_<?php echo $row['id']; ?>">edit</button>
                <script type="text/javascript">
                    $(document).ready(function(){
                        $(".edit_<?php echo $row['id'] ?>").on("click",function(){
                            location.href="https://localhost/vfl/edit/products/?product_id=<?php echo $row['id'] ?>";
                        });
                    });
                </script>
                <?php
                echo "<br><br>";
            } 
        }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>