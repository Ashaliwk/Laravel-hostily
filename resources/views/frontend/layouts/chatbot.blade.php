<style>
    /* Chatbot Styles */
    .chatbot-toggler {
        position: fixed;
        bottom: 30px;
        left: 30px;
        outline: none;
        border: none;
        height: 60px;
        width: 60px;
        background: orange;
        color: white;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 999999;
        box-shadow: 0 4px 15px rgba(255, 165, 0, 0.4);
    }
    
    .chatbot-toggler:hover {
        transform: scale(1.1);
    }
    
    .chatbot-toggler i {
        font-size: 24px;
        transition: transform 0.3s ease;
    }
    
    .chatbot-toggler .fa-times {
        display: none;
    }
    
    .show-chatbot .chatbot-toggler {
        transform: rotate(90deg);
        background: #e08c00;
    }
    
    .show-chatbot .chatbot-toggler .fa-comment-alt {
        display: none;
    }
    
    .show-chatbot .chatbot-toggler .fa-times {
        display: block;
        transform: rotate(-90deg);
    }

    .chatbot-window {
        position: fixed;
        left: 30px;
        bottom: 100px;
        width: 360px;
        background: #fff;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        opacity: 0;
        pointer-events: none;
        transform: translateY(20px) scale(0.9);
        transform-origin: bottom left;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        z-index: 999998;
        display: flex;
        flex-direction: column;
    }
    
    .show-chatbot .chatbot-window {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0) scale(1);
    }

    .chatbot-header {
        background: linear-gradient(135deg, orange, #ff7b00);
        padding: 16px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chatbot-header h2 {
        color: #fff;
        font-size: 1.15rem;
        margin: 0;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .chatbot-header .close-btn {
        color: #fff;
        cursor: pointer;
        font-size: 20px;
        transition: 0.2s;
    }

    .chatbot-header .close-btn:hover {
        transform: scale(1.2);
    }

    .chatbox {
        height: 400px;
        overflow-y: auto;
        padding: 20px 20px 20px;
        background: #f8f9fa;
        margin: 0;
        list-style: none;
        display: flex;
        flex-direction: column;
        scroll-behavior: smooth;
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(15px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .chatbox .chat {
        display: flex;
        margin-bottom: 15px;
        animation: slideInUp 0.3s ease forwards;
    }

    .chatbox .chat p {
        padding: 12px 16px;
        border-radius: 15px;
        max-width: 85%;
        font-size: 0.9rem;
        line-height: 1.5;
        margin: 0;
        word-wrap: break-word;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .chatbox .outgoing {
        justify-content: flex-end;
    }

    .chatbox .outgoing p {
        background: linear-gradient(135deg, orange, #ff7b00);
        color: #fff;
        border-bottom-right-radius: 4px;
    }

    .chatbox .incoming p {
        background: #fff;
        color: #333;
        border-bottom-left-radius: 4px;
        border: 1px solid #eaeaea;
    }

    .chat-input-container {
        display: flex;
        padding: 15px 20px;
        background: #fff;
        border-top: 1px solid #eaeaea;
    }

    .chat-input-container input {
        flex: 1;
        border: 1px solid #ddd;
        outline: none;
        font-size: 0.95rem;
        padding: 12px 15px;
        border-radius: 25px;
        background: #f9f9f9;
        transition: 0.3s ease;
    }

    .chat-input-container input:focus {
        border-color: orange;
        background: #fff;
        box-shadow: 0 0 5px rgba(255, 165, 0, 0.2);
    }

    .chat-input-container button {
        background: orange;
        color: #fff;
        border: none;
        outline: none;
        width: 45px;
        height: 45px;
        border-radius: 50%;
        margin-left: 10px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .chat-input-container button:hover {
        background: #e08c00;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 165, 0, 0.3);
    }

    /* Fixed Suggested Buttons */
    .suggested-questions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .suggested-questions .badge {
        background: rgba(255, 165, 0, 0.1);
        color: #e08c00;
        border: 1px solid rgba(255, 165, 0, 0.3);
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.2s ease;
        font-weight: 500;
    }

    .suggested-questions .badge:hover {
        background: orange;
        color: #fff;
        transform: translateY(-2px);
        box-shadow: 0 3px 6px rgba(255, 165, 0, 0.2);
    }

    /* Typing Dots Animation */
    .typing-dots {
        display: flex;
        align-items: center;
        gap: 5px;
        padding: 12px 16px;
        background: #fff;
        border: 1px solid #eaeaea;
        border-radius: 15px;
        border-bottom-left-radius: 4px;
        width: fit-content;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }

    .typing-dots span {
        width: 6px;
        height: 6px;
        background: #888;
        border-radius: 50%;
        animation: bounce 1.4s infinite ease-in-out both;
    }

    .typing-dots span:nth-child(1) { animation-delay: -0.32s; }
    .typing-dots span:nth-child(2) { animation-delay: -0.16s; }

    @keyframes bounce {
        0%, 80%, 100% { transform: scale(0); }
        40% { transform: scale(1); }
    }

    .chatbox::-webkit-scrollbar {
        width: 6px;
    }
    .chatbox::-webkit-scrollbar-track {
        background: transparent; 
    }
    .chatbox::-webkit-scrollbar-thumb {
        background: #ccc; 
        border-radius: 10px;
    }
    .chatbox::-webkit-scrollbar-thumb:hover {
        background: #aaa;
    }

    @media (max-width: 480px) {
        .chatbot-window {
            left: 0;
            bottom: 0;
            width: 100%;
            height: 100%;
            border-radius: 0;
            transform: translateY(100%);
        }
        .show-chatbot .chatbot-window {
            transform: translateY(0);
        }
        .chatbot-header {
            border-radius: 0;
        }
        .chatbox {
            height: calc(100vh - 140px);
        }
        .chatbot-toggler {
            left: 20px;
            bottom: 20px;
            z-index: 999999;
        }
        .show-chatbot .chatbot-toggler {
            opacity: 0; /* Hide toggler when full screen */
            pointer-events: none;
        }
    }
</style>

<button class="chatbot-toggler">
    <i class="fas fa-comment-alt"></i>
    <i class="fas fa-times"></i>
</button>

<div class="chatbot-window">
    <div class="chatbot-header">
        <h2><i class="fas fa-robot"></i> Hostily Assistant</h2>
        <span class="close-btn"><i class="fas fa-times"></i></span>
    </div>
    
    <ul class="chatbox" id="chatbox">
        <li class="chat incoming">
            <p>Hi there 👋<br>Welcome to Hostily. How can I help you today?</p>
        </li>
        <li class="chat incoming">
            <div class="suggested-questions">
                <span class="badge" onclick="sendSuggestedMessage('Help')">Help Options</span>
                <span class="badge" onclick="sendSuggestedMessage('Check-in time')">Check-in Time</span>
                <span class="badge" onclick="sendSuggestedMessage('Location')">Location</span>
            </div>
        </li>
    </ul>
    
    <div class="chat-input-container">
        <input type="text" id="chat-input" placeholder="Ask me a question..." required autocomplete="off">
        <button id="send-btn"><i class="fas fa-paper-plane"></i></button>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const chatbotToggler = document.querySelector(".chatbot-toggler");
        const closeBtn = document.querySelector(".close-btn");
        const chatbox = document.getElementById("chatbox");
        const chatInput = document.getElementById("chat-input");
        const sendBtn = document.getElementById("send-btn");
        
        chatbotToggler.addEventListener("click", () => document.body.classList.toggle("show-chatbot"));
        closeBtn.addEventListener("click", () => document.body.classList.remove("show-chatbot"));
        
        const createChatLi = (message, className) => {
            const chatLi = document.createElement("li");
            chatLi.classList.add("chat", className);
            chatLi.innerHTML = `<p>${message}</p>`;
            return chatLi;
        }
        
        const showTypingIndicator = () => {
            const chatLi = document.createElement("li");
            chatLi.classList.add("chat", "incoming", "typing-indicator-li");
            chatLi.innerHTML = `<div class="typing-dots"><span></span><span></span><span></span></div>`;
            return chatLi;
        }

        const removeTypingIndicator = () => {
            const typingLi = document.querySelector(".typing-indicator-li");
            if(typingLi) typingLi.remove();
        }
        
        const generateResponse = async (userMessage) => {
            try {
                const response = await fetch("{{ route('chatbot.message') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({ message: userMessage })
                });
                
                const data = await response.json();
                removeTypingIndicator();
                chatbox.appendChild(createChatLi(data.reply, "incoming"));
                chatbox.scrollTo(0, chatbox.scrollHeight);
            } catch (error) {
                removeTypingIndicator();
                chatbox.appendChild(createChatLi("Oops! Something went wrong. Please try again.", "incoming"));
                chatbox.scrollTo(0, chatbox.scrollHeight);
            }
        }
        
        const handleChat = (messageText) => {
            const userMessage = messageText || chatInput.value.trim();
            if (!userMessage) return;
            
            chatInput.value = "";
            
            // Append user's message
            chatbox.appendChild(createChatLi(userMessage, "outgoing"));
            chatbox.scrollTo(0, chatbox.scrollHeight);
            
            setTimeout(() => {
                // Display typing dots
                chatbox.appendChild(showTypingIndicator());
                chatbox.scrollTo(0, chatbox.scrollHeight);
                generateResponse(userMessage);
            }, 500); // 500ms delay to feel more natural
        }
        
        sendBtn.addEventListener("click", () => handleChat());
        chatInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                handleChat();
            }
        });

        // Expose function for suggested questions
        window.sendSuggestedMessage = function(message) {
            handleChat(message);
        }
    });
</script>
