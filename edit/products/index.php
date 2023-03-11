<?php 
    //session_start();
    include($_SERVER['DOCUMENT_ROOT'].'/vfl/products/add_product.php'); 
    $product_id=$_GET['product_id'];
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
    
    ?>
    <br>
    <div class="products">
        <?php 
        $products = new Products();
        $data=$products->edit_product($product_id);
        if($data!=NULL){
            while($row=mysqli_fetch_array($data)){
                ?>
                <script type="text/javascript">
                    $(document).ready(function(){
                        document.getElementById('name').value="<?php echo $row['product_name']; ?>";
                        document.getElementById('price').value="<?php echo $row['product_price']; ?>";
                        document.getElementById('category').value="<?php echo $row['prod_category']; ?>";
                        document.getElementById('subcat').placeholder="<?php echo $row['prod_subcat']; ?>";
                        document.getElementById('quant').value="<?php echo $row['product_quant']; ?>";
                    });
                </script>
                <h3>Edit products</h3>
                <form method="POST">
                    <input type="text" name="product_name" id="name">
                    <br>
                    <input type="text" name="product_price" id="price">
                    <br>
                    <input type="text" name="product_cat" id="category">
                    <br>
                    <input type="text" name="product_subcat" id="subcat">
                    <br>
                    <input type="text" name="product_quant" id="quant">
                    <button class="save_<?php echo $row['id']; ?>">save</button>
                </form>
                <?php
                echo "<br><br>";
               if(isset($_POST["save_".$row['id'].""])){
                echo "<script>alert('some');</script>";
                if($products->save_changes($_POST['id'],$_POST['product_name'],$_POST['product_price'],$_POST['product_cat'],$_POST['product_subcat'],$_POST['product_quant'])){
                    echo "<script>location.replace('https://localhost/vfl/edit/products/?product_id=".$row['id']."');</script>";
                }
                else{
                    echo "there was an error!";
                }
            } 
            } 
        }
    }
        ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>