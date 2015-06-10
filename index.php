<?php
session_start();
if(isset($_SESSION['user_id'])&&isset($_SESSION['user_name'])&&isset($_SESSION['user_check'])){
	header('Location: todo.php');
}
else{
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
			<h1 class="header">Login.</h1>
			<form action="login.php" method="post" class="form">
				<ul class="items">
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Username:</p><input type="text" name="username" required></li>
					<li style="list-style-type: none;"><p style="width:90px ; display: inline-block;">Password:</p><input type="password" name="password" required></li>
				</ul>
				<input type="submit" value="Login" class="btn">
			</form>
			<form action="addusr.php" class="form">
				<input type="submit" value="Create Account" class="btn">
			</form>
		</div>
		<p align="center">2015, Jason Chiu</p>
	</body>
</html>
<?php
}
?>