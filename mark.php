<?php
require_once 'init.php';

if(isset($_GET['as'],$_GET['id'])){
	$as	= $_GET['as'];
	$id = $_GET['id'];
	$uid = $_SESSION['user_id'];
	switch($as){
		case 'done':
			$qs="UPDATE items SET done = 1 WHERE id =" . $id . " and user = " . $uid;
			$db->query($qs);
			echo $qs;
			break;
		case 'del':
			$qs="DELETE FROM items WHERE id =" . $id . " and user = " . $uid;
			$db->query($qs);
			echo $qs;
			break;
	}
}
header('Location: todo.php');
