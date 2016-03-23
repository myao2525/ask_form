<?php
session_start();
$cnt = $_SESSION['cnt'];
$cnt = 1;//呼び出されたのでカウントする
require_once 'function.php'; //関数呼び出しより手前に記述する
		$name = $_POST['name'];
		$email = $_POST['email'];
		$seibetu = $_POST['seibetu'];
		$title = $_POST['title'];
		$message = $_POST['message'];

if(check($name,$email,$seibetu,$title,$message)&&check_email($email)){
	header("Location: check.php");
}else{
	header("Location: index.php");
}
	//最後にPOST変数の全てに入っていなくても入っていてもセッションに入れる
	$_SESSION['name'] = $_POST['name'];
	$_SESSION['email'] = $_POST['email'];
	$_SESSION['seibetu'] = $_POST['seibetu'];
	$_SESSION['title'] = $_POST['title'];
	$_SESSION['message'] = $_POST['message'];

	$_SESSION['cnt'] = $cnt;
?>
<!-- post data -->
<!-- <form action="check.php" method="post">
<input type="hidden" name="c_name" value="'.$name.'">
<input type="hidden" name="c_email" value="'.$email.'">
<input type="hidden" name="c_seibetu" value="'.$seibetu.'">
<input type="hidden" name="c_title" value="'.$title.'">
<input type="hidden" name="c_message" value="'.$message.'">
</form> -->