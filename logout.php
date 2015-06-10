<?php
session_start();

$name = $_SESSION["user_name"];
echo "<script>alert('Bye,".$name."')</script>";
session_destroy();
header('Location: index.php');
?>