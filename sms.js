// Import the Twilio library
const twilio = require('twilio');

// Set these values in the environment; never commit Twilio credentials.
const accountSid = process.env.TWILIO_ACCOUNT_SID;
const authToken = process.env.TWILIO_AUTH_TOKEN;
const fromNumber = process.env.TWILIO_FROM_NUMBER;
const toNumber = process.env.SOS_TO_NUMBER;

if (!accountSid || !authToken || !fromNumber || !toNumber) {
    throw new Error('Set TWILIO_ACCOUNT_SID, TWILIO_AUTH_TOKEN, TWILIO_FROM_NUMBER, and SOS_TO_NUMBER.');
}

// Create a Twilio client
const client = twilio(accountSid, authToken);

// Send an SMS
client.messages
    .create({
        body: 'This is an SOS alert! Please assist immediately.', // Message content
        from: fromNumber,
        to: toNumber
    })
    .then((message) => {
        console.log(`Message sent successfully! SID: ${message.sid}`);
    })
    .catch((error) => {
        console.error('Error sending message:', error);
    });
