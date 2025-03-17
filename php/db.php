<?php
try {
    $db_host = 'localhost';
    $db_name = 'everyone_credits';
    $db_user = 'kcg';
    $db_password = 'kcg';

    // データベース接続
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_password);

    // 接続オプションの設定
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (Exception $e) {
    // エラーをログに記録するなど、適切な処理を行う
    error_log($e->getMessage(), 0);
    // クライアントには具体的なエラーメッセージは表示しない
    echo 'データベース接続エラーが発生しました。管理者にお知らせください。';
    exit; // データベース接続に失敗したらプログラムを終了する
}
?>
