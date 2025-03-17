<?php
/* Smarty version 4.3.2, created on 2024-01-25 10:49:31
  from '/var/www/html/projectEx/html/forget.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65b1be2b109420_06517149',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '907720e949e256aa3146cab23cb7ac56eeeba575' => 
    array (
      0 => '/var/www/html/projectEx/html/forget.html',
      1 => 1706147369,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b1be2b109420_06517149 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー登録</title>
    <style>
        /* CSS スタイルをここに追加 */
        .form-container {
            max-width: 400px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 15px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
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
    </style>
</head>
<body>
    <div class="form-container">
        <h2>ユーザー情報確認</h2>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/forget.php" method="POST">

            <label for="mail">メールアドレス:<font color="red">(必須)</font></label>
            <input type="email" maxlength="40" id="mail" name="mail" required>

            <label for="birthday">生年月日:<font color="red">(必須)</font></label>
            <small>入力例: 19851102（1985年11月2日生まれの場合）</small>
            <input type="text" id="birthday" name="birthday" maxlength="8" required>

            <label for="question">秘密の質問:<font color="red">(必須)</font></label>
            <select id="question" name="question" required>
                <option value="あなたの得意料理は?">あなたの得意料理は?</option>
                <option value="あなたのペットの名前は?">あなたのペットの名前は?</option>
                <option value="母親の旧姓は?">母親の旧姓は?</option>
                <option value="小学校の担任の名前は?">小学校の担任の名前は?</option>
                <option value="初めて見た映画のタイトルは?">初めて見た映画のタイトルは?</option>
            </select>

            <label for="answer">秘密の質問の答え:<font color="red">(必須)</font></label>
            <input type="text" id="answer" name="answer" maxlength="100" required>

            <input type="submit" value="送信">
        </form>
    </div>
</body>
</html>
<?php }
}
