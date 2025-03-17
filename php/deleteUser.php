<?php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームが送信された場合の処理

    try {
        //削除するuser_idと一致する授業評価を削除する
        $deleteClassSql = "DELETE FROM class_evaluation WHERE user_id = :user_id";
        $deleteClassStmt = $pdo->prepare($deleteClassSql);
        $deleteClassStmt->bindParam(':user_id', $s_user_id);
        $deleteClassStmt->execute();

        // ユーザー情報を削除する SQL クエリ
        $deleteSql = "DELETE FROM user_table WHERE user_id = :user_id";
        $deleteStme = $pdo->prepare($deleteSql);
        $deleteStme->bindParam(':user_id', $s_user_id);
        $deleteStme->execute();

        // 削除が成功した場合の処理
        session_destroy(); // セッションを破棄してログアウト状態にする

        $smarty->assign('msg', 'ユーザー情報が削除されました');
        $smarty->display('logIn.html');
    } catch (Exception $e) {
        // エラーが発生した場合の処理
        $msg = 'ユーザー情報の削除に失敗しました';
        echo $e->getMessage() . PHP_EOL;
    }
} else {
    // POST でデータが渡されていない場合の処理
    $smarty->assign('msg','不正なアクセスです');
    $smarty->display('editUser/html');

}



?>
