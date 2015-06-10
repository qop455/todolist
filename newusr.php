<?php
require_once 'init.php';

if($_POST["newname"]!=""&&$_POST["newpass"]!=""&&$_POST["repass"]!=""&&$_POST["mail"]!=""){
	$newname = $db->real_escape_string($_POST["newname"]);
	$newpass = $db->real_escape_string($_POST["newpass"]);
	$repass = $db->real_escape_string($_POST["repass"]);
	$mail = $db->real_escape_string($_POST["mail"]);
	
	$checkqs1 = "SELECT * FROM user WHERE username='" . $newname . "'";
	$checkrs1 = $db->query($checkqs1);
	$checkqs2 = "SELECT * FROM user WHERE mail='" . $mail . "'";
	$checkrs2 = $db->query($checkqs2);
	if($checkrs1->num_rows>0){
		echo "<script>alert('Error: This name has been used!'); window.history.back();</script>";
	}
	elseif ($checkrs2->num_rows>0){
		echo "<script>alert('Error: This mail has been used!'); window.history.back();</script>";
	}
	else{
		if($newpass==$repass){
			$qs = "INSERT INTO user (username, password, mail) VALUES ('".$newname."','".$newpass."','".$mail."')";
			$db->query($qs);
			echo "<script>window.location.assign('send.php?mail=".$mail."&name=".$newname."');</script>";
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