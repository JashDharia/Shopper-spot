<?php

include('add_product.php');

$product_id=$_POST['prod_id'];
$review=$_POST['review'];

$product=new Products();

$product->add_product_review($product_id,$review);

?>