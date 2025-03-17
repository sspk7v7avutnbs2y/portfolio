<?php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

if ($_POST) {
    $post_id = $_POST['post_id'];
    $src = $_POST['src'];
    $class = $_POST['class'];

    // データベースから該当のデータを取得
    $selectSql = "SELECT * FROM class_evaluation WHERE post_id = :post_id";
    $selectStmt = $pdo->prepare($selectSql);
    $selectStmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
    $selectStmt->execute();
    $selectedData = $selectStmt->fetch(PDO::FETCH_ASSOC);

    // データが取得できた場合、それを元に入力欄のデフォルト値を設定
    if ($selectedData) {
        $smarty->assign('selectedData', $selectedData);
    }

    if ($src == 'update') {
        try {
            // フォームからのデータを取得
            $teacher = $_POST['Teacher'];
            $year = $_POST['Year'];
            $semester = $_POST['Semester'];
            $attendance = $_POST['Attendance'];
            $exam = $_POST['Exam'];
            $exam_difficulty = $_POST['Exam_difficulty'];
            $report = $_POST['Report'];
            $report_difficulty = $_POST['Report_difficulty'];
            $feedback = $_POST['Feedback'];
            $difficulty = $_POST['Difficulty'];
            $interesting = $_POST['Interesting'];

            // データベースの更新処理
            $updateSql = "UPDATE class_evaluation 
                          SET teacher = :teacher, year = :year, semester = :semester, attendance = :attendance,
                              exam = :exam, exam_difficulty = :exam_difficulty, report = :report,
                              report_difficulty = :report_difficulty, feedback = :feedback, 
                              difficulty = :difficulty, interesting = :interesting
                          WHERE post_id = :post_id";
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->bindParam(':teacher', $teacher, PDO::PARAM_STR);
            $updateStmt->bindParam(':year', $year, PDO::PARAM_INT);
            $updateStmt->bindParam(':semester', $semester, PDO::PARAM_STR);
            $updateStmt->bindParam(':attendance', $attendance, PDO::PARAM_STR);
            $updateStmt->bindParam(':exam', $exam, PDO::PARAM_STR);
            $updateStmt->bindParam(':exam_difficulty', $exam_difficulty, PDO::PARAM_INT);
            $updateStmt->bindParam(':report', $report, PDO::PARAM_STR);
            $updateStmt->bindParam(':report_difficulty', $report_difficulty, PDO::PARAM_INT);
            $updateStmt->bindParam(':feedback', $feedback, PDO::PARAM_STR);
            $updateStmt->bindParam(':difficulty', $difficulty, PDO::PARAM_INT);
            $updateStmt->bindParam(':interesting', $interesting, PDO::PARAM_INT);
            $updateStmt->bindParam(':post_id', $post_id, PDO::PARAM_INT);
            $updateStmt->execute();

        } catch (Exception $e) {
            $message = '入力に失敗しました'; // エラーメッセージ
            echo $e->getMessage() . PHP_EOL;
        }

        $smarty->assign('msg', '修正が完了しました。');
        $smarty->assign('class', $class);
        $smarty->assign('post_id', $post_id);
        $smarty->display('update.html');

    } else if ($src == 'archive') {
        $smarty->assign('class', $class);
        $smarty->assign('post_id', $post_id);
        $smarty->display('update.html');
    }
} else {
    // post_idが指定されていない場合の処理
    echo "post_idが指定されていません";
}

include 'dbEnd.php';
?>
