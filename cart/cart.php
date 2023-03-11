<?php

session_start();

class Cart{

	function add_to_cart($product_id,$product_quantity){
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart']=array();
		}
		$a=array(array('product_id' => $product_id,'product_quantity'=>$product_quantity));
		$data=$product_quantity."_".$product_id;
		$_SESSION['cart'][$product_id]=$data;
		return true;
	}

}