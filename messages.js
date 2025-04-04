import React, { useState } from "react";

const Messages = () => {
  const [messages, setMessages] = useState([]);  // State to hold messages
  const [messageInput, setMessageInput] = useState("");  // State for input field

  // Function to handle sending new message
  const sendMessage = () => {
    if (messageInput.trim() !== "") {
      setMessages([...messages, { text: messageInput, id: Date.now() }]);
      setMessageInput("");  // Clear input after sending message
    }
  };

  return (
    <div style={styles.messageContainer}>
      <h2>Messages</h2>
      
      {/* Display messages */}
      <div style={styles.messages}>
        {messages.map((message) => (
          <div key={message.id} style={styles.message}>
            {message.text}
          </div>
        ))}
      </div>

      {/* Input field and send button */}
      <div style={styles.messageInput}>
        <input
          type="text"
          placeholder="Type a message"
          value={messageInput}
          onChange={(e) => setMessageInput(e.target.value)}
          style={styles.inputField}
        />
        <button onClick={sendMessage} style={styles.sendButton}>Send</button>
      </div>
    </div>
  );
};

// Inline styles for the component
const styles = {
  messageContainer: {
    padding: "20px",
    backgroundColor: "#f4f4f4",
    borderRadius: "8px",
    maxWidth: "400px",
    margin: "auto",
  },
  messages: {
    maxHeight: "200px",
    overflowY: "auto",
    marginBottom: "10px",
  },
  message: {
    backgroundColor: "#d1f7d1",
    padding: "10px",
    margin: "5px 0",
    borderRadius: "5px",
  },
  messageInput: {
    display: "flex",
    justifyContent: "space-between",
  },
  inputField: {
    width: "80%",
    padding: "8px",
    borderRadius: "5px",
    border: "1px solid #ccc",
  },
  sendButton: {
    padding: "8px 16px",
    border: "none",
    backgroundColor: "#4CAF50",
    color: "white",
    borderRadius: "5px",
    cursor: "pointer",
  },
};

export default Messages;
