<?php 
require_once 'init.php';

$uid = $_SESSION['user_id'];
if($_POST['content']!=""){
	$content = $db->real_escape_string($_POST['content']);
	if(!empty($content)){
		$qs="INSERT INTO items (user, content, timestamp, done) VALUES (".$uid.",'".$content."', NOW(), 0)";
		echo $qs;
		$db->query($qs);
	}
}
header('Location: todo.php');
