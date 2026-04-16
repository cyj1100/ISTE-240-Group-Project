<?php
require_once "database.php";
$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Data | Rain World Guide</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

<!-- =========================
     Navigation / Header
========================= -->
<header>
    <nav class="navbar">
        <h1 class="logo">Rain World Guide</h1>

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
     Page Header
========================= -->
<section class="page-header">
    <h2>Your Saved Data</h2>
</section>

<!-- =========================
     Login Notice
========================= -->
<?php if (!$loggedIn): ?>
    <div class="login-notice">
        You are not logged in. Your saved data will not be stored unless you
        <a href="login.php" style="color:#4CAF50;">log in</a>.
    </div>
<?php endif; ?>

<!-- =========================
     Dashboard / Saved Data
========================= -->
<section class="dashboard">

    <!-- Saved Regions -->
    <div class="dashboard-card">
        <h3>Saved Regions</h3>
        <ul>
            <?php
            if ($loggedIn) {
                $stmt = $mysqli->prepare("SELECT region_name FROM saved_regions WHERE user_id = ?");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row['region_name']) . "</li>";
                    }
                } else {
                    echo "<li style='color:#777;'>Nothing saved yet</li>";
                }

                $stmt->close();
            } else {
                echo "<li style='color:#777;'>Log in to view saved regions</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Saved Creatures -->
    <div class="dashboard-card">
        <h3>Saved Creatures</h3>
        <ul>
            <?php
            if ($loggedIn) {
                $stmt = $mysqli->prepare("SELECT creature_name FROM saved_creatures WHERE user_id = ?");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row['creature_name']) . "</li>";
                    }
                } else {
                    echo "<li style='color:#777;'>Nothing saved yet</li>";
                }

                $stmt->close();
            } else {
                echo "<li style='color:#777;'>Log in to view saved creatures</li>";
            }
            ?>
        </ul>
    </div>

    <!-- Quiz Scores -->
    <div class="dashboard-card">
        <h3>Quiz Scores</h3>
        <ul>
            <?php
            if ($loggedIn) {
                $stmt = $mysqli->prepare("SELECT quiz_name, score FROM quiz_scores WHERE user_id = ?");
                $stmt->bind_param("i", $_SESSION['user_id']);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($row['quiz_name']) . ": " . htmlspecialchars($row['score']) . "</li>";
                    }
                } else {
                    echo "<li style='color:#777;'>No scores yet</li>";
                }

                $stmt->close();
            } else {
                echo "<li style='color:#777;'>Log in to view quiz scores</li>";
            }
            ?>
        </ul>
    </div>

</section>

<!-- =========================
     Background Audio
========================= -->
<audio id="bg-audio" loop preload="auto">
    <source src="assets/audios/rain.MP3" type="audio/mpeg">
</audio>

<button id="audio-toggle" class="audio-btn">🔊 Sound On</button>

<!-- =========================
     JavaScript
========================= -->
<script src="assets/js/main.js"></script>

</body>
</html>