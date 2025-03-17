<?php
/* Smarty version 4.3.2, created on 2024-01-25 15:35:25
  from '/var/www/html/projectEx/html/update.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65b2012dabb4a6_98403193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '20bb1bc88b7e9eaa0cf3de9ca8bd1a3126a068d9' => 
    array (
      0 => '/var/www/html/projectEx/html/update.html',
      1 => 1706164515,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65b2012dabb4a6_98403193 (Smarty_Internal_Template $_smarty_tpl) {
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
            margin-left: 20px;
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
    <p><a href="../php/archive.php">入力履歴へ戻る</a></p>
    <div class="form-container">
        
        <h2><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
</h2>
        <h2>投稿ID「<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
」の授業評価変更</h2>
        <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

        <form action="../php/update.php" method="POST">
            <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['post_id']->value;?>
">
            <input type="hidden" name="class" value="<?php echo $_smarty_tpl->tpl_vars['class']->value;?>
">

            <input type="hidden" name="src" value="update">
            
            <label for="teacher">担当教員:</label>
            <select id="Teacher" name="Teacher">
                <?php if ((isset($_smarty_tpl->tpl_vars['selectedData']->value))) {?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['selectedData']->value['teacher'];?>
" selected><?php echo $_smarty_tpl->tpl_vars['selectedData']->value['teacher'];?>
</option>
                <?php }?>
            </select>

            <div class="term-container">
                <div class="year-input">
                    <label for="Year">受講時期:</label>
                    <small>入力例: 2023 (半角数字のみ)</small>
                    <input type="text"  id="Year" name="Year" maxlength="4" pattern="^[0-9]+$" oninput="this.value=this.value.replace(/[^0-9]/g,'')" value="<?php echo $_smarty_tpl->tpl_vars['selectedData']->value['year'];?>
">
                </div>
                <div class="semester-select">
                    <label for="Semester">　</label>
                    <select id="Semester" name="Semester">
                        <option value="春学期" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['semester'] == '春学期') {?>selected<?php }?>>春学期</option>
                        <option value="秋学期" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['semester'] == '秋学期') {?>selected<?php }?>>秋学期</option>
                    </select>
                </div>
            </div>

            <label for="attendance">出席のタイミング:</label>
            <select id="Attendance" name="Attendance">
                <option value="最初" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['attendance'] == '最初') {?>selected<?php }?>>最初</option>
                <option value="中間" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['attendance'] == '中間') {?>selected<?php }?>>中間</option>
                <option value="最後" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['attendance'] == '最後') {?>selected<?php }?>>最後</option>
            </select>

            <div class="exam-container">
                <div class="exam-input">
                    <label for="exam">定期試験:</label>
                    <select id="Exam" name="Exam" onchange="toggleDifficulty('Exam_difficulty')">
                        <option value="オンライン" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam'] == 'オンライン') {?>selected<?php }?>>オンライン</option>
                        <option value="筆記式" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam'] == '筆記式') {?>selected<?php }?>>筆記式</option>
                        <option value="なし" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam'] == 'なし') {?>selected<?php }?>>なし</option>
                    </select>
                </div>
                <div class="exam-select">
                    <label for="exam_difficulty">試験の難易度:</label>
                    <select id="Exam_difficulty" name="Exam_difficulty" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam'] == 'なし') {?>disabled<?php }?>>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam_difficulty'] == '1') {?>selected<?php }?>>1 - 非常に簡単</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam_difficulty'] == '2') {?>selected<?php }?>>2 - 簡単</option>
                        <option value="3" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam_difficulty'] == '3') {?>selected<?php }?>>3 - 普通</option>
                        <option value="4" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam_difficulty'] == '4') {?>selected<?php }?>>4 - 難しい</option>
                        <option value="5" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['exam_difficulty'] == '5') {?>selected<?php }?>>5 - 非常に難しい</option>
                    </select>
                </div>
            </div>

            <div class="report-container">
                <div class="report-input">
                    <label for="report">レポート:</label>
                    <select id="Report" name="Report" onchange="toggleDifficulty('Report_difficulty')">
                        <option value="毎回" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report'] == '毎回') {?>selected<?php }?>>毎回</option>
                        <option value="時々" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report'] == '時々') {?>selected<?php }?>>時々</option>
                        <option value="なし" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report'] == 'なし') {?>selected<?php }?>>なし</option>
                    </select>
                </div>
                <div class="exam-select">
                    <label for="report_difficulty">レポートの難易度:</label>
                    <select id="Report_difficulty" name="Report_difficulty" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report'] == 'なし') {?>disabled<?php }?>>
                        <option value="1" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report_difficulty'] == '1') {?>selected<?php }?>>1 - 非常に簡単</option>
                        <option value="2" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report_difficulty'] == '2') {?>selected<?php }?>>2 - 簡単</option>
                        <option value="3" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report_difficulty'] == '3') {?>selected<?php }?>>3 - 普通</option>
                        <option value="4" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report_difficulty'] == '4') {?>selected<?php }?>>4 - 難しい</option>
                        <option value="5" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['report_difficulty'] == '5') {?>selected<?php }?>>5 - 非常に難しい</option>
                    </select>
                </div>
            </div>

            <label for="Feedback">授業の感想:</label>
            <small>300文字以内で入力してください（<span id="charCount">0</span>/300）</small>
            <textarea id="Feedback" name="Feedback" maxlength="300" oninput="CharCount(this)"><?php echo $_smarty_tpl->tpl_vars['selectedData']->value['feedback'];?>
</textarea>

            <label for="Difficulty">授業の難易度:</label>
            <select id="Difficulty" name="Difficulty">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['difficulty'] == '1') {?>selected<?php }?>>1 - 非常に簡単</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['difficulty'] == '2') {?>selected<?php }?>>2 - 簡単</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['difficulty'] == '3') {?>selected<?php }?>>3 - 普通</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['difficulty'] == '4') {?>selected<?php }?>>4 - 難しい</option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['difficulty'] == '5') {?>selected<?php }?>>5 - 非常に難しい</option>
            </select>

            <label for="Interesting">授業の充実度:</label>
            <select id="Interesting" name="Interesting">
                <option value="1" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['interesting'] == '1') {?>selected<?php }?>>1 - 非常に面白くない</option>
                <option value="2" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['interesting'] == '2') {?>selected<?php }?>>2 - 面白くない</option>
                <option value="3" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['interesting'] == '3') {?>selected<?php }?>>3 - 普通</option>
                <option value="4" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['interesting'] == '4') {?>selected<?php }?>>4 - 面白い</option>
                <option value="5" <?php if ($_smarty_tpl->tpl_vars['selectedData']->value['interesting'] == '5') {?>selected<?php }?>>5 - 非常に面白い</option>
            </select>

            <input type="submit" value="送信">
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

        //教員名を取得
        document.addEventListener('DOMContentLoaded', function () {
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

</html>
<?php }
}
