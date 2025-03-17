<?php
include 'smarty.php';
include 'logInCheck.php';
include 'db.php';

// LogInCheck.phpで取得したユーザーIDを使用してデータベースからデータを取得
$sql = "SELECT * FROM class_evaluation WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':user_id' => $s_user_id]);
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Smartyを使用してarchive.htmlに結果を表示
if (empty($results)) {
    $smarty->assign('msg', '入力履歴が存在しませんでした');
} else {
    $smarty->assign('results', $results);
}

$smarty->display('archive.html');
?>
