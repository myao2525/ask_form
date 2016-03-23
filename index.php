<?php
session_start();
require_once 'function.php'; //関数呼び出しより手前に記述する
//valiへ処理がうつったかカウント
if(isset($_SESSION['cnt'])){
  $cnt = $_SESSION['cnt'];
}else{
  $cnt = 0;
}

if(isset($_SESSION['name'])){
  $name = $_SESSION['name'];
}else{
  $name = "";
}
if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}else{
  $email = "";
}
if(isset($_SESSION['seibetu'])){
  $seibetu = $_SESSION['seibetu'];
}else{
  $seibetu = "";
}
if(isset($_SESSION['title'])){
  $title = $_SESSION['title'];
}else{
  $title = "";
}
if(isset($_SESSION['message'])){
  $message = $_SESSION['message'];
}else{
  $message = "";
}
function clearFormAll(){
  $name = "";
  $email = "";
  $seibetu = "";
  $title = "";
  $message = "";
}
?><!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">

<title>問い合わせフォーム</title>
<link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
</head>
<body>
<script type="text/javascript">
function clearFormAll() {
    for (var i=0; i<document.forms.length; ++i) {
        clearForm(document.forms[i]);
         alert("ok");
         document.getElementById("name").defaultValue = "";
         document.getElementById("email").defaultValue = "";
         document.getElementById("seibetu").defaultValue = "";
         document.getElementById("title").Value = "";
         document.getElementById("message").defaultValue = "";
    }
}
function clearForm(form) {
    for(var i=0; i<form.elements.length; ++i) {
        clearElement(form.elements[i]);
    }
}
function clearElement(element) {
    switch(element.type) {
        case "hidden":
        case "submit":
        case "reset":
        case "button":
        case "image":
            return;
        case "file":
            return;
        case "text":
        case "password":
        case "textarea":
            element.value = "";
            return;
        case "checkbox":
        case "radio":
            element.checked = false;
            return;
        case "select-one":
        case "select-multiple":
            element.selectedIndex = 0;
            return;
        default:
    }
}  
</script>
<div id="page">
    <div class="container">
    <h1>問い合わせ フォーム</h1>
    <?php if($cnt==1 && (check($name,$email,$seibetu,$title,$message) == false || check_email($email) ==false) ) echo "入力がない項目か内容に誤りがあります。";?>
        <form action="./vali.php" class="form-horizontal" method="post">
            <div class="form-group">
            <?php if($cnt==1) echo n_error($name);?> 
            <label for="input-name" class="col-sm-2 control-label">お名前</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="お名前" required="required" name="name" value="<?php echo $name;?>">
                </div>
            </div>
            <div class="form-group">
            <?php if($cnt==1) echo e_error($email);?> 
            <label for="input-mail" class="col-sm-2 control-label">メールアドレス</label>
                <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="メール" required="required" name="email" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="form-group">
            <?php if($cnt==1) echo s_error($seibetu);?> 
            <label class="col-sm-2 control-label">性別</label>
                <div class="col-sm-10">
                <select class="form-control" name="seibetu"　placeholder="<?php echo $seibetu;?>">
                <option value="<?php echo $seibetu;?>"><?php echo $seibetu;?></option>
                <option value="男">男</option>
                <option value="女">女</option>
                </select>
                </div>
            </div>
            <div class="form-group">
            <?php if($cnt==1) echo t_error($title);?> 
            <label for="input-title" class="col-sm-2 control-label">件名</label>
                <div class="col-sm-10">
                <!-- <input type="text" class="form-control" id="title" placeholder="件名" required="required" name="title" value="<?php echo $title;?>"> -->
                <input type="text" class="form-control" id="title" placeholder="件名" required="required" name="title" value="<?php echo $email;?>">
                </div>
            </div>
            <div class="form-group">
            <?php if($cnt==1) echo m_error($message);?> 
            <label class="col-sm-2 control-label">お問い合わせ内容</label>
                <div class="col-sm-10">
                <textarea class="form-control" rows="5" required="required" id="message" placeholder="内容" name="message"><?php echo $message;?></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                <button type="reset" value="reset" class="btn btn-info" onClick="clearFormAll()">cancel</button>
                <button type="submit" value="送信" class="btn btn-primary">送信</button>
                </div>
            </div>
    </form>
    </div><!-- /container -->
</div><!-- /page -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>