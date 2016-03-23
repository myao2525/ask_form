<?php
session_start();
require_once 'function.php'; //関数呼び出しより手前に記述する
	$cnt = $_SESSION['cnt'];

	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$seibetu = $_SESSION['seibetu'];
	$title = $_SESSION['title'];
	$message = $_SESSION['message'];

?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>THANKS</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
	echo ('接続失敗です。'.mysql_error());
}

print('<p>接続に成功しました。</p>');

$db_selected = mysql_select_db('lessonphp', $link);
if (!$db_selected){
	echo ('データベース選択失敗です。'.mysql_error());
}

print('<p>データベースを選択しました。</p>');

mysql_set_charset('utf8');

$result = mysql_query('SELECT id,name,email,seibetu,title,message FROM form');
if (!$result) {
	echo ('クエリーが失敗しました。'.mysql_error());
}

//post data の取得
// $id = NULL;
//  $name = $_POST['name'];
//  $email = $_POST['email'];
//  $seibetu = $_POST['seibetu'];
//  $title = $_POST['title'];
//  $message = $_POST['message'];

//dataをテーブルへ追加

mysql_query('ALTER TABLE form AUTO_INCREMENT = 1');
print('<p>データを追加します。</p>');

$sql = 'INSERT INTO form(name, email, seibetu, title, message) VALUES("'.$name.'","'.$email.'","'.$seibetu.'","'.$title.'","'.$message.'")';

if (!mysql_query($sql)) {
	echo ('INSERTクエリーが失敗しました。'.mysql_error());
}
print ('<table class="table table-striped table-hover ">');
print(' <thead>
	<tr>
		<th>id</th>
		<th>名前</th>
		<th>email</th>
		<th>性別</th>
		<th>件名</th>
		<th>問い合わせ内容</th>
	</tr>
	</thead>');
print('<tbody>');
while ($row = mysql_fetch_assoc($result)) {
	print('<tr　class="info">');
	print('<td>id='.$row['id'].'</td>');
	print('<td>name='.$row['name'].'</td>');
	print('<td>email='.$row['email'].'</td>');
	print('<td>seibetu='.$row['seibetu'].'</td>');
	print('<td>title='.$row['title'].'</td>');
	print('<td>message='.$row['message'].'</td>');
	print('</tr>');
}
print('</tbody>');
print('</table>');

?>
<div id="page">
	<div class="container">
		<div class="jumbotron">
			<p><?php echo $name;?> 様</p>
			<p>お問い合わせ、ありがとうございました。</p><br>
			<p>お問い合わせ内容『<?php echo $message;?>』</p>
			<p>email:<?php echo $email;?></p>
			<p>データを受け付けました</p>
		</div>
		<a href="index.php" class="btn btn-danger">Formに戻る</a>
	</div><!-- container -->
</div><!-- page -->
<?php
$close_flag = mysql_close($link);
if ($close_flag){
    print('<p>切断に成功しました。</p>');
    $cnt=1;
    session_destroy();
}
?>
</body>
</html>