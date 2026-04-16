const links = document.querySelectorAll(".nav-links a");

links.forEach(link => {
    if (link.href === window.location.href) {
        link.classList.add("active");
    }
});

/* =========================
   LOCAL STORAGE SETUP
========================= */

function initStorage() {
    if (!localStorage.getItem("rainworldData")) {
        const data = {
            savedRegions: [],
            savedCreatures: [],
            quizScores: {},
            progress: {
                regionsViewed: 0,
                creaturesViewed: 0,
                quizzesCompleted: 0
            }
        };
        localStorage.setItem("rainworldData", JSON.stringify(data));
    }
}

function getData() {
    return JSON.parse(localStorage.getItem("rainworldData"));
}

function saveData(data) {
    localStorage.setItem("rainworldData", JSON.stringify(data));
}

/* =========================
   TOAST NOTIFICATION
========================= */
function showToast(msg) {
    const toast = document.createElement("div");
    toast.innerText = msg;
    toast.style.position = "fixed";
    toast.style.bottom = "20px";
    toast.style.left = "50%";
    toast.style.transform = "translateX(-50%)";
    toast.style.background = "#4CAF50";
    toast.style.color = "white";
    toast.style.padding = "12px 24px";
    toast.style.borderRadius = "8px";
    toast.style.boxShadow = "0 2px 10px rgba(0,0,0,0.3)";
    toast.style.zIndex = 1000;
    toast.style.opacity = 0;
    toast.style.transition = "opacity 0.3s ease";
    document.body.appendChild(toast);

    setTimeout(() => { toast.style.opacity = 1; }, 50);
    setTimeout(() => {
        toast.style.opacity = 0;
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

/* =========================
   SAVE FUNCTIONS
========================= */
// function saveRegion(regionName) {
//     const data = getData();
//     if (!data.savedRegions.includes(regionName)) {
//         data.savedRegions.push(regionName);
//         data.progress.regionsViewed++;
//         saveData(data);
//         showToast(regionName + " saved successfully!");
//         loadDashboard(); // update dashboard in real-time if open
//     }
// }

async function saveRegion(regionName) {
    const response = await fetch("save_region.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "region_name=" + encodeURIComponent(regionName)
    });

    const result = await response.text();
    showToast(result);
}

// function saveCreature(creatureName) {
//     const data = getData();
//     if (!data.savedCreatures.includes(creatureName)) {
//         data.savedCreatures.push(creatureName);
//         data.progress.creaturesViewed++;
//         saveData(data);
//         showToast(creatureName + " saved successfully!");
//         loadDashboard(); // update dashboard in real-time if open
//     }
// }

async function saveCreature(creatureName) {
    const response = await fetch("save_creature.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "creature_name=" + encodeURIComponent(creatureName)
    });

    const result = await response.text();
    showToast(result);
}

/* =========================
   QUIZ SYSTEM
========================= */
let currentQuestion = 0;
let score = 0;

const sampleQuiz = [
    { question: "What must you do before the rain cycle ends?", options: ["Find shelter", "Fight enemies", "Collect weapons", "Climb higher"], answer: 0 },
    { question: "What is the main purpose of food?", options: ["Increase speed", "Unlock areas", "Enable hibernation", "Fight enemies"], answer: 2 },
    { question: "Which creature is a predator?", options: ["Batfly", "Lizard", "Slugcat", "Neuron"], answer: 1 },
    { question: "What happens if you don't reach shelter in time?", options: ["You lose points", "Nothing", "You die", "You restart level"], answer: 2 },
    { question: "Which region is dark and requires awareness of light?", options: ["Industrial Complex", "Drainage System", "Shaded Citadel", "Sky Islands"], answer: 2 },
    { question: "What helps you escape predators?", options: ["Standing still", "Using pipes", "Dropping items", "Sleeping"], answer: 1 },
    { question: "What type of creature is a Batfly?", options: ["Predator", "Neutral", "Prey", "Boss"], answer: 2 },
    { question: "What defines the pace of gameplay?", options: ["Enemies", "Rain cycle", "Score", "Map size"], answer: 1 },
    { question: "What should you memorize in each region?", options: ["Enemy names", "Shelter locations", "Colors", "Music"], answer: 1 },
    { question: "What is the safest strategy?", options: ["Rush forward", "Avoid planning", "Plan routes ahead", "Ignore hazards"], answer: 2 }
];

function loadQuestion() {
    const q = sampleQuiz[currentQuestion];
    const questionEl = document.getElementById("question");
    const buttons = document.querySelectorAll(".option-btn");

    if (!questionEl || !buttons.length) return;

    questionEl.innerText = q.question;
    buttons.forEach((btn, i) => {
        btn.innerText = q.options[i];
        btn.disabled = false;
        btn.style.backgroundColor = "white";
        btn.style.color = "black";
    });
}

function selectAnswer(index) {
    const correct = sampleQuiz[currentQuestion].answer;
    const buttons = document.querySelectorAll(".option-btn");

    buttons.forEach((btn, i) => {
        btn.disabled = true;
        if (i === correct) { btn.style.backgroundColor = "#4CAF50"; btn.style.color = "white"; }
        else if (i === index) { btn.style.backgroundColor = "#E53935"; btn.style.color = "white"; }
    });

    if (index === correct) score++;

    setTimeout(() => {
        currentQuestion++;
        if (currentQuestion < sampleQuiz.length) loadQuestion();
        else finishQuiz();
    }, 1000);
}

// function finishQuiz() {
//     const container = document.getElementById("quiz-container");
//     if (!container) return;

//     container.innerHTML = `
//         <h3>You scored ${score} / ${sampleQuiz.length}</h3>
//         <button class="btn" onclick="restartQuiz()">Try Again</button>
//     `;

//     const data = getData();
//     data.quizScores["Survival Quiz"] = score;
//     saveData(data);
//     loadDashboard();
// }

async function finishQuiz() {
    const container = document.getElementById("quiz-container");
    if (!container) return;

    container.innerHTML = `
        <h3>You scored ${score} / ${sampleQuiz.length}</h3>
        <button class="btn" onclick="restartQuiz()">Try Again</button>
    `;

    const response = await fetch("save_quiz.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: "quiz_name=" + encodeURIComponent("Survival Quiz") + "&score=" + encodeURIComponent(score)
    });

    const result = await response.text();
    showToast(result);
}

