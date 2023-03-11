<?php

include($_SERVER['DOCUMENT_ROOT'].'/vfl/config.php');

class Profile extends Database{
	
	public function get_user_details($user_id,$user_type){
		$link=$this->connect();
		if($user_type==NULL){
			$sql="SELECT * FROM shop WHERE id='$user_id'";
		}
		else{
			$sql="SELECT * FROM users WHERE id='$user_id'";
		}
		$res=mysqli_query($link,$sql);
		if($res!=NULL){
			return $res;
		}
		else{
			return 0;
		}
	}

	public function get_user_products($profile_id,$user_type){
		$link=$this->connect();
		$profile_id=mysqli_real_escape_string($link,$this->test_input($profile_id));
		if($user_type=='shop'){
			$sql="SELECT * FROM products WHERE shop_id='$profile_id'";
			$res=mysqli_query($link,$sql);
			if(mysqli_num_rows($res)>0){
				return $res;
			}
			else{
				echo "No products to display";
			}
		}
		else{
			
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