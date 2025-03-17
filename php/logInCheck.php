<?php

    // セッション変数から取得したユーザ情報
    $s_user_id = "";
    $s_password = "";
    $s_name = "";
    $s_mail = ""; 

    function Logined()
    {
        global $s_user_id, $s_password, $s_name, $s_mail;

        // 新しいセッションを開始、あるいは既存のセッションを再開する
        // 10分で無効になる 
        $lifetime=600;
        session_set_cookie_params($lifetime);
        session_start();
        if(isset($_SESSION['user_id']))
        {
            $loginOK = true;
            $s_user_id = $_SESSION['user_id'];
            $s_password = $_SESSION['password'];
            $s_name = $_SESSION['name'];
            $s_mail = $_SESSION['mail'];
        }
        
        else
            $loginOK = false;
        return($loginOK);
    }

    if(Logined() == false)
    {
        
        $smarty->display('logIn.html');
        exit;
    }
?>