<?php
require_once 'init.php';

if(isset($_POST["username"])&&isset($_POST["password"])){
	$username = $db->real_escape_string($_POST["username"]);
	$password = $db->real_escape_string($_POST["password"]);
	$qs = "select * from user where username = '" . $username . "' and password ='" . $password . "'";
	$rs = $db->query($qs);
	if(!$rs)die($db->error);
	if($rs->num_rows>0){
		$row = $rs->fetch_object();
		$_SESSION['user_id']= $row->id;
		$_SESSION["user_name"] = $row->username;
		$_SESSION["user_mail"] = $row->mail;
		$_SESSION["user_check"] = $row->checkmail;
		header('Location: todo.php');
	}else{
		echo "<script>alert('Error: Invalid ID or password!'); window.location.assign('index.php');</script>";
	}
}
else{
	echo "<script>alert('Error: Please enter username and password!'); window.location.assign('index.php');</script>";
}
?>