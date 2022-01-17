<?php 
require_once('+koneksi.php');
date_default_timezone_set('Asia/Bangkok');
session_start();

$con = mysqli_connect($host, $user, $pass, $database);
if (mysqli_connect_errno()) {
	echo mysqli_connect_error();
}

function base_url($url = null){
	$base_url = "http://localhost/demo-kp";
	if ($url != null) {
		return $base_url."/".$url;
	}else{
		return $base_url;
	}
}
?>