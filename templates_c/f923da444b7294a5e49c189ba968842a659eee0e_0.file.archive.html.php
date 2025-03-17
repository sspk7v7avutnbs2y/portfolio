<?php
/* Smarty version 4.3.2, created on 2024-02-05 10:30:00
  from '/var/www/html/projectEx/html/archive.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.2',
  'unifunc' => 'content_65c03a18050f75_81264754',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f923da444b7294a5e49c189ba968842a659eee0e' => 
    array (
      0 => '/var/www/html/projectEx/html/archive.html',
      1 => 1707096582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65c03a18050f75_81264754 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>授業検索</title>
    <style>
        th {
            white-space: nowrap;
            padding: 10px;
            border-bottom: 2px solid #007bff;
        }

        /* 修正：tdのスタイルを変更 */
        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            word-break: break-all;
            /* 文字列がボックス外にはみ出しても折り返すようにする */
        }

        /* 新しく追加 */
        .post-container {
            border: 2px solid #007bff;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 10px;
            overflow-x: auto;
            /* 横スクロールを有効にするために追加 */
            position: relative;
            /* 相対位置指定 */
        }

        /* 新しく追加 */
        .edit-button {
            position: absolute;
            /* 絶対位置指定 */
            top: 10px;
            /* 上からの位置 */
            right: 10px;
            /* 右からの位置 */
        }
    </style>
</head>

<body>
    <p><a href="../php/user.php">ユーザー画面トップへ</a></p>
    
    <?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['results']->value, 'result');
$_smarty_tpl->tpl_vars['result']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['result']->value) {
$_smarty_tpl->tpl_vars['result']->do_else = false;
?>
    <!-- 四角で囲む -->
    <div class="post-container">
        <!-- 情報変更ボタン -->
        <form action="../php/update.php" method="POST">
            <input type="submit" value="授業評価変更">
            <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['post_id'];?>
">
            <input type="hidden" name="src" value="archive">
            <input type="hidden" name="class" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['class'];?>
">
        </form>
        
        <form action="../php/delete.php" method="POST" class="deleteForm">
            <input type="submit" value="削除">
            <input type="hidden" name="post_id" value="<?php echo $_smarty_tpl->tpl_vars['result']->value['post_id'];?>
">
        </form>
        <!-- 投稿IDの表示を変更 -->
        <h2>投稿ID <?php echo $_smarty_tpl->tpl_vars['result']->value['post_id'];?>
</h2>

        <table>
            <tbody id="archive-results">
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

    <?php echo '<script'; ?>
>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.deleteForm'); // 削除フォームを取得する
    
            // 各削除フォームに対してイベントリスナーを設定
            deleteForms.forEach(function (deleteForm) {
                deleteForm.addEventListener('submit', function (event) {
                    // ユーザー削除の確認ダイアログ
                    const confirmed = confirm('本当に削除しますか？');
                    if (!confirmed) {
                        // キャンセルされた場合、submitイベントを止める
                        event.preventDefault();
                    }
                });
            });
        });
    <?php echo '</script'; ?>
>
    

</body>

</html>
<?php }
}
