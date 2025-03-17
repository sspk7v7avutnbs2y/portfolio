<?php
/* Smarty version 4.3.2, created on 2024-01-25 12:07:46
  from '/var/www/html/projectEx/html/input.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65b1d082481e18_78401056',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab53504ffd513973f208d73b7d2691c00462cd50' => 
    array (
      0 => '/var/www/html/projectEx/html/input.html',
      1 => 1706151977,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b1d082481e18_78401056 (Smarty_Internal_Template $_smarty_tpl) {
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

        .term-container {
            display: flex;
            flex-direction: row;
        }

        .term-container .year-input {
            flex: 1;
            margin-right: 20px;
        }

        .term-container .semester-select {
            flex: 1;
            margin-left: 10px;
            margin-top: 24px;
        }

        .exam-container,
        .report-container {
            display: flex;
            flex-direction: row;
        }

        .exam-container .exam-input,
        .report-container .report-input {
            flex: 1;
            margin-right: 20px;
        }

        .exam-container .exam-select,
        .report-container .exam-select {
            flex: 1;
            margin-left: 20px;
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
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    <div class="form-container">
        <h2>授業評価フォーム</h2>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/input.php" method="POST" id="evaluationForm">
            <label for="Class">授業名:<font color="red">(必須)</font></label>
            <select id="Class" name="Class" required></select>

            <label for="teacher">担当教員:<font color="red">(必須)</font></label>
            <select id="Teacher" name="Teacher" required></select>

            <div class="term-container">
                <div class="year-input">
                    <label for="Year">受講時期:<font color="red">(必須)</font></label>
                    <small>入力例: 2023 (半角数字のみ)</small>
                    <input type="text" id="Year" name="Year" maxlength="4" pattern="^[0-9]+$"
                        oninput="this.value=this.value.replace(/[^0-9]/g,'')" required>

                </div>
                <div class="semester-select">
                    <label for="Semester">　</label>
                    <select id="Semester" name="Semester" required>
                        <option value="春学期">春学期</option>
                        <option value="秋学期">秋学期</option>
                    </select>
                </div>
            </div>

            <label for="attendance">出席のタイミング<font color="red">(必須)</font></label>
            <select id="Attendance" name="Attendance" required>
                <option value="最初">最初</option>
                <option value="中間">中間</option>
                <option value="最後">最後</option>
            </select>

            <div class="exam-container">
                <div class="exam-input">
                    <label for="exam">定期試験:<font color="red">(必須)</font></label>
                    <select id="Exam" name="Exam" required onchange="toggleDifficulty('Exam_difficulty')">
                        <option value="オンライン">オンライン</option>
                        <option value="筆記式">筆記式</option>
                        <option value="なし">なし</option>
                    </select>
                </div>
                <div class="exam-select">
                    <label for="exam_difficulty">試験の難易度:</label>
                    <select id="Exam_difficulty" name="Exam_difficulty" required>
                        <option value="1">1 - 非常に簡単</option>
                        <option value="2">2 - 簡単</option>
                        <option value="3">3 - 普通</option>
                        <option value="4">4 - 難しい</option>
                        <option value="5">5 - 非常に難しい</option>
                    </select>
                </div>
            </div>

            <div class="report-container">
                <div class="report-input">
                    <label for="report">レポート:<font color="red">(必須)</font></label>
                    <select id="Report" name="Report" required onchange="toggleDifficulty('Report_difficulty')">
                        <option value="毎回">毎回</option>
                        <option value="時々">時々</option>
                        <option value="なし">なし</option>
                    </select>
                </div>
                <div class="exam-select">
                    <label for="report_difficulty">レポートの難易度:</label>
                    <select id="Report_difficulty" name="Report_difficulty" required>
                        <option value="1">1 - 非常に簡単</option>
                        <option value="2">2 - 簡単</option>
                        <option value="3">3 - 普通</option>
                        <option value="4">4 - 難しい</option>
                        <option value="5">5 - 非常に難しい</option>
                    </select>
                </div>
            </div>

            <label for="Feedback">授業の感想:</label>
            <small>300文字以内で入力してください（<span id="charCount">0</span>/300）</small>
            <textarea id="Feedback" name="Feedback" maxlength="300" oninput="CharCount(this)"></textarea>

            <label for="Difficulty">授業の難易度:<font color="red">(必須)</font></label>
            <select id="Difficulty" name="Difficulty" required>
                <option value="1">1 - 非常に簡単</option>
                <option value="2">2 - 簡単</option>
                <option value="3">3 - 普通</option>
                <option value="4">4 - 難しい</option>
                <option value="5">5 - 非常に難しい</option>
            </select>

            <label for="interesting">授業の充実度:<font color="red">(必須)</font></label>
            <select id="Interesting" name="Interesting" required>
                <option value="1">1 - 非常に面白くない</option>
                <option value="2">2 - 面白くない</option>
                <option value="3">3 - 普通</option>
                <option value="4">4 - 面白い</option>
                <option value="5">5 - 非常に面白い</option>
            </select>

            <input type="submit" value="登録">
        </form>
    </div>

    <?php echo '<script'; ?>
>
        //感想の部分に文字数カウンターを実装
        function CharCount(textarea) {
        const charCountSpan = document.getElementById('charCount');
        const charCount = textarea.value.length;

        charCountSpan.textContent = charCount;

        // 文字数が300を超えたら赤にする
        if (charCount > 300) {
            charCountSpan.style.color = 'red';
        } else {
            charCountSpan.style.color = '';  // デフォルトの色に戻す
        }
    }
        //定期試験とレポートの難易度の制御
        function toggleDifficulty(difficultySelectId) {
            const difficultySelect = document.getElementById(difficultySelectId);
            const examValue = document.getElementById('Exam').value;
            const reportValue = document.getElementById('Report').value;

            difficultySelect.disabled = (examValue === 'なし' && difficultySelectId === 'Exam_difficulty') ||
                (reportValue === 'なし' && difficultySelectId === 'Report_difficulty');
        }

        document.addEventListener('DOMContentLoaded', function () {
            // 授業名の取得
            fetch('getClass.php')
                .then(response => response.json())
                .then(classes => {
                    const classSelect = document.getElementById('Class');
                    classes.forEach(className => {
                        const option = document.createElement('option');
                        option.value = className;
                        option.textContent = className;
                        classSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('データの取得中にエラーが発生しました。', error));

            // 教員名の取得
            fetch('getTeacher.php')
                .then(response => response.json())
                .then(teachers => {
                    const teacherSelect = document.getElementById('Teacher');
                    teachers.forEach(teacherName => {
                        const option = document.createElement('option');
                        option.value = teacherName;
                        option.textContent = teacherName;
                        teacherSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('データの取得中にエラーが発生しました。', error));
        });
    <?php echo '</script'; ?>
>

</body>

</html><?php }
}
