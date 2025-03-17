<?php

include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

if ($_POST) {
    // 入力されたユーザーIDとパスワードの取得
    $entered_user_id = $_POST['user_id'];
    $entered_password = $_POST['password'];

    // データベースからユーザーのパスワードを取得
    $sql = "SELECT * FROM user_table WHERE user_id = :user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':user_id', $s_user_id, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    // $user_idに取得したuser_idを代入
    $user_id = $user['user_id'];
    

    if ($user_id == $entered_user_id && password_verify($entered_password, $user['password'])) {
        // 認証成功時の処理
        session_start();
        $smarty->assign('user_id', $user);
        $_SESSION['reauthenticated'] = true; // 再認証成功の場合、セッション変数を設定
        header('Location:../php/editUser.php');
        exit;
    } else {
        // 認証失敗時の処理
        $smarty->assign('msg', 'IDまたはパスワードが間違っています');
        $smarty->display('reauthenticate.html');
        exit;
    }
} else {
    $smarty->display('reauthenticate.html');
}
?>
