<?php
require_once "database.php";

if (!isset($_SESSION['user_id'])) {
    echo "You must log in to save data.";
    exit();
}

if (!empty($_POST['quiz_name']) && isset($_POST['score'])) {
    $user_id = $_SESSION['user_id'];
    $quiz_name = $_POST['quiz_name'];
    $score = (int)$_POST['score'];

    $check = $mysqli->prepare("SELECT id FROM quiz_scores WHERE user_id = ? AND quiz_name = ?");
    $check->bind_param("is", $user_id, $quiz_name);
    $check->execute();
    $check->store_result();

    if ($check->num_rows == 0) {
        $stmt = $mysqli->prepare("INSERT INTO quiz_scores (user_id, quiz_name, score) VALUES (?, ?, ?)");
        $stmt->bind_param("isi", $user_id, $quiz_name, $score);
    } else {
        $stmt = $mysqli->prepare("UPDATE quiz_scores SET score = ? WHERE user_id = ? AND quiz_name = ?");
        $stmt->bind_param("iis", $score, $user_id, $quiz_name);
    }

    $stmt->execute();
    $stmt->close();
    $check->close();

    echo "Quiz score saved successfully!";
}
?>