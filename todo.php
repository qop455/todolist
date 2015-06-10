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
		<div class="list" style="max-width:800px;">
			<h1 class="header">To-do List.</h1>
			<?php if($rs->num_rows>0): ?>
			<ul class="items" style="list-style-type:upper-roman;">
				<?php while($item = $rs->fetch_object()){ ?>
					<li>
						<span class="item<?php echo $item->done ? ' done' : '' ?>"><?php echo $item->content; ?></span>
						<?php if(!$item->done): ?>
						<a href="mark.php?as=done&id=<?php echo $item->id; ?>" class="done-button" title="<?php echo $item->timestamp; ?>">Mark as done</a>
						<?php else: ?>
						<a href="mark.php?as=del&id=<?php echo $item->id; ?>" class="done-button" >Delete</a>
						<?php endif; ?>
						<p style="display: inline;"></p>
					</li>
				<?php } ?>
			</ul>
			<?php else: ?>
				<p>You haven't added any items yet.</p>
			<?php endif; ?>
			<form class="form" action="add.php" method="post">
				<input id="tempBox" type="text" name="content" placeholder="Hi <?php echo $name;?>,create a new item here." class="input" autocomplete="off" required />
				<select id="langCombo">
					<option value="en-US">English(US)</option>
					<option value="cmn-Hant-TW">中文(台灣)</option>
				</select>
				<label id="infoBox"></label>
				<input id="startStopButton" type="button" value="Say something" onclick="startButton(event)" class="btn"/>
				<input type="submit" value="Add" class="btn" />
			</form>
			<form action="profile.php" class="form">
				<input type="submit" value="Profile" class="btn" />
			</form>
			<form action="logout.php" class="form">
				<input type="submit" value="Logout" class="btn" />
			</form>
		</div>
		<p align="center">2015, Jason Chiu</p>
	</body>
</html> 
<?php
}
?>
