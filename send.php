<?php
if($_GET['mail']!=""&&$_GET['name']!=""){
	$mail = $_GET['mail'];//收件者
	$name = $_GET['name'];
	$subject = "Join To-do List member"; //信件標題
	$msg = <<<EOF
Dear $name,<br>
Welcome to To-do list!<br>
In order to get started, you need to click the button below for your confirmation.<br>
<a href="http://140.113.122.141/regist.php?name=$name">Join To-do!</a><br>
Thanks for your register.<br>
Sincerely,<br>
To-do list
EOF;
	$msg = wordwrap($msg, 70, "\n");
	$header ="To: ".$name." <".$mail.">"."\n";
	$header .= "From: Todo list<qop455.dif01@nctu.edu.tw>"."\n"; //寄件者
	//$header .= "Cc: qop455.dif01@nctu.edu.tw"."\n"; // 額外的收件者
	$header .= "Content-type: text/html; charset=utf8";  //設定信件格式為網頁

	if(mail($mail, $subject, $msg, $header)):
		echo "<script>alert('Welcome,".$name."! Thanks for signing up. Please check your email for confirmation!'); window.location.assign('index.php');</script>";//寄信成功就會顯示的提示訊息
	else:
		echo "<script>alert('Error: Invalid mail address.'); window.location.assign('index.php');</script>";//寄信失敗顯示的錯誤訊息
	endif;
}
else{
	echo "<script>alert('Error: Cannot get mail address.'); window.location.assign('index.php');</script>";
}
?>