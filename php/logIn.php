<?php
    // 新しいセッションを開始、あるいは既存のセッションを再開する
    // 10分で無効になる 
    $lifetime=600;
    session_set_cookie_params($lifetime);
    session_start();
    include 'smarty.php';
    include 'db.php';

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM user_table WHERE user_id='{$user_id}'";
    $stmt = $pdo->query($sql);
    $rs = $stmt->fetch();

    if (password_verify($password, $rs['password']))    // ログイン成功
    {      
        //DBのユーザー情報をセッション変数に保存
        $_SESSION['user_id'] = $rs['user_id'];
        $_SESSION['name'] = $rs['name'];
        $_SESSION['mail'] = $rs['mail'];
        header('Location:../php/user.php');
        exit;
    }
    else
    {
        $smarty->assign('msg', 'IDまたはパスワードが間違っています');
        $smarty->display('logIn.html');
    }


?>