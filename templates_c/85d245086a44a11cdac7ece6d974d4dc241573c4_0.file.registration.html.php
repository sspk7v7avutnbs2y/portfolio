<?php
/* Smarty version 4.3.2, created on 2024-01-18 10:20:48
  from '/var/www/html/projectEx/html/registration.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65a87cf043ea75_16469629',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '85d245086a44a11cdac7ece6d974d4dc241573c4' => 
    array (
      0 => '/var/www/html/projectEx/html/registration.html',
      1 => 1705540802,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65a87cf043ea75_16469629 (Smarty_Internal_Template $_smarty_tpl) {
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
        <h2>ユーザー登録</h2>
        
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/registration.php" method="POST">
            <label for="user_id">ユーザーID:<font color="red">(必須)</font></label>
            <small>ユーザーIDは変更できません</small>
            <small>30字以内の半角英数字 <br>記号は!@#$%^&*()-_+=のみ</small>
            <input type="text"  id="user_id" name="user_id" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required >

            <label for="password">パスワード:<font color="red">(必須)</font></label>
            <small>30字以内の半角英数字 <br>記号は!@#$%^&*()-_+=のみ</small>
            <input type="password"  id="password" name="password" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>

            <label for="confirm_password">パスワード:(確認用)</label>
            <input type="password" id="confirm_password" name="confirm_password" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')" required>

            <label for="name">ユーザー名:<font color="red">(必須)</font></label>
            <small>ユーザー名は後で変更できます。</small>
            <input type="text" id="name" name="name" required>

            <label for="mail">メールアドレス:<font color="red">(必須)</font></label>
            <input type="email" maxlength="40" id="mail" name="mail" required>
 
            <label for="birthday">生年月日:<font color="red">(必須)</font></label>
            <small>入力例: 19851102（1985年11月2日生まれの場合）</small>
            <input type="text" pattern="^[0-9]+$"  id="birthday" name="birthday"maxlength="8" oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>

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

            <input type="submit" value="登録">
        </form>
    </div>
</body>

</html><?php }
}
