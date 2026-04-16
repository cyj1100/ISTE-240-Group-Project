<?php
require_once "database.php";
$loggedIn = isset($_SESSION['user_id']);
$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['uname']) && !empty($_POST['pass'])) {
        $uname = $_POST['uname'];
        $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $check = $mysqli->prepare("SELECT id FROM users WHERE uname = ?");
        $check->bind_param("s", $uname);
        $check->execute();
        $check->store_result();

        if ($check->num_rows > 0) {
            $error = "That username is already taken.";
        } else {
            $stmt = $mysqli->prepare("INSERT INTO users (uname, pass) VALUES (?, ?)");
            $stmt->bind_param("ss", $uname, $pass);

            if ($stmt->execute()) {
                $success = "Registration successful! You can now log in.";
            } else {
                $error = "Something went wrong. Please try again.";
            }

            $stmt->close();
        }

        $check->close();
    } else {
        $error = "Please fill in both fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | Rain World Guide</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>

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

<section class="page-header">
    <h2>Create Account</h2>
    <p>Register to save your progress and track what you’ve learned.</p>
</section>

<section class="auth-wrapper">
    <div class="auth-card">
        <h3>Join the Guide</h3>

        <?php if (!empty($error)): ?>
            <p class="auth-error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <p class="auth-success"><?php echo htmlspecialchars($success); ?></p>
        <?php endif; ?>

        <form action="register.php" method="POST" class="auth-form">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="uname" required>

            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" required>

            <button type="submit" class="btn">Register</button>
        </form>

        <p class="auth-switch">
            Already have an account?
            <a href="login.php">Login here</a>
        </p>
    </div>
</section>

<audio id="bg-audio" loop preload="auto">
    <source src="assets/audios/rain.MP3" type="audio/mpeg">
</audio>

<button id="audio-toggle" class="audio-btn">🔊 Sound On</button>

<script src="assets/js/main.js"></script>
</body>
</html>