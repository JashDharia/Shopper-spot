<?php

class Connection{
	public function connect(){
		return $link=new mysqli("localhost","root","","demo");
	}
}

class User extends Connection{

public function getData(){
    $link=$this->connect();	
	$sql="SELECT * FROM users";
	$res=mysqli_query($link,$sql);
	if($res){
		return $res;
	}
}



public function form_handler($name,$email){
	$link=$this->connect();
	//if$name!=NULL && $email!=NULL){
	//$new_name=mysqli_real_escape_string($link,$name);
	// 	
		$sql="INSERT INTO users(name,email) VALUES('$name','$email')";
		if(mysqli_query($link,$sql)){
			echo "success";
		}
		else{
			echo $link->error;
		}
	/*}
	else{
		echo "no value entered";
	}
	*/
}
}
//JButton b = new Jbutton();
?>