<?php
require_once "database.php";
$loggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regions | Rain World Guide</title>
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
     Page Header
========================= -->
<section class="page-header">
    <h2>Regions</h2>
    <p>Explore environments, hazards, and traversal tips.</p>
</section>

<!-- =========================
     Regions Container
========================= -->
<section class="regions-container">

    <!-- =========================
         Region: Industrial Complex
    ========================== -->
    <div class="region-card">
        <h3>Industrial Complex</h3>
        <img src="assets/images/industrial.png" alt="Industrial Complex map">

        <p>
            A vertical, machinery-filled region that introduces players to complex traversal 
            and frequent predator encounters.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Vertical navigation with poles and pipes</li>
            <li>Multiple branching paths</li>
            <li>Dense predator population</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Stay above ground when possible</li>
            <li>Memorize shelter locations</li>
        </ul>

        <button onclick="saveRegion('Industrial Complex')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Drainage System
    ========================== -->
    <div class="region-card">
        <h3>Drainage System</h3>
        <img src="assets/images/drainage.png" alt="Drainage System">

        <p>
            A water-heavy region requiring strong swimming skills and oxygen management.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Underwater tunnels</li>
            <li>Limited air pockets</li>
            <li>Maze-like layout</li>
        </ul>

        <h4>Hazards</h4>
        <ul>
            <li>Drowning risk</li>
            <li>Ambush predators in water</li>
        </ul>

        <button onclick="saveRegion('Drainage System')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Chimney Canopy
    ========================== -->
    <div class="region-card">
        <h3>Chimney Canopy</h3>
        <img src="assets/images/chimney.png" alt="Chimney Canopy">

        <p>
            A high-altitude region focused on precision platforming and vertical danger.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Extreme verticality</li>
            <li>Narrow platforms</li>
            <li>Wind hazards</li>
        </ul>

        <button onclick="saveRegion('Chimney Canopy')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Outskirts
    ========================== -->
    <div class="region-card">
        <h3>Outskirts</h3>
        <img src="assets/images/outskirts.png" alt="Outskirts">

        <p>
            The starting region for most players, Outskirts introduces basic movement, 
            shelter mechanics, and early predator encounters.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★☆☆☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Beginner-friendly layout</li>
            <li>Multiple shelter locations</li>
            <li>Open exploration paths</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Practice jumping and climbing</li>
            <li>Learn the rain cycle timing</li>
        </ul>

        <button onclick="saveRegion('Outskirts')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Garbage Wastes
    ========================== -->
    <div class="region-card">
        <h3>Garbage Wastes</h3>
        <img src="assets/images/garbage.png" alt="Garbage Wastes">

        <p>
            A polluted region filled with toxic pools and dangerous creatures lurking 
            beneath the surface.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★☆☆</span>
        </p>

        <h4>Hazards</h4>
        <ul>
            <li>Toxic water slows movement</li>
            <li>Hidden predators</li>
            <li>Limited safe footing</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Stay on solid platforms</li>
            <li>Move quickly through dangerous areas</li>
        </ul>

        <button onclick="saveRegion('Garbage Wastes')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Shoreline
    ========================== -->
    <div class="region-card">
        <h3>Shoreline</h3>
        <img src="assets/images/shoreline.png" alt="Shoreline">

        <p>
            A coastal region blending land and water traversal, with a calmer atmosphere 
            but hidden dangers.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★☆☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Large bodies of water</li>
            <li>Open exploration areas</li>
            <li>Important story locations</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Master swimming mechanics</li>
            <li>Watch for underwater threats</li>
        </ul>

        <button onclick="saveRegion('Shoreline')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Shaded Citadel
    ========================== -->
    <div class="region-card">
        <h3>Shaded Citadel</h3>
        <img src="assets/images/shaded.png" alt="Shaded Citadel">

        <p>
            A dark and oppressive region where visibility is limited and navigation 
            becomes extremely difficult.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★★☆</span>
        </p>

        <h4>Hazards</h4>
        <ul>
            <li>Near-total darkness</li>
            <li>Ambush predators</li>
            <li>Confusing layout</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Use light sources if available</li>
            <li>Move slowly and listen for danger</li>
        </ul>

        <button onclick="saveRegion('Shaded Citadel')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: The Exterior
    ========================== -->
    <div class="region-card">
        <h3>The Exterior</h3>
        <img src="assets/images/exterior.png" alt="The Exterior">

        <p>
            Massive structures and long climbs define this region, requiring endurance 
            and precise movement.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★★☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Long vertical climbs</li>
            <li>Exposure to weather</li>
            <li>Few shelters</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Plan routes carefully</li>
            <li>Don’t rush difficult jumps</li>
        </ul>

        <button onclick="saveRegion('The Exterior')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Five Pebbles
    ========================== -->
    <div class="region-card">
        <h3>Five Pebbles</h3>
        <img src="assets/images/fivepebbles.png" alt="Five Pebbles">

        <p>
            A mysterious and technologically advanced region filled with zero-gravity 
            mechanics and narrative significance.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★★★</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Zero gravity movement</li>
            <li>Unique environment</li>
            <li>Story progression</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Control momentum carefully</li>
            <li>Stay oriented to avoid getting lost</li>
        </ul>

        <button onclick="saveRegion('Five Pebbles')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Sky Islands
    ========================== -->
    <div class="region-card">
        <h3>Sky Islands</h3>
        <img src="assets/images/skyislands.png" alt="Sky Islands">

        <p>
            Floating platforms suspended in the sky, requiring precise jumps and timing.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★★☆</span>
        </p>

        <h4>Hazards</h4>
        <ul>
            <li>Falling to death</li>
            <li>Strong winds</li>
            <li>Narrow platforms</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Time jumps carefully</li>
            <li>Stay calm during platforming</li>
        </ul>

        <button onclick="saveRegion('Sky Islands')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Farm Arrays
    ========================== -->
    <div class="region-card">
        <h3>Farm Arrays</h3>
        <img src="assets/images/farmarrays.png" alt="Farm Arrays">

        <p>
            Open fields with unique hazards and environmental challenges.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★☆☆</span>
        </p>

        <h4>Key Features</h4>
        <ul>
            <li>Wide open spaces</li>
            <li>Environmental hazards</li>
            <li>Limited cover</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Stay aware of surroundings</li>
            <li>Use terrain to avoid predators</li>
        </ul>

        <button onclick="saveRegion('Farm Arrays')" class="btn">Save Region</button>
    </div>

    <!-- =========================
         Region: Subterranean
    ========================== -->
    <div class="region-card">
        <h3>Subterranean</h3>
        <img src="assets/images/subterranean.png" alt="Subterranean">

        <p>
            The deepest region, filled with darkness, danger, and endgame challenges.
        </p>

        <p class="difficulty">
            Difficulty: <span class="stars">★★★★★</span>
        </p>

        <h4>Hazards</h4>
        <ul>
            <li>Extreme darkness</li>
            <li>High-level predators</li>
            <li>Complex navigation</li>
        </ul>

        <h4>Traversal Tips</h4>
        <ul>
            <li>Prepare before entering</li>
            <li>Memorize paths carefully</li>
        </ul>

        <button onclick="saveRegion('Subterranean')" class="btn">Save Region</button>
    </div>

</section>

<!-- =========================
     Image Lightbox
========================= -->
<div id="lightbox" class="lightbox">
    <span id="lightbox-close">&times;</span>
    <img id="lightbox-img" src="" alt="Expanded view">
</div>

<!-- =========================
     Background Audio + Toggle
========================= -->
<audio id="bg-audio" loop>
    <source src="assets/audios/rain.MP3" type="audio/mpeg">
</audio>

<button id="audio-toggle" class="audio-btn">🔊 Sound On</button>

<!-- =========================
     JavaScript
========================= -->
<script src="assets/js/main.js"></script>

</body>
</html>