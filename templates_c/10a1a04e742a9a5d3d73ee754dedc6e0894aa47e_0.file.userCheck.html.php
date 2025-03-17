<?php
/* Smarty version 4.3.2, created on 2023-12-14 19:43:33
  from '/var/www/html/projectEx/html/userCheck.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_657adc55221484_21212814',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10a1a04e742a9a5d3d73ee754dedc6e0894aa47e' => 
    array (
      0 => '/var/www/html/projectEx/html/userCheck.html',
      1 => 1702550395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657adc55221484_21212814 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー情報変更認証</title>
    <style>
        /* CSS スタイルをここに追加 */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    <div class="form-container">
        <h2>ユーザー情報変更認証</h2>
        <form action="../php/userCheck.php" method="POST">
            <label for="user-id">ユーザーID:</label>
            <input type="text" id="user_id" name="user_id" required>

            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" required>

            <input type="submit" value="認証">
        </form>
    </div>
</body>
</html>
<?php }
}
