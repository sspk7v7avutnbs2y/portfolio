<?php
/* Smarty version 4.3.2, created on 2024-01-18 13:39:01
  from '/var/www/html/projectEx/html/reauthenticate.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65a8ab655030b2_15752846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c019f7921aa3d77db851d28d3479a3122b5c003b' => 
    array (
      0 => '/var/www/html/projectEx/html/reauthenticate.html',
      1 => 1705552408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a8ab655030b2_15752846 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>再認証</title>
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

        input[type="text"],
        input[type="password"] {
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

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            background-color: #fff;
        }
    </style>
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    <div class="form-container">
        <h2>再認証</h2>
        <p>本人確認のためIDとパスワードを入力してください</p>
        <form action="../php/reauthenticate.php" method="POST">
            <label for="user_id">ユーザーID:</label>
            <input type="text" id="user_id" name="user_id" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>
            
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>
        
            <input type="submit" value="認証">
        </form>
        <?php if ($_smarty_tpl->tpl_vars['msg']->value) {?>
        <p><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</p>
        <?php }?>
    </div>
</body>

</html><?php }
}
