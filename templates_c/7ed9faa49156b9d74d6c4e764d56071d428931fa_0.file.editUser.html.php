<?php
/* Smarty version 4.3.2, created on 2024-02-05 09:52:46
  from '/var/www/html/projectEx/html/editUser.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c0315ecd2a57_27361917',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ed9faa49156b9d74d6c4e764d56071d428931fa' => 
    array (
      0 => '/var/www/html/projectEx/html/editUser.html',
      1 => 1707094037,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c0315ecd2a57_27361917 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー情報変更</title>
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
        input[type="password"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        .submit-container {
            display: flex;
            justify-content: space-between;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }

        .error {
            color: red;
        }
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>

    <div class="form-container">
        <h2><?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
のユーザー情報変更</h2>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>


        <!-- エラーメッセージを表示 -->
        <div class="error"><?php echo $_smarty_tpl->tpl_vars['error_msg']->value;?>
</div>

        <div class="edit-form">
            <form action="../php/editUser.php" method="POST" id="editForm">
                <label for="password">新しいパスワード:</label>
                <small>30字以内の半角英数字 <br>記号は!@#$%^&*()-_+=のみ</small>
                <input type="password"  id="password" name="password"  maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$" oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')">

                <label for="confirm_password">新しいパスワード（確認用）:</label>
                <input type="password"   id="confirm_password" name="confirm_password" maxlength="30" pattern="^[a-zA-Z0-9!@#$%^&*()-_+=]+$"  oninput="this.value=this.value.replace(/[^a-zA-Z0-9!@#$%^&*()-_+=]/g,'')">

                <label for="name">新しい名前:</label>
                <input type="text"  id="name" name="name" maxlength="30">

                <label for="mail">新しいメールアドレス:</label>
                <input type="email"   id="mail" name="mail" maxlength="40">

                <div class="submit-container">
                    <input type="submit" value="登録情報変更">
                </div>
            </form>
        </div>

        <div style="height: 1em;"></div>

        <div class="delete-form">
            <form action="../php/deleteUser.php" method="POST" class="deleteForm">
                <input type="hidden" name="user_id" value="<?php echo $_smarty_tpl->tpl_vars['user']->value['user_id'];?>
">
                <div class="submit-container">
                    <input type="submit" value="ユーザー削除">
                </div>
            </form>
        </div>
    </div>

    <?php echo '<script'; ?>
>
        document.addEventListener('DOMContentLoaded', function () {
            // フォームを取得
            const editForm = document.getElementById('editForm'); // フォームのIDを指定する
            const deleteForm = document.querySelector('.deleteForm'); // 削除フォームを取得する

            // エラーメッセージを出力する要素を取得
            const error = document.querySelector('.error');

            // ユーザー情報変更フォームのsubmitイベント発生時に処理開始
            editForm.addEventListener('submit', function (event) {
                // 新しいパスワード、新しい名前、新しいメールアドレスの値を取得
                const newPassword = editForm.querySelector('#password').value.trim();
                const newName = editForm.querySelector('#name').value.trim();
                const newMail = editForm.querySelector('#mail').value.trim();

                // ユーザーID、パスワード、名前、メールアドレスのいずれかが入力されているか確認
                if (newPassword === '' && newName === '' && newMail === '') {
                    // エラーメッセージを出力
                    error.textContent = '※パスワード、名前、メールアドレスのいずれかは必須です';
                    // submitイベントを止める
                    event.preventDefault();
                } else {
                    // エラーメッセージをクリア
                    error.textContent = '';
                }
            });

            // ユーザー削除フォームのsubmitイベント発生時に処理開始
            deleteForm.addEventListener('submit', function (event) {
                // ユーザー削除の確認ダイアログ
                const confirmed = confirm('本当に削除しますか？');
                if (!confirmed) {
                    // キャンセルされた場合、submitイベントを止める
                    event.preventDefault();
                }
            });
        });
    <?php echo '</script'; ?>
>
</body>

</html>
<?php }
}
