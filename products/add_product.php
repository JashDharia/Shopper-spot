<?php

//include($_SERVER['DOCUMENT_ROOT'].'/vfl/config.php');
include($_SERVER['DOCUMENT_ROOT'].'/vfl/login/login.php');

class Products extends Database{
    
    public function add_product($prod_name,$prod_description,$prod_price,$prod_quantity,$prod_category,$prod_subcat){
        
        $prod_name=$this->test_input($prod_name);
        $prod_description=$this->test_input($prod_description);
        $prod_price=$this->test_input($prod_price);
        $prod_quantity=$this->test_input($prod_quantity);
        $shop_id=$_SESSION['user_id'];
        $prod_category=$this->test_input($prod_category);
        $prod_subcat=$this->test_input($prod_subcat);
        
        $link=$this->connect();
        $stmt=$link->prepare("INSERT INTO products(shop_id,prod_category,prod_subcat,product_name,product_quant,product_price)VALUES(?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$shop_id,$prod_category,$prod_subcat,$prod_name,$prod_quantity,$prod_price);

        if($stmt->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function add_product_image() {
        
    }

    public function get_products(){
        $link=$this->connect();
        $sql="SELECT * FROM products";
        $data=mysqli_query($link,$sql);

        if($data){
            return $data;
        }
        else{
            echo "there was an error";
        }

    }

    public function get_my_products(){
        $link=$this->connect();
        $sql="SELECT * FROM products WHERE shop_id='".$_SESSION['user_id']."'";
        $data=mysqli_query($link,$sql);
        if($data){
            return $data;
        }
        else{
            echo "no products to display";
        }
    }

    public function edit_product($product_id){
        $link=$this->connect();
        $product_id=mysqli_real_escape_string($link,$product_id);
        $sql="SELECT * FROM products WHERE id='$product_id'";
        $data=mysqli_query($link,$sql);
        if($data){
            return $data;
        }
    }
    public function save_changes($id,$product_name,$product_price,$product_cat,$product_subcat,$product_quant){
        $link=$this->connect();
        $product_name=mysqli_real_escape_string($link,$this->test_input($product_name));
        $product_price=mysqli_real_escape_string($link,$this->test_input($product_price));
        $product_cat=mysqli_real_escape_string($link,$this->test_input($product_cat));
        $product_subcat=mysqli_real_escape_string($link,$this->test_input($product_subcat));
        $product_quant=mysqli_real_escape_string($link,$this->test_input($product_quant));

        $sql="UPDATE products SET product_name='$product_name',product_price='$product_price',prod_category='$product_cat',product_quant='$product_quant',prod_subcat='$product_subcat' WHERE id='$id'";
        if(mysqli_query($link,$sql)){
            return true;
        }
        else{
            return false;
        }
    }

    public function add_product_review($product_id,$review){
        
        $link=$this->connect();
        $product_id=mysqli_real_escape_string($link,$product_id);
        $review=mysqli_real_escape_string($link,$review);

        $sql="INSERT INTO review(user_id,product_id,review) VALUES('".$_SESSION['user_id']."','$product_id','$review')";
        if(mysqli_query($link,$sql)){
            echo "<script>alert('review added');</script>";
        }
        
    }

    public function get_product_details($prod_id){
        $link=$this->connect();
        $prod_id=mysqli_real_escape_string($link,$this->test_input($prod_id));
        $sql="SELECT * FROM products WHERE id='$prod_id'";
        $data=mysqli_query($link,$sql);
        if($data!=NULL){
            return $data;
        }
        else{
            return NULL;
        }
    }
    public function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    
    }
}

?>