<?php
// データベース接続情報
include 'smarty.php';
include 'db.php';

if ($_POST) {
    // ユーザーが入力した検索ワード
    $searchClass = isset($_POST['search-class']) ? "%" . $_POST['search-class'] . "%" : '';
    $searchTeacher = isset($_POST['search-teacher']) ? "%" . $_POST['search-teacher'] . "%" : '';
    $searchYear = isset($_POST['search-year']) ? "%" . $_POST['search-year'] . "%" : '';



    // データベースから部分一致検索を行う
    $sql = "SELECT * FROM class_evaluation WHERE class LIKE :class AND teacher LIKE :teacher AND year LIKE :year";
    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':class' => $searchClass,
        ':teacher' => $searchTeacher,
        ':year' => $searchYear
    ]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $postCount = count($result);

    // '%' を削除する
    $searchClass = rtrim(ltrim($searchClass, '%'), '%');

    // Smartyを使用してresult.htmlに結果を表示
    if (empty($result)) {
        // 該当する検索結果がない場合の処理
        $smarty->assign('msg', '授業評価が存在しませんでした。');
        $smarty->display('search.html');
        exit;
    } else {
        // search-classが指定されている場合にのみ平均点を計算する
        if (!empty($searchClass)) {
            $sql_avg = "SELECT ROUND(AVG(exam_difficulty), 2) AS exam_difficulty_avg, 
                                    ROUND(AVG(report_difficulty), 2) AS report_difficulty_avg,
                                    ROUND(AVG(difficulty), 2) AS difficulty_avg, 
                                    ROUND(AVG(interesting), 2) AS interesting_avg 
                            FROM class_evaluation 
                            WHERE class LIKE :class AND teacher LIKE :teacher AND year LIKE :year";
            $stmt_avg = $pdo->prepare($sql_avg);

            $stmt_avg->execute([
                ':class' => $searchClass,
                ':teacher' => $searchTeacher,
                ':year' => $searchYear
            ]);
            $average_result = $stmt_avg->fetch(PDO::FETCH_ASSOC);

            // 平均点を変数に代入する
            $eScore = $average_result['exam_difficulty_avg'];
            $rScore = $average_result['report_difficulty_avg'];
            $dScore = $average_result['difficulty_avg'];
            $iScore = $average_result['interesting_avg'];

            // データベース接続を閉じる
            include 'dbEnd.php';
            $smarty->assign('class', $searchClass);
            $smarty->assign('results', $result);
            $smarty->assign('postCount', $postCount);
            $smarty->assign('eScore', $eScore); // 平均点をSmartyに割り当てる
            $smarty->assign('rScore', $rScore);
            $smarty->assign('dScore', $dScore);
            $smarty->assign('iScore', $iScore);
            $smarty->display('result.html');
        } else {
            $sql_teacher_classes = "SELECT DISTINCT class FROM class_evaluation WHERE teacher LIKE :teacher";
            $stmt_teacher_classes = $pdo->prepare($sql_teacher_classes);
            $stmt_teacher_classes->execute([':teacher' => $searchTeacher]);
            $teacher_classes = $stmt_teacher_classes->fetchAll(PDO::FETCH_COLUMN);

            $searchTeacher = rtrim(ltrim($searchTeacher, '%'), '%');
            $smarty->assign('teacher', $searchTeacher);
            $smarty->assign('teacher_classes', $teacher_classes);
            $smarty->assign('results', $result);
            $smarty->display('result2.html');
        }

    }
} else {
    // POSTデータがない場合は何らかのエラー処理を行うか、リダイレクトなどを検討する
    $smarty->display('search.html');
}
?>