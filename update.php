<?php
require_once 'init.php';
$id = $_SESSION['user_id'];

if($_POST["newname"]!=""&&$_POST["newpass"]!=""&&$_POST["repass"]!=""){
	$newname = $db->real_escape_string($_POST["newname"]);
	$newpass = $db->real_escape_string($_POST["newpass"]);
	$repass = $db->real_escape_string($_POST["repass"]);
	if($newname!=$_SESSION['user_name']){
		$checkqs = "SELECT * FROM user WHERE username='" . $newname . "'";
		$checkrs = $db->query($checkqs);
		if($checkrs->num_rows>0){
			echo "<script>alert('Error:".$newname." has been used!'); window.history.back();</script>";
		}
		else{
			if($newpass==$repass){
				$qs = "UPDATE user SET username='".$newname."' , password='".$newpass."'WHERE id=".$id."";
				$db->query($qs);
				echo "<script>alert('Update profile successfully,please login with new account!'); window.location.assign('logout.php');</script>";
			}
			else{
				echo "<script>alert('Error: Passwords don\'t match.'); window.history.back();</script>";
			}
		}
	}
	else{
		if($newpass==$repass){
			$qs = "UPDATE user SET password='".$newpass."'WHERE id=".$id."";
			$db->query($qs);
			echo "<script>alert('Update profile successfully,please login with new account!'); window.location.assign('logout.php');</script>";
		}
		else{
			echo "<script>alert('Error: Passwords don\'t match.'); window.history.back();</script>";
		}
	}
}
else{
	echo "<script>alert('Error: Please fill the form completely!'); window.history.back();</script>";
}
?>