<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elder Dashboard - Video Call</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            text-align: center;
            padding: 50px;
        }
        h1 {
            font-size: 2.5em;
            color: #333;
            margin-bottom: 20px;
        }
        #jitsi-container {
            width: 100%;
            height: 600px;
            border: 2px solid #ddd;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <h1>One-Touch Video Call</h1>
    <p>Connecting you to your caregiver...</p>
    <div id="jitsi-container"></div>

    <script src="https://meet.jit.si/external_api.js"></script>
    <script>
        // Jitsi Meet API Integration
        const domain = "meet.jit.si";
        const options = {
            roomName: "ElderCareRoom123", // Replace with your room name
            parentNode: document.getElementById("jitsi-container"),
            width: "100%",
            height: 600,
            configOverwrite: {
                enableWelcomePage: false,
                prejoinPageEnabled: false,
            },
            interfaceConfigOverwrite: {
                SHOW_JITSI_WATERMARK: false,
                SHOW_WATERMARK_FOR_GUESTS: false,
                TOOLBAR_BUTTONS: [
                    'microphone', 'camera', 'hangup', 'chat'
                ], // Minimal controls for simplicity
            },
            userInfo: {
                displayName: "Elder User" // Set elder's display name
            },
        };
        const api = new JitsiMeetExternalAPI(domain, options);

        // Notify caregiver on elder joining (optional, via webhook or notification system)
        api.executeCommand('sendEndpointTextMessage', 'Caregiver has been notified');
    </script>

</body>
</html>
