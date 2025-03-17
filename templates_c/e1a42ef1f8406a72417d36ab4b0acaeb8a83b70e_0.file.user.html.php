<?php
/* Smarty version 4.3.2, created on 2024-02-01 11:03:00
  from '/var/www/html/projectEx/html/user.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65bafbd49b3bc3_62322369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1a42ef1f8406a72417d36ab4b0acaeb8a83b70e' => 
    array (
      0 => '/var/www/html/projectEx/html/user.html',
      1 => 1706752978,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65bafbd49b3bc3_62322369 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
        }

        header {
            background-color: #f2f2f2;
            padding: 10px;
            text-align: right;
        }

        h1 {
            margin-top: 20px;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            text-align: center;
        }

        li {
            display: block;
            margin: 0;
            padding: 14px 0;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            text-decoration: none;
        }

        li a:hover {
            background-color: #111;
        }

        #title {
            text-align: center;
        }

    </style>
</head>
<body>
    <header>
        <a href="../php/logOut.php" style="color: red; text-decoration: none; padding-right: 20px;">ログアウト</a>
    </header>

    <h1 id="title">みんなの単位</h1>

    <h2>ようこそ, <?php echo htmlspecialchars((string)$_smarty_tpl->tpl_vars['username']->value, ENT_QUOTES, 'UTF-8', true);?>
さん</h1>


    <ul>
        <li><a href="../php/input.php">授業評価入力</a></li>
        <li><a href="../php/search.php">授業評価検索</a></li>
        <li><a href="../php/archive.php">入力履歴</a></li>
        <li><a href="../php/reauthenticate.php">登録情報変更</a></li>
    </ul>
</body>
</html>
<?php }
}
