<?php
session_start();

if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])){
	header('Location: todo.php');
}
?>

<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Todo List</title>
		<link rel="stylesheet" href="main.css" style="text/css">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two" rel="stylesheet">
	</head>
	<body>
		<div class="list" style="max-width:400px;">
			<h1 class="header">Add user.</h1>
			<form class="form" action="newusr.php" method="post">
				<ul class="items">
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Username:</p><input type="text" name="newname" autocomplete="on" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Password:</p><input type="password" name="newpass" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">confirm:</p><input type="password" name="repass" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">E-mail:</p><input type="email" name="mail" autocomplete="on" required></li>
					<input type="submit" value="Add User" class="btn">
				</ul>
			</form>
			<form action="index.php" class="form">
				<input type="submit" value="Back" class="btn">
			</form>
		</div>
		<p align="center">2015, Jason Chiu</p>
	</body>
</html>