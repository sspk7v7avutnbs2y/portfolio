<?php
/* Smarty version 4.3.2, created on 2024-02-08 17:08:16
  from '/var/www/html/projectEx/html/result2.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c48bf0c0fab8_17523362',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7db4d5480db93086225422f4863bc745377daefd' => 
    array (
      0 => '/var/www/html/projectEx/html/result2.html',
      1 => 1707379692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c48bf0c0fab8_17523362 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>授業検索</title>
    <style>
        #teacher {
            text-align: center;
        }

        th {
            white-space: nowrap;
            padding: 10px;
            border-bottom: 2px solid #007bff;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            word-break: break-all;
        }

        .post-container {
            border: 2px solid #007bff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 10px;
            overflow-x: auto;
        }

        .teacher-container {
            border: 2px solid #007bff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 10px;
            overflow-x: auto;
        }

        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
        }

        tr {
            display: flex;
        }

        td {
            flex: 1;
        }
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    <p><a href="../php/search.php">検索画面へ戻る</a></p>


    <div class="teacher-container">
        <h2 id="teacher"><?php echo $_smarty_tpl->tpl_vars['teacher']->value;?>
の授業評価</h2>
        <table>
            <tbody id="search-results" >
                <tr>
                    <td>担当授業</td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['teacher_classes']->value, 'class');
$_smarty_tpl->tpl_vars['class']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['class']->value) {
$_smarty_tpl->tpl_vars['class']->do_else = false;
?>
                    <td><?php echo $_smarty_tpl->tpl_vars['class']->value;?>
</td>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'result');
$_smarty_tpl->tpl_vars['result']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->do_else = false;
?>
    <!-- 四角で囲む -->
    <div class="post-container">
        <h2><?php echo $_smarty_tpl->tpl_vars['result']->value['name'];?>
 さんの投稿</h2>
        <table>
            <tbody id="search-results">
                <tr>
                    <td>授業名</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['class'];?>
</td>
                </tr>
                <tr>
                    <td>担当教員</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['teacher'];?>
</td>
                </tr>
                <tr>
                    <td>受講時期</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['year'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['semester'];?>
</td>
                </tr>
                <tr>
                    <td>出席のタイミング</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['attendance'];?>
</td>
                </tr>
                <tr>
                    <td>試験の実施方法</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['exam'];?>
</td>
                </tr>
                <tr>
                    <td>試験の難易度</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['exam_difficulty'];?>
</td>
                </tr>
                <tr>
                    <td>レポートの有無</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['report'];?>
</td>
                </tr>
                <tr>
                    <td>レポートの難易度</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['report_difficulty'];?>
</td>
                </tr>
                <tr>
                    <td>感想</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['feedback'];?>
</td>
                </tr>
                <tr>
                    <td>授業の難易度</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['difficulty'];?>
</td>
                </tr>
                <tr>
                    <td>授業の充実度</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['result']->value['interesting'];?>
</td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</body>

</html><?php }
}
