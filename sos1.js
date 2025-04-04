function sendSOS() {
    console.log("Sending SOS alert...");

    fetch('http://localhost:3000/sos', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            message: "This is an SOS alert! Please assist immediately.",
            recipient: "+916385274064" // You can keep it dynamic or leave it empty to use the backend's default
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('SOS Alert Sent Successfully!');
            } else {
                alert(`Failed to send SOS Alert. Error: ${data.error}`);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while sending the SOS alert.');
        });
}
