<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Validation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 400px;
            background: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .container:hover {
            transform: translateY(-10px);
        }

        h1 {
            color: #fda085;
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }

        label {
            font-size: 1rem;
            margin-bottom: 10px;
            display: block;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            margin-bottom: 20px;
            border: 2px solid #fda085;
            border-radius: 10px;
            outline: none;
            transition: border-color 0.3s ease;
        }

        input:focus {
            border-color: #ff7b54;
        }

        button {
            width: 100%;
            padding: 15px;
            font-size: 1.2rem;
            background: #fda085;
            color: white;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #ff7b54;
        }

        #status {
            font-size: 1.1rem;
            color: #f6d365;
            margin-top: 20px;
            font-weight: bold;
        }

        .nav-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .nav-buttons a {
            text-decoration: none;
            padding: 15px 30px;
            background-color: rgb(236, 132, 41);
            color: white;
            border-radius: 5px;
            font-size: 18px;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s ease;
            margin-top: 20px;
        }

        .nav-buttons a:hover {
            background-color: #ff7b54;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Age Validation</h1>
        <form id="ageForm" onsubmit="validateAge(event)">
            <label for="age">Please say your age (40–80 only):</label>
            <input type="number" id="age" name="age" placeholder="Enter your age" required>
            <button type="submit">Submit</button>
        </form>
        <p id="status">Listening for your voice...</p>
    </div>

    <div class="nav-buttons">
        <a href="elder_dashboard.php">Home</a>
    </div>

    <script>
        // Check for SpeechRecognition and SpeechSynthesis support
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        const SpeechSynthesis = window.speechSynthesis;

        if (!SpeechRecognition || !SpeechSynthesis) {
            alert("Sorry, your browser does not support speech recognition or synthesis. Please use a supported browser like Chrome.");
        } else {
            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.lang = 'en-US';

            recognition.onresult = function (event) {
                const command = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                console.log("Recognized Command: ", command);

                // Match the age command and fill the input field
                const ageMatch = command.match(/\d+/);  // Match digits only
                if (ageMatch) {
                    const age = parseInt(ageMatch[0]);
                    if (age >= 40 && age <= 80) {
                        document.getElementById('age').value = age;
                        validateAge();  // Automatically submit the form
                    } else {
                        speak("Please say an age between 40 and 80.");
                    }
                } else if (command.includes("back")) {
                    // Go back to the previous page or home page when "back" command is detected
                    window.location.href = "elder_dashboard.php"; // Or use history.back() for the previous page
                } else {
                    speak("Sorry, I couldn't hear your age. Please try again.");
                }
            };

            // Start voice recognition automatically when the page loads
            recognition.start();
            document.getElementById("status").innerText = "Listening for age...";

            function speak(text) {
                const utterance = new SpeechSynthesisUtterance(text);
                utterance.lang = "en-US";
                SpeechSynthesis.speak(utterance);
            }
        }

        // Form submission
        function validateAge(event) {
            if (event) event.preventDefault(); // Prevent form submission if triggered by button

            const age = parseInt(document.getElementById('age').value, 10);

            if (age >= 40 && age <= 80) {
                localStorage.setItem('age', age);
                window.location.href = "exercise.php";
            } else {
                speak("Please enter an age between 40 and 80.");
            }
        }
    </script>
</body>
</html>
