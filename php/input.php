<?php
include 'smarty.php';
include 'db.php';
include 'logInCheck.php';

if ($_POST) {
    try {

        // insert
        $stmt = $pdo->prepare('INSERT INTO class_evaluation (user_id, name, class, teacher, year, semester, attendance, exam, exam_difficulty, report, report_difficulty, feedback, difficulty, interesting) VALUES (:user_id, :name, :class, :teacher, :year, :semester, :attendance, :exam, :exam_difficulty, :report, :report_difficulty, :feedback, :difficulty, :interesting)');
        $stmt->execute(
            array(
                ':user_id' => $s_user_id,
                ':name' => $s_name,
                ':class' => $_POST['Class'],
                ':teacher' => $_POST['Teacher'],
                ':year' => $_POST['Year'],
                ':semester' => $_POST['Semester'],
                ':attendance' => $_POST['Attendance'],
                ':exam' => $_POST['Exam'],
                ':exam_difficulty' => $_POST['Exam_difficulty'],
                ':report' => $_POST['Report'],
                ':report_difficulty' => $_POST['Report_difficulty'],
                ':feedback' => $_POST['Feedback'],
                ':difficulty' => $_POST['Difficulty'],
                ':interesting' => $_POST['Interesting']
            )
        );

    } catch (Exception $e) {
        $msg = $e->getMessage(); // エラーメッセージを表示
        echo $msg; // デバッグ用にエラーメッセージを表示
    }

    $smarty->assign('msg', '正常に入力されました'); // Assign the message to Smarty variable
    $smarty->display('input.html');
} else {
    $smarty->display('input.html');
}

include 'dbEnd.php';

?>