<?php

include($_SERVER['DOCUMENT_ROOT'].'/vfl/config.php');

class Notifications extends Database{
	
	public function get_notifications(){
		$link=$this->connect();

		if($_SESSION['user_type']=="shop"){
		    $sql="SELECT * FROM shop_notifications WHERE user_id='".$_SESSION['user_id']."'";
	    }
	    else{
	    	$sql="SELECT * FROM user_notifications WHERE shop_id='".$_SESSION['user_id']."'";
	    }
	    $res=mysqli_query($link,$sql);
	    return $res;
	}

}

?>