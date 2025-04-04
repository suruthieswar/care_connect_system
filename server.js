require('dotenv').config();
const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const twilio = require('twilio');

// Load credentials from .env
const accountSid = process.env.TWILIO_ACCOUNT_SID;
const authToken = process.env.TWILIO_AUTH_TOKEN;
const twilioPhoneNumber = process.env.TWILIO_PHONE_NUMBER;

const client = twilio(accountSid, authToken);
const app = express();
const port = 3000;

// Middleware
app.use(bodyParser.json());
app.use(cors());

// API to handle SOS button press
app.post('/sos', (req, res) => {
    const { message, recipient } = req.body;

    // Log for debugging
    console.log(`Received SOS request: ${message} to ${recipient || process.env.RECIPIENT_PHONE_NUMBER}`);

    // Send SMS
    client.messages
        .create({
            body: message,
            from: twilioPhoneNumber,
            to: recipient || process.env.RECIPIENT_PHONE_NUMBER
        })
        .then((message) => {
            console.log(`Message sent! SID: ${message.sid}`);
            res.json({ success: true, sid: message.sid });
        })
        .catch((error) => {
            console.error('Error sending SMS:', error);
            res.status(500).json({
                success: false,
                error: error.message
            });
        });
});

// Start the server
app.listen(port, () => {
    console.log(`Server running at http://localhost:${port}`);
});
