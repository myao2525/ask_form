<?php
session_start();

	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$seibetu = $_SESSION['seibetu'];
	$title = $_SESSION['title'];
	$message = $_SESSION['message'];

//初期化
		$check = true;
		$check_email = true;
//もらった値がtrueなら確認画面表示
require_once 'function.php'; //関数呼び出しより手前に記述する
if(check($name,$email,$seibetu,$title,$message)){
	$check = true;
}else{
	echo "入力されていない項目があります"; 
	$check = false;
}
//email check
if(!check_email($email)){
	echo "アドレスが間違っている可能性があります";
	$check_email = false;
}
?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>確認画面</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
	<div id="page">
		<div class="container">
			<div class="jumbotron">
		<h2>確認画面</h2>
		<p class="text-muted">
		<p>ようこそ、<?php echo $name;?>様</p>
		<p>メールアドレス:<?php echo $email;?></p>
		<p>性別:<?php echo $seibetu;?></p>
		<p>件名:<?php echo $title;?></p>
		<p>お問い合わせ内容:<?php echo $message;?></p>
		
		<form action="thanks.php" method="post">
			<div class="form-group">
		        <div class="col-lg-10 col-lg-offset-2">
		<input type="hidden" name="name" value="'.$name.'">
		<input type="hidden" name="email" value="'.$email.'">
		<input type="hidden" name="seibetu" value="'.$seibetu.'">
		<input type="hidden" name="title" value="'.$title.'">
		<input type="hidden" name="message" value="'.$message.'">
		<button type="reset" onClick="history.back()" class="btn btn-default">戻る</button>
		<?php 
		if($check && $check_email){//checkとcheck_emailがtrueなら送信ボタンを表示
			?>
		<button type="submit" value="送信" class="btn btn-primary">送信</button>
		<?php }else{?>
			<p style="color:red;">戻ってやり直してください。</p>
		<?php }?><!-- if -->
				</div>
			</div>
		</form>
			</div>
		</div>
	</div>
</body>
</html>