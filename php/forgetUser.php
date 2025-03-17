<?php
session_start(); // セッションを開始

include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

// 再認証が成功していない場合にログインページにリダイレクト
if (!isset($_SESSION['reauthenticated']) || $_SESSION['reauthenticated'] !== true) {
    header("Location: login.php");
    exit;
}

$current_user_id = $_SESSION['user_id'];

// POST メソッドでフォームが送信された場合の処理
if ($_POST) {
    $new_password = $_POST['password'];
    $confirm_new_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];

    // 新しいパスワードが一致しない場合はエラーメッセージを表示
    if ($new_password !== $confirm_new_password) {
        $smarty->assign('msg', '新しいパスワードが一致しません');
        $smarty->display('editUser.html');
        exit;
    }

    // パスワードが空欄でない場合のみハッシュ化
    $hashed_password = !empty($new_password) ? password_hash($new_password, PASSWORD_DEFAULT) : null;

    // 更新対象の項目を決定
    $updateFields = [];
    $updateParams = [];
    
    if (!empty($hashed_password)) {
        $updateFields[] = 'password = :hashedPassword';
        $updateParams[':hashedPassword'] = $hashed_password;
    }
    if (!empty($name)) {
        $updateFields[] = 'name = :newName';
        $updateParams[':newName'] = $name;
    }
    if (!empty($mail)) {
        $updateFields[] = 'mail = :newMail';
        $updateParams[':newMail'] = $mail;
    }

    // すべての項目が空欄でない場合にのみ実行
    if (!empty($updateFields)) {
        // SQL文を構築
        $updateSql = "UPDATE user_table SET " . implode(', ', $updateFields) . " WHERE user_id = :currentUserId";
        $updateStmt = $pdo->prepare($updateSql);
        // パラメータをバインド
        $updateStmt->bindParam(':currentUserId', $current_user_id, PDO::PARAM_STR);
        
        foreach ($updateParams as $param => $value) {
            $updateStmt->bindParam($param, $value);
        }
        
        // 実行
        $updateStmt->execute();
    }else{
        // フォームの表示前にエラーメッセージを Smarty に割り当て
        $smarty->assign("error_msg", '※パスワード、名前、メールアドレスのいずれかは必須です');
        exit;
    }

    // セッション変数を削除
    session_unset();
    session_destroy();

    // 更新が完了した場合は他のページにリダイレクト
    $smarty->assign("msg",'変更が完了しました。');
    $smarty->display("logIn.html");
    exit;
}

// フォームの表示前に Smarty に変数を割り当て
$smarty->assign("user_id", $current_user_id);

// フォームを表示
$smarty->display("forgetUser.html");
exit;
?>
