<?php
include 'smarty.php';
include 'db.php';

if ($_POST) {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $name = $_POST['name'];
    $mail = $_POST['mail'];
    $birthday = $_POST['birthday'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    try {
        // パスワードが一致しているか確認
        if ($password !== $confirm_password) {
            $smarty->assign('msg', "入力されたパスワードが一致しません。");
            $smarty->display("registration.html");
        } else {
            // user_idがすでに登録済みか調べる
            $check_sql = "SELECT * FROM user_table WHERE user_id=:user_id";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->bindParam(':user_id', $user_id);
            $check_stmt->execute();

            if ($check_stmt->fetch() != false) {
                $smarty->assign('msg', "指定したユーザーIDは既に存在します。別のユーザーIDを選択してください");
                $smarty->display("registration.html");
            } else {
                // 登録されていなければinsert 
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $insert_sql = "INSERT INTO user_table(user_id, password, name, mail, birthday, question, answer) VALUES (:user_id, :password, :name, :mail, :birthday, :question, :answer)";
                $insert_stmt = $pdo->prepare($insert_sql);
                $insert_stmt->bindParam(':user_id', $user_id);
                $insert_stmt->bindParam(':password', $hashed_password);
                $insert_stmt->bindParam(':name', $name);
                $insert_stmt->bindParam(':mail', $mail);
                $insert_stmt->bindParam(':birthday', $birthday);
                $insert_stmt->bindParam(':question', $question);
                $insert_stmt->bindParam(':answer', $answer);
                $insert_stmt->execute();
                $smarty->assign('msg', 'ユーザー登録が成功しました。');
                $smarty->display('logIn.html');
            }
        }
        $pdo = null;
    } catch (Exception $e) {
        echo $e->getMessage() . PHP_EOL;
    }
} else {
    $smarty->display('registration.html');
}
?>