<?php
include 'db.php'; // db.php ファイルを読み込む

try {
    // 授業名を取得するための SQL クエリ
    $sql = "SELECT class FROM class_table";
    
    // クエリを実行し、結果を取得
    $stmt = $pdo->query($sql);
    $classes = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // 取得した授業名を JSON 形式で出力
    echo json_encode($classes);
} catch (Exception $e) {
    // エラー処理
    error_log($e->getMessage(), 0);
    echo 'データの取得中にエラーが発生しました。';
}
?>
