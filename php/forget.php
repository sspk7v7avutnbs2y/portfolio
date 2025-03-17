<?php
include("smarty.php");
include("db.php");

// POSTデータの取得
$mail = isset($_POST['mail']) ? $_POST['mail'] :'';
$birthday = isset($_POST['birthday']) ? $_POST['birthday'] : '';
$question = isset($_POST['question']) ? $_POST['question'] : '';
$answer = isset($_POST['answer']) ? $_POST['answer'] : '';

if ($_POST) {
    try {
        // データベースからユーザー情報を取得する SQL クエリ
        $sql = "SELECT user_id, password FROM user_table WHERE mail = :mail AND birthday = :birthday AND question = :question AND answer = :answer";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":mail", $mail, PDO::PARAM_STR);
        $stmt->bindParam(':birthday', $birthday, PDO::PARAM_STR);
        $stmt->bindParam(':question', $question, PDO::PARAM_STR);
        $stmt->bindParam(':answer', $answer, PDO::PARAM_STR);
        $stmt->execute();

        // ユーザー情報が一致する場合
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $user_id = $row['user_id'];
            $password = $row['password'];

            // パスワードのハッシュ化（元に戻す）
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // セッションに認証情報を格納
            session_start();
            $_SESSION['reauthenticated'] = true;
            $_SESSION['user_id'] = $user_id;
            $_SESSION['hashed_password'] = $hashed_password;

            // リダイレクト
            header("Location: forgetUser.php");
            exit;
        } else {
            $smarty->assign('msg','入力された情報が一致しません。');
            $smarty->display("forget.html");
            
        }
    } catch (PDOException $e) {
        echo "エラー: " . $e->getMessage();
    }
} else {
    $smarty->display("forget.html");
}

// データベース接続を閉じる
include("dbEnd.php");
?>
