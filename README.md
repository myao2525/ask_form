phpを使った簡単な問い合わせフォーム作成

#databaseとのつなげ方。
thanks.phpの
$link = mysql_connect('localhost', 'root', '');
を変更
（windwsのxampp使用の場合で設定なしはこのまま）
（mampは　'localhost', 'root', 'root'）
データベースを作成したら
$db_selected = mysql_select_db('lessonphp', $link);
の'lessonphp'を自分が作成したデータベース名に変更。

テーブルを作成してから

$result = mysql_query('SELECT id,name,email,seibetu,title,message FROM form');
のformを自分のテーブル名で設定するか、

テーブル名はformで作成してもらう。
必要カラムは６
id int AI
name varchar
email varchar
seibetu varchar
title varchar
message varchar

