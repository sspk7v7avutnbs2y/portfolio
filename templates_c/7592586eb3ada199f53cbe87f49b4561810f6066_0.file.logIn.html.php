<?php
/* Smarty version 4.3.2, created on 2024-02-01 11:02:01
  from '/var/www/html/projectEx/html/logIn.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65bafb9947a1f2_44479190',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7592586eb3ada199f53cbe87f49b4561810f6066' => 
    array (
      0 => '/var/www/html/projectEx/html/logIn.html',
      1 => 1706752919,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65bafb9947a1f2_44479190 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ログイン</title>
    <style>
        /* 既存のスタイル */
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
        
        #title {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1 id="title">みんなの単位</h1>
    <div class="form-container">
        <h2>ログイン</h2>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/logIn.php" method="POST">
            <label for="user-id">ユーザーID:</label>
            <input type="text" id="user_id" name="user_id" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>

            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>

            <input type="submit" value="ログイン">
        </form>
        <p>ユーザー登録がまだの場合は <a href="../php/registration.php">こちら</a></p>
        <p>ID・パスワードを忘れた場合は <a href="../php/forget.php">こちら</a></p>
    </div>
</body>
</html>
<?php }
}
