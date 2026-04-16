<?php
require_once "database.php";

if (!isset($_SESSION['user_id'])) {
    echo "You must log in to save data.";
    exit();
}

if (!empty($_POST['creature_name'])) {
    $user_id = $_SESSION['user_id'];
    $creature_name = $_POST['creature_name'];

    $check = $mysqli->prepare("SELECT id FROM saved_creatures WHERE user_id = ? AND creature_name = ?");
    $check->bind_param("is", $user_id, $creature_name);
    $check->execute();
    $check->store_result();

    if ($check->num_rows == 0) {
        $stmt = $mysqli->prepare("INSERT INTO saved_creatures (user_id, creature_name) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $creature_name);
        $stmt->execute();
        $stmt->close();
        echo "Creature saved successfully!";
    } else {
        echo "Creature already saved.";
    }

    $check->close();
}
?>