<?php
    // dbEnd.php

    // $pdoが存在し、かつPDOオブジェクトであるかを確認してから接続を解除する
    if (isset($pdo) && $pdo instanceof PDO) {
        $pdo = null; // PDO接続を解除
    }
?>
