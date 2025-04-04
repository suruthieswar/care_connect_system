<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercise Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            color: #333;
        }

        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 20px;
            color: #444;
        }

        .categories {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
        }

        .category {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 150px;
            cursor: pointer;
        }

        .category img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .category:hover {
            transform: scale(1.05);
        }

        .back-btn {
            display: block;
            margin: 30px auto;
            background: #fda085;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            cursor: pointer;
            width: 150px;
        }

        .back-btn:hover {
            background: #f6d365;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Exercise Recommendations</h1>
        <div id="exerciseOutput"></div>
        <div class="categories" id="categories"></div>
        <button class="back-btn" onclick="goBack()">Go Back</button>
    </div>

    <script>
        // Retrieve query parameters from the URL
        function getQueryParams() {
            const params = new URLSearchParams(window.location.search);
            return {
                name: params.get('name') || 'Guest', // Default to "Guest" if name is null
                age: parseInt(params.get('age')) || 'Unknown',
                gender: params.get('gender') || 'Not specified'
            };
        }

        // Display categories and personalized greeting
        function displayCategories() {
            const { name, age } = getQueryParams();
            const exerciseOutput = document.getElementById('exerciseOutput');
            const categoriesDiv = document.getElementById('categories');

            let exerciseHTML = `<p>Hello <strong>${name}</strong>, please select an exercise category:</p>`;
            exerciseOutput.innerHTML = exerciseHTML;

            const categories = [
                { name: "Breathing Exercises", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTwv2gH__Ik9_xpyenQaANStrzHBnVu3Ll8Yj8dP3CLbLJEb11bgT_pjh1GvoUbWI8Eu4I&usqp=CAU", link: "breathing.html?category=Breathing+Exercises" },
                { name: "Workouts", img: "https://thumbs.dreamstime.com/b/active-family-people-kids-doing-fitness-exercises-sports-lifestyle-vector-flat-characters-138916218.jpg?w=768", link: "workouts.html?category=Workouts" },
                { name: "Warmups", img: "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTulHvsNTq-h-MMmk1WxDH4tppX3Hc1oGiGTQ&s", link: "warmups.html?category=Warmups" },
                { name: "Yoga", img: "https://static.toiimg.com/thumb/72400605.cms?width=680&height=512&imgsize=679721", link: "yoga.html?category=Yoga" }
            ];

            categories.forEach(category => {
                const categoryDiv = document.createElement('div');
                categoryDiv.className = 'category';
                categoryDiv.innerHTML = `
                    <h3>${category.name}</h3>
                    <img src="${category.img}" alt="${category.name}" onError="this.src='https://via.placeholder.com/120?text=Image+Not+Found';">
                `;
                categoryDiv.onclick = () => window.location.href = category.link;
                categoriesDiv.appendChild(categoryDiv);
            });
        }

        // Navigate back to the previous page
        function goBack() {
            window.history.back();
        }

        // Speech recognition to handle voice commands
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (SpeechRecognition) {
            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.lang = 'en-US';

            recognition.onresult = function(event) {
                const command = event.results[event.results.length - 1][0].transcript.toLowerCase().trim();
                console.log("Recognized Command: ", command);

                if (command.includes("back")) {
                    goBack();
                } else if (command.includes("breathing")) {
                    window.location.href = "breathing.html?category=Breathing+Exercises";
                } else if (command.includes("workout")) {
                    window.location.href = "workouts.html?category=Workouts";
                } else if (command.includes("warmup")) {
                    window.location.href = "warmups.html?category=Warmups";
                } else if (command.includes("yoga")) {
                    window.location.href = "yoga.html?category=Yoga";
                }
            };

            // Start voice recognition automatically when the page loads
            recognition.start();
            console.log("Listening for commands...");
        } else {
            console.log("Speech Recognition is not supported in this browser.");
        }

        // Initialize the categories and greeting
        displayCategories();
    </script>
</body>
</html>
