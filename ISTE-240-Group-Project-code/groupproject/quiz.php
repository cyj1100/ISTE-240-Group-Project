<?php
require_once "database.php";
$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Center | Rain World Guide</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>

<!-- =========================
     Navigation / Header
========================= -->
<header>
    <nav class="navbar">
        <h1 class="logo">Rain World Guide</h1>

        <!-- Navigation Links -->
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="regions.php">Regions</a></li>
            <li><a href="creatures.php">Creatures</a></li>
            <li><a href="scavenger.php">Scavengers</a></li>
            <li><a href="survival.php">Survival Systems</a></li>
            <li><a href="quiz.php">Quiz</a></li>
            <li><a href="dashboard.php">Saved Data</a></li>
            <li>
                <a href="<?php echo $loggedIn ? 'logout.php' : 'login.php'; ?>">
                    <?php echo $loggedIn ? 'Logout' : 'Login'; ?>
                </a>
            </li>
        </ul>
    </nav>
</header>

<!-- =========================
     Background Audio
========================= -->
<audio id="bg-audio" loop preload="auto">
    <source src="assets/audios/rain.MP3" type="audio/mpeg">
</audio>

<!-- Audio Toggle Button -->
<button id="audio-toggle" class="audio-btn">🔊 Sound On</button>

<!-- =========================
     Page Header
========================= -->
<section class="page-header">
    <h2>Quiz Center</h2>
    <p>Test your knowledge of survival mechanics.</p>
</section>

<!-- =========================
     Quiz Section
========================= -->
<section id="quiz-container" class="quiz-box">

    <!-- Question -->
    <h3 id="question"></h3>

    <!-- Answer Options -->
    <div class="options">
        <button class="option-btn" onclick="selectAnswer(0)"></button>
        <button class="option-btn" onclick="selectAnswer(1)"></button>
        <button class="option-btn" onclick="selectAnswer(2)"></button>
        <button class="option-btn" onclick="selectAnswer(3)"></button>
    </div>

</section>

<!-- =========================
     JavaScript
========================= -->
<script src="assets/js/main.js"></script>

</body>
</html>