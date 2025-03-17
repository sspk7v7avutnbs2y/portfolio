<?php
    include 'smarty.php';
    
    session_start();        //セッションデータを破棄する時も，session_start()を実行する
    $_SESSION = array();    //セッションの中身をすべて削除
    session_destroy();      //セッションを破壊
    $smarty->display('logIn.html');
?>