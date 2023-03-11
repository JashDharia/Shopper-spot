<?php

include($_SERVER['DOCUMENT_ROOT'].'/vfl/cart/cart.php');

$id=$_POST['prod_id'];
$quant=$_POST['product_quant'];

$cart=new Cart();

if($cart->add_to_cart($id,$quant)){
	echo "<script>alert('success');</script>";
}