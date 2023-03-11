<?php
include($_SERVER['DOCUMENT_ROOT'].'/vfl/config.php');

class Users extends Database{
	public function get_user_mail(){
		$ch = curl_init("https://www.googleapis.com/oauth2/v1/tokeninfo?access_token=".$_COOKIE['user'].""); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $d = json_decode($data,true);//array containing data of users
        return $d;
	}

	public function get_user_image($uid){
		$ch = curl_init("https://www.googleapis.com/plus/v1/people/".$uid."?fields=image&key=AIzaSyBLNaBZaK1C7gjZswpYEhnwK3dXPRblzm0"); // such as http://example.com/example.xml
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        $d = json_decode($data,true);//array containing data of users
        return $d;
	}
}

?>
