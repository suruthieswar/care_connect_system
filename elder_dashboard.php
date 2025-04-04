<?php 
// Simple test to ensure the page loads properly
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 3em;
            color: #333;
            margin-bottom: 30px;
        }
        .button-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
            justify-items: center;
            margin-top: 50px;
        }
        .dashboard-button {
            width: 180px;
            height: 180px;
            background-color: #4CAF50;
            color: white;
            border-radius: 50%;
            font-size: 1.5em;
            font-weight: bold;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            position: relative;
            overflow: hidden;
        }
        .dashboard-button:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.3);
            background-color: #45a049;
        }
        .dashboard-button img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .button-label {
            font-size: 1.2em;
            font-weight: bold;
            color: black;
            margin-top: 10px;
            text-shadow: 2px 2px 5px rgba(213, 13, 143, 0.7);
        }
    </style>
</head>
<body>

    <h1>Elder Dashboard</h1>

    <div class="button-container">
        <div style="text-align: center;">
            <a href="https://meet.jit.si/ElderCareVideoCall" target="_blank" class="dashboard-button">
                <img src="https://icon-library.com/images/video-calling-icon/video-calling-icon-14.jpg" alt="Video Call">
            </a>
            <div class="button-label">Video Call</div>
        </div>

        <div style="text-align: center;">
            <a href="index1.php" class="dashboard-button">
                <img src="https://tse1.mm.bing.net/th?id=OIP.6967QLFCevmPVWGvhecuFwHaHa&pid=Api&P=0&h=180" alt="Exercise">
            </a>
            <div class="button-label">Exercise</div>
        </div>

        <div style="text-align: center;">
            <a href="index2.html" class="dashboard-button">
                <img src="https://tse4.mm.bing.net/th?id=OIP.3qdxDFY6VSBpeJSDkOrBlgHaHa&pid=Api&P=0&h=180" alt="Entertainment">
            </a>
            <div class="button-label">Entertainment</div>
        </div>

        <div style="text-align: center;">
            <a href="pay.html" class="dashboard-button">
                <img src="https://imgk.timesnownews.com/story/1531916530-100_Rupee_new_note.jpg" alt="Payment">
            </a>
            <div class="button-label">Payment</div>
        </div>

        <div style="text-align: center;">
            <a href="help.html" class="dashboard-button">
                <img src="https://tse3.mm.bing.net/th?id=OIP.WGBXg4pKthH5I5moB3PE0gHaHa&pid=Api&P=0&h=180" alt="Help">
            </a>
            <div class="button-label">Help</div>
        </div>

        <div style="text-align: center;">
            <a href="index3.html" class="dashboard-button">
                <img src="https://cdn.dribbble.com/users/1339984/screenshots/3866712/checklist.gif" alt="Notes">
            </a>
            <div class="button-label">Notes</div>
        </div>
    </div>

    <script>
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const SpeechSynthesis = window.speechSynthesis;
        
        if (!SpeechRecognition || !SpeechSynthesis) {
            alert("Your browser does not support voice recognition. Please use Chrome or Edge.");
        } else {
            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.lang = "en-US";

            recognition.onresult = function (event) {
                const command = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                console.log("Recognized Command: ", command);

                if (command.includes("call")) {
                    speak("Opening Video Call.");
                    setTimeout(() => { window.location.href = "https://meet.jit.si/ElderCareVideoCall"; }, 1500);
                } else if (command.includes("exercise")) {
                    speak("Opening Exercise Section.");
                    setTimeout(() => { window.location.href = "index1.php"; }, 1500);
                } else if (command.includes("entertainment")) {
                    speak("Opening Entertainment Section.");
                    setTimeout(() => { window.location.href = "index2.html"; }, 1500);
                } else if (command.includes("payment")) {
                    speak("Opening Payment Section.");
                    setTimeout(() => { window.location.href = "pay.html"; }, 1500);
                } else if (command.includes("help")) {
                    speak("Opening Help Section.");
                    setTimeout(() => { window.location.href = "help.html"; }, 1500);
                } else if (command.includes("notes")) {
                    speak("Opening Notes Section.");
                    setTimeout(() => { window.location.href = "index3.html"; }, 1500);
                } else {
                    speak("Sorry, I did not understand that.");
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

            // Start voice recognition automatically when the page loads
            window.onload = function () {
                startVoiceAssistant();
            };
        }
    </script>

</body>
</html>
