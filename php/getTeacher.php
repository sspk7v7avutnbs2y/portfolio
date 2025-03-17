<?php
include 'db.php';

try {
    // 教員名を取得するための SQL クエリ
    $sql = "SELECT teacher FROM teacher_table";

    // クエリを実行し、結果を取得
    $stmt = $pdo->query($sql);
    $teachers = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // 取得した教員名を JSON 形式で出力
    echo json_encode($teachers);
} catch (Exception $e) {
    // エラー処理
    error_log($e->getMessage(), 0);
    echo 'データの取得中にエラーが発生しました。';
}
?>
