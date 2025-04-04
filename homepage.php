<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f8ff, #e6f7ff);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .button-container {
            display: flex;
            gap: 40px;
            margin-bottom: 20px;
        }
        .button {
            position: relative;
            width: 140px;
            height: 140px;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-decoration: none;
            transition: transform 0.3s ease-in-out;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .button img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease-in-out;
        }
        .button:hover img {
            transform: scale(1.1);
        }
        .button:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }
        .button-label {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="button-container">
        <!-- Elder Button -->
        <div style="text-align: center;">
            <a href="elder_dashboard.php" class="button">
                <img src="https://cdn.pixabay.com/photo/2023/10/01/06/16/ai-generated-8286877_960_720.jpg" alt="Elder">
            </a>
            <div class="button-label">Elder</div>
        </div>
        <!-- Caregiver Button -->
        <div style="text-align: center;">
            <a href="caregiver_dashboard.php" class="button">
                <img src="https://tse3.mm.bing.net/th?id=OIP.ILZNmaD0cZeG99PGSzQNmQHaHX&pid=Api&P=0&h=180" alt="Caregiver">
            </a>
            <div class="button-label">Caregiver</div>
        </div>
    </div>

    <script>
        // Check if browser supports Web Speech API
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const SpeechSynthesis = window.speechSynthesis;

        if (!SpeechRecognition || !SpeechSynthesis) {
            alert("Your browser does not support speech recognition or synthesis. Please use Chrome or Edge.");
        } else {
            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.lang = "en-US";

            recognition.onresult = function (event) {
                const command = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                console.log("Recognized Command: ", command);

                if (command.includes("elder")) {
                    speak("Navigating to Elder Dashboard.");
                    setTimeout(() => { window.location.href = "elder_dashboard.php"; }, 1500);
                } else if (command.includes("caregiver")) {
                    speak("Navigating to Caregiver Dashboard.");
                    setTimeout(() => { window.location.href = "caregiver_dashboard.php"; }, 1500);
                } else {
                    speak("Sorry, I did not understand that command.");
                }
            };

            function speak(text) {
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = "en-US";
                utterance.rate = 1;
                SpeechSynthesis.speak(utterance);
            }

            function startVoiceAssistant() {
                recognition.start();
                console.log("Voice assistant is now listening...");
            }

            // Start voice assistant automatically when page loads
            window.onload = function () {
                startVoiceAssistant();
            };
        }
    </script>

</body>
</html>
