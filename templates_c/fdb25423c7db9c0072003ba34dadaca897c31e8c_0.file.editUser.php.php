<?php
/* Smarty version 4.3.2, created on 2023-12-17 13:13:37
  from '/var/www/html/projectEx/php/editUser.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_657e7571c33cf5_33932179',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fdb25423c7db9c0072003ba34dadaca897c31e8c' => 
    array (
      0 => '/var/www/html/projectEx/php/editUser.php',
      1 => 1702786278,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657e7571c33cf5_33932179 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php'; ?>

include 'db.php';
include 'logIncheck.php';

// セッションがない場合または再認証が成功していない場合、再認証ページにリダイレクト
if (!isset($_SESSION['reauthenticated']) || !$_SESSION['reauthenticated']) {
    header('Location: ../php/reauthenticate.php');
    exit;
}

unset($_SESSION['reauthenticated']); // 再認証が成功したらセッション変数を削除

if ($_POST) {
    // 入力されたデータの取得
    $new_password = $_POST['password'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];

    // 現在のユーザーIDの取得
    $current_user_id = $s_user_id; // logIncheck.phpでセットされた変数を使用

    // パスワードのハッシュ化
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // データベースを更新
    $updateSql = "UPDATE user_table SET password = :hashedPassword, name = :newName, mail = :newMail WHERE user_id = :currentUserId";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(':hashedPassword', $hashed_password, PDO::PARAM_STR); // 変数名を修正
    $updateStmt->bindParam(':newName', $name, PDO::PARAM_STR); // 変数名を修正
    $updateStmt->bindParam(':newMail', $mail, PDO::PARAM_STR); // 変数名を修正
    $updateStmt->bindParam(':currentUserId', $current_user_id, PDO::PARAM_STR);

    if ($updateStmt->execute()) {
        $smarty->assign('msg', 'データの変更が完了しました。');
        $smarty->display('editUser.html');
    } else {
        $smarty->assign('msg', 'エラー: データが正しく更新されていません。');
    }
} else {
    $smarty->display("editUser.html");
}
<?php echo '?>'; ?>

<?php }
}
