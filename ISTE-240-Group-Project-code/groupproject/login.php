<?php
require_once "database.php";
$loggedIn = isset($_SESSION['user_id']);
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty($_POST['uname']) && !empty($_POST['pass'])) {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];

        $stmt = $mysqli->prepare("SELECT id, pass FROM users WHERE uname = ?");
        $stmt->bind_param("s", $uname);
        $stmt->execute();
        $stmt->bind_result($id, $hashedPass);

        if ($stmt->fetch()) {
            if (password_verify($pass, $hashedPass)) {
                $_SESSION['user_id'] = $id;
                $_SESSION['uname'] = $uname;
                header("Location: index.php");
                exit();
            } else {
                $error = "Incorrect password.";
            }
        } else {
            $error = "Username not found.";
        }

        $stmt->close();
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
    <title>Login | Rain World Guide</title>
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
    <h2>Login</h2>
    <p>Sign in to save your regions, creatures, and quiz scores.</p>
</section>

<section class="auth-wrapper">
    <div class="auth-card">
        <h3>Welcome Back</h3>

        <?php if (!empty($error)): ?>
            <p class="auth-error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="login.php" method="POST" class="auth-form">
            <label for="uname">Username</label>
            <input type="text" id="uname" name="uname" required>

            <label for="pass">Password</label>
            <input type="password" id="pass" name="pass" required>

            <button type="submit" class="btn">Login</button>
        </form>

        <p class="auth-switch">
            Don’t have an account?
            <a href="register.php">Register here</a>
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