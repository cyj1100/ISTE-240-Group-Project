<?php
require_once "database.php";

if (!isset($_SESSION['user_id'])) {
    echo "You must log in to save data.";
    exit();
}

if (!empty($_POST['region_name'])) {
    $user_id = $_SESSION['user_id'];
    $region_name = $_POST['region_name'];

    $check = $mysqli->prepare("SELECT id FROM saved_regions WHERE user_id = ? AND region_name = ?");
    $check->bind_param("is", $user_id, $region_name);
    $check->execute();
    $check->store_result();

    if ($check->num_rows == 0) {
        $stmt = $mysqli->prepare("INSERT INTO saved_regions (user_id, region_name) VALUES (?, ?)");
        $stmt->bind_param("is", $user_id, $region_name);
        $stmt->execute();
        $stmt->close();
        echo "Region saved successfully!";
    } else {
        echo "Region already saved.";
    }

    $check->close();
}
?>