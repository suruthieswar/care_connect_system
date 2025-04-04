// Content in English and Tamil
const content = {
    english: {
        title: "User Manual",
        subtitle: "A simple guide to using your Elder Companion App",
        sections: [
            {
                title: "Getting Started",
                content: [
                    { heading: "Step 1: Open the App", text: "Tap on the app icon to open it. You will see a clean and simple interface with large buttons to navigate." },
                    { heading: "Step 2: Make a Video Call", text: "To make a video call, tap the 'Video Call' button. Select the contact you want to call, and press 'Start Call'." },
                    { heading: "Step 3: Set a Reminder", text: "To set a reminder, go to the 'Notes' section and tap on 'Add Reminder'. Choose the time and type of reminder." },
                    { heading: "Step 4: Exercise Tips", text: "In the 'Exercise' section, find simple video tutorials for gentle exercises that you can follow." }
                ]
            },
           
        ]
    },
    tamil: {
        title: "பயனர் கையேடு",
        subtitle: "உங்கள் தோழர் பயன்பாட்டை பயன்படுத்த எளிய வழிகாட்டி",
        sections: [
            {
                title: "ஆரம்பம்",
                content: [
                    { heading: "படி 1: பயன்பாட்டை திறக்கவும்", text: "பயன்பாட்டை திறக்க அதை தொட்டு தேர்ந்தெடுக்கவும். நீங்கள் பெரிய பட்டன்கள் கொண்ட ஒரு தெளிவான மற்றும் எளிமையான பரிமாற்றத்தைப் பார்க்க முடியும்." },
                    { heading: "படி 2: வீடியோ அழைப்பு செய்யவும்", text: "ஒரு வீடியோ அழைப்பை செய்ய, 'வீடியோ அழைப்பு' பட்டனைத் தொட்டு, அழைக்க விரும்பும் தொடர்பைத் தேர்ந்தெடுக்கவும் மற்றும் 'அழைப்பு தொடங்கு' என்ற பட்டனை அழுத்தவும்." },
                    { heading: "படி 3: நினைவூட்டலை அமைக்கவும்", text: "ஒரு நினைவூட்டலை அமைக்க, 'குறிப்புகள்' பிரிவிற்கு சென்று 'நினைவூட்டல் சேர்' என்பதைத் தேர்ந்தெடுக்கவும். நேரம் மற்றும் நினைவூட்டல் வகையைத் தேர்ந்தெடுக்கவும்." },
                    { heading: "படி 4: உடற்பயிற்சி குறிப்புகள்", text: "'உடற்பயிற்சி' பிரிவில், எளிய வீடியோ கற்பித்தல்களைப் பார்க்கவும்." }
                ]
            },
            
        ]
    }
};

// Function to change the language
function changeLanguage(language) {
    document.getElementById('title').textContent = content[language].title;
    document.getElementById('subtitle').textContent = content[language].subtitle;

    let manualContent = '';
    content[language].sections.forEach(section => {
        manualContent += `<h2 class="section-title">${section.title}</h2>`;
        section.content.forEach(item => {
            if (item.heading) {
                manualContent += `<div class="step">
                    <h3>${item.heading}</h3>
                    <p>${item.text}</p>
                </div>`;
            } else {
                manualContent += `<div class="faq-item">
                    <h3>${item.question}</h3>
                    <p>${item.answer}</p>
                </div>`;
            }
        });
    });

    document.getElementById('manual-content').innerHTML = manualContent;
}

// Initial load in English
window.onload = function() {
    changeLanguage('english');
};
