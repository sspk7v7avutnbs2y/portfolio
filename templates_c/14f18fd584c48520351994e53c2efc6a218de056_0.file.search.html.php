<?php
/* Smarty version 4.3.2, created on 2024-02-08 13:49:27
  from '/var/www/html/projectEx/html/search.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c45d570255c4_19660824',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14f18fd584c48520351994e53c2efc6a218de056' => 
    array (
      0 => '/var/www/html/projectEx/html/search.html',
      1 => 1707366927,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c45d570255c4_19660824 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>授業検索</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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

        .form-container .year-input {
            width: 30%;
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

        .result {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>

    <div class="form-container">
        <h2>授業検索</h2>
        <div class="result"><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>
</div>
        <form action="../php/search.php" method="POST" id="searchForm">
            <label for="search-class">授業名:</label>
            <select id="search-class" name="search-class"></select>

            <label for="search-teacher">担当教員:</label>
            <select id="search-teacher" name="search-teacher"></select>

            <div class="year-input">
                <label for="search-year">受講年度:</label>
                <input type="text" id="search-year" name="search-year" maxlength="4" pattern="^[0-9]+$"
                    oninput="this.value=this.value.replace(/[^0-9]/g,'')">
            </div>

            <input type="submit" value="検索">
        </form>
        <div class="error"></div>
    </div>

    <?php echo '<script'; ?>
>
        // 授業名のドロップダウンリストを取得
        var classDropdown = document.getElementById("search-class");

        // 担当教員のドロップダウンリストを取得
        var teacherDropdown = document.getElementById("search-teacher");

        // Ajaxで授業名のデータを取得し、ドロップダウンリストにセット
        var classRequest = new XMLHttpRequest();
        classRequest.onreadystatechange = function () {
            if (classRequest.readyState == 4 && classRequest.status == 200) {
                var classes = JSON.parse(classRequest.responseText);
                classes.forEach(function (className) {
                    var option = document.createElement("option");
                    option.value = className;
                    option.text = className;
                    classDropdown.add(option);
                });
            }
        };
        classRequest.open("GET", "../php/getClass.php", true);
        classRequest.send();

        // Ajaxで担当教員のデータを取得し、ドロップダウンリストにセット
        var teacherRequest = new XMLHttpRequest();
        teacherRequest.onreadystatechange = function () {
            if (teacherRequest.readyState == 4 && teacherRequest.status == 200) {
                var teachers = JSON.parse(teacherRequest.responseText);
                teachers.forEach(function (teacherName) {
                    var option = document.createElement("option");
                    option.value = teacherName;
                    option.text = teacherName;
                    teacherDropdown.add(option);
                });
            }
        };
        teacherRequest.open("GET", "../php/getTeacher.php", true);
        teacherRequest.send();

        // フォームを取得
        const form = document.getElementById('searchForm');

        // エラーメッセージを出力する要素を取得
        const error = document.querySelector('.error');

        // フォームのsubmitイベント発生時に処理開始
        form.addEventListener('submit', (event) => {
            // 授業名、教員名、受講年度の値を取得
            const className = form.querySelector('#search-class').value.trim();
            const teacherName = form.querySelector('#search-teacher').value.trim();
            const year = form.querySelector('#search-year').value.trim();

            // 授業名、教員名、受講年度のいずれかが空であれば
            if (className === '' && teacherName === '' && year === '') {
                // エラーメッセージを出力する
                error.textContent = '※授業名、担当教員、受講年度のいずれかは必須です';
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
