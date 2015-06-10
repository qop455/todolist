<?php
require_once 'init.php';

if($_GET['name']!=""){
	$name = $_GET['name'];
	$checkqs = "SELECT * FROM user WHERE username='" . $name . "'";
	$checkrs = $db->query($checkqs);
	if(!$checkrs)die($db->error);
	if($checkrs->num_rows>0){
		$row = $checkrs->fetch_object();
		$qs = "UPDATE user SET checkmail=1 where username='".$row->username."'";
		$rs = $db->query($qs);
		if(!$rs){
			die($db->error);
		}
		else{
			$_SESSION['user_id']= $row->id;
			$_SESSION["user_name"] = $row->username;
			$_SESSION['user_check'] = 1;
			$_SESSION['user_mail'] = $row->mail;
			echo "<script>alert('Welcome to To-do list,'); window.location.assign('index.php');</script>";
		}
	}
}
else{
	echo "<script>alert('Error: Fail to confirm your account.'); window.location.assign('index.php');</script>";
}

?>