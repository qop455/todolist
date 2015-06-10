<?php
require_once 'init.php';

if(!isset($_SESSION['user_id'])||!isset($_SESSION['user_name'])||!isset($_SESSION['user_check'])){
	header('Location: index.php');
}
elseif($_SESSION['user_check']!='1'){
	echo "<script>alert('Sorry ,please confirm your email first!'); window.location.assign('logout.php');</script>";
}
else{
$uid = $_SESSION['user_id'];
$name = $_SESSION['user_name'];
$mail = $_SESSION['user_mail'];
$qs = "SELECT id,content,done,timestamp FROM items WHERE user=" . $uid ;
$rs = $db->query($qs);
if(!$rs)die($db->error);
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Todo List</title>
		<link rel="stylesheet" href="main.css" style="text/css">
		<script src="speech.js"></script>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	</head>
	<body>
		<div class="list" style="max-width:400px;">
			<h1 class="header">Profile.</h1>
			<form class="form" action="update.php" method="post">
				<ul class="items">
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Username:</p><input type="text" name="newname" value="<?php echo $name;?>" autocomplete="on"required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Password:</p><input type="password" name="newpass" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">confirm:</p><input type="password" name="repass" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">E-mail:</p><input type="email" name="mail" value="<?php echo $mail;?>" autocomplete="on" disabled required></li>
					<input type="submit" value="Update" class="btn">
				</ul>
			</form>
			<form action="todo.php" class="form">
				<input type="submit" value="Back" class="btn">
			</form>
		</div>
		<p align="center">2015, Jason Chiu</p>
	</body>
</html> 
<?php
}
?>