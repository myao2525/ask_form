<?php
function check($name,$email,$seibetu,$title,$message){
		if($name=='' || $email=='' || $seibetu=='' || $title=='' || $message==''){
			return false;
		}else {
			return true;
		}
	}

	function check_email($email){
		if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
			
			 return true;
		}else{
			return false;
		}
	}
	function n_error($name){
		if($name==''){
			$text = "名前を入力してください</ br>";
			return $text;
		}
	}
	function e_error($email){
		if(!check_email($email)){
			$text = "メールアドレスが正しくありません</ br>";
			return $text;
		}
	}
	function s_error($seibetu){
		if($seibetu==''){
			$text = "性別を選択してください</ br>";
			return $text;
		}
	}
	function t_error($title){
		if($title==''){
			$text = "件名を入力してください</ br>";
			return $text;
		}
	}
	function m_error($message){
		if($message==''){
			$text = "内容を入力してください</ br>";
			return $text;
		}
	}
?>