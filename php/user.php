<?php
// user.php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';


// セッション変数からユーザ情報を取得
$userID = $s_user_id;
$username = $s_name;

// Smartyに変数をアサイン
$smarty->assign('username', $username);

// テンプレートを表示
$smarty->display('user.html');
?>
