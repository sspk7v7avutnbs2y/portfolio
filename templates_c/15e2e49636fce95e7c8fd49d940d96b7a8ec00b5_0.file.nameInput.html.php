<?php
/* Smarty version 4.3.2, created on 2023-12-25 14:13:43
  from '/var/www/html/projectEx/html/nameInput.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65890f8760adc3_27584750',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15e2e49636fce95e7c8fd49d940d96b7a8ec00b5' => 
    array (
      0 => '/var/www/html/projectEx/html/nameInput.html',
      1 => 1703481198,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65890f8760adc3_27584750 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>授業評価フォーム</title>
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

        select,
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 150px;
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

        .error {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    <div class="form-container">
        <h2>授業名・教員名</h2>
        <p>リストにない授業・教員があれば登録できます。</p>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/nameInput.php" method="POST" id="nameForm">
            <label for="Class">授業名:</label>
            <input type="text" id="class" name="Class">

            <label for="Teacher">教員名:</label>
            <input type="text" id="teacher" name="Teacher">

            <input type="submit" value="登録">
        </form>
        <div class="error"></div>
    </div>

    <?php echo '<script'; ?>
>
        // フォームを取得（id修正）
        const form = document.getElementById('nameForm');

        // エラーメッセージを出力する要素を取得
        const error = document.querySelector('.error');

        // フォームのsubmitイベント発生時に処理開始
        form.addEventListener('submit', (event) => {
            // 授業名、教員名の値を取得
            const className = form.querySelector('#class').value.trim();
            const teacherName = form.querySelector('#teacher').value.trim();

            // 授業名もしくは教員名のどちらかが空であれば
            if (className === '' && teacherName === '') {
                // エラーメッセージを出力する
                error.textContent = '※授業名もしくは教員名のどちらかは必須です';
                // submitイベントを止める
                event.preventDefault();
            } else {
                // エラーメッセージをクリア
                error.textContent = '';
            }
        });
    <?php echo '</script'; ?>
>

</body>

</html>
<?php }
}