function restartQuiz() {
    currentQuestion = 0;
    score = 0;

    const container = document.getElementById("quiz-container");
    if (!container) return;

    container.innerHTML = `
        <h3 id="question"></h3>
        <div class="options">
            <button class="option-btn" onclick="selectAnswer(0)"></button>
            <button class="option-btn" onclick="selectAnswer(1)"></button>
            <button class="option-btn" onclick="selectAnswer(2)"></button>
            <button class="option-btn" onclick="selectAnswer(3)"></button>
        </div>
    `;
    loadQuestion();
}

/* =========================
   DASHBOARD DISPLAY
========================= */
function loadDashboard() {
    const data = getData();
    const regionList = document.getElementById("saved-regions");
    const creatureList = document.getElementById("saved-creatures");
    const scores = document.getElementById("quiz-scores");

    if (regionList) regionList.innerHTML = data.savedRegions.length ? data.savedRegions.map(r => `<li>${r}</li>`).join("") : "<li style='color:#777;'>Nothing saved yet</li>";
    if (creatureList) creatureList.innerHTML = data.savedCreatures.length ? data.savedCreatures.map(c => `<li>${c}</li>`).join("") : "<li style='color:#777;'>Nothing saved yet</li>";
    if (scores) scores.innerHTML = Object.entries(data.quizScores).length ? Object.entries(data.quizScores).map(([quiz, score]) => `<li>${quiz}: ${score}</li>`).join("") : "<li style='color:#777;'>No scores yet</li>";
}

/* =========================
   RESET DATA
========================= */
function resetData() {
    localStorage.removeItem("rainworldData");
    initStorage();
    showToast("All data reset!");
    loadDashboard();
}

/* =========================
   PAGE VISIT & PROGRESS
========================= */
function markVisited(page) {
    let visited = JSON.parse(localStorage.getItem("visited")) || [];
    if (!visited.includes(page)) {
        visited.push(page);
        localStorage.setItem("visited", JSON.stringify(visited));
    }
}

function detectPage() {
    const path = window.location.pathname;
    if (path.includes("regions")) markVisited("regions");
    if (path.includes("creatures")) markVisited("creatures");
    if (path.includes("survival")) markVisited("survival");
}

function loadProgress() {
    const visited = JSON.parse(localStorage.getItem("visited")) || [];
    const progressEl = document.getElementById("progress-text");
    if (progressEl) progressEl.innerText = `Pages visited: ${visited.length}/3`;
}

/* =========================
   BACKGROUND AUDIO
========================= */
function setupAudio() {
    const audio = document.getElementById("bg-audio");
    const audioBtn = document.getElementById("audio-toggle");
    if (!audio || !audioBtn) return;

    let isPlaying = false;
    audioBtn.addEventListener("click", () => {
        if (!isPlaying) {
            audio.volume = 0.4;
            audio.play();
            audioBtn.textContent = "🔇 Sound Off";
            isPlaying = true;
        } else {
            audio.pause();
            audioBtn.textContent = "🔊 Sound On";
            isPlaying = false;
        }
    });
}

/* =========================
   INITIALIZE EVERYTHING
========================= */
document.addEventListener("DOMContentLoaded", () => {
    initStorage();
    loadDashboard();
    setupAudio();
    detectPage();
    loadProgress();

    if (document.getElementById("quiz-container")) loadQuestion();

    setupLightbox()
});

// Make save functions global for inline buttons
window.saveRegion = saveRegion;
window.saveCreature = saveCreature;
window.resetData = resetData;
window.selectAnswer = selectAnswer;
window.restartQuiz = restartQuiz;

function setupLightbox() {
    const images = document.querySelectorAll(".region-card img, .creature-card img");
    const lightbox = document.getElementById("lightbox");
    const lightboxImg = document.getElementById("lightbox-img");
    const closeBtn = document.getElementById("lightbox-close");

    images.forEach(img => {
        img.addEventListener("click", () => {
            lightbox.style.display = "flex";
            lightboxImg.src = img.src;
        });
    });

    closeBtn.addEventListener("click", () => {
        lightbox.style.display = "none";
    });

    // Close when clicking outside image
    lightbox.addEventListener("click", (e) => {
        if (e.target !== lightboxImg) {
            lightbox.style.display = "none";
        }
    });
}