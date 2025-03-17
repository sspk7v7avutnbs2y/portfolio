<?php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

if ($_POST) {
    $post_id = $_POST['post_id'];

    try {
        // データベースから該当の post_id を持つレコードを削除する SQL クエリ
        $deleteSql = "DELETE FROM class_evaluation WHERE post_id = :post_id";
        $deleteStme = $pdo->prepare($deleteSql);
        $deleteStme->bindParam(':post_id', $post_id, PDO::PARAM_INT);
        $deleteStme->execute();

    } catch (Exception $e) {
        // エラーが発生した場合の処理
        $message = '削除に失敗しました';
        echo $e->getMessage() . PHP_EOL;
    }

    // 削除の結果をユーザーに表示する
    $smarty->assign('msg', "削除が完了しました。");
    $smarty->display('delete.html');
} else {
    // POST でデータが渡されていない場合の処理
    echo "post_id が指定されていません";
}
?>
