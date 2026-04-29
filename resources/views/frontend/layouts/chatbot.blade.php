<style>
    .chatbot-toggler {
        position: fixed;
        bottom: 30px;
        left: 30px;
        outline: none;
        border: none;
        height: 60px;
        width: 60px;
        background: #c08b3c;
        color: #fff;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 999999;
        box-shadow: 0 10px 25px rgba(192, 139, 60, 0.35);
    }

    .chatbot-toggler:hover {
        transform: translateY(-3px);
    }

    .chatbot-toggler .fa-times {
        display: none;
    }

    .show-chatbot .chatbot-toggler .fa-comment-alt {
        display: none;
    }

    .show-chatbot .chatbot-toggler .fa-times {
        display: block;
    }

    .chatbot-window {
        position: fixed;
        left: 30px;
        bottom: 100px;
        width: 380px;
        background: #fff;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.18);
        opacity: 0;
        pointer-events: none;
        transform: translateY(20px) scale(0.96);
        transition: all 0.3s ease;
        z-index: 999998;
    }

    .show-chatbot .chatbot-window {
        opacity: 1;
        pointer-events: auto;
        transform: translateY(0) scale(1);
    }

    .chatbot-header {
        background: linear-gradient(135deg, #1e2d44, #0f1725);
        padding: 18px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chatbot-header h2,
    .chatbot-header .close-btn {
        color: #fff;
        margin: 0;
    }

    .chatbox {
        height: 410px;
        overflow-y: auto;
        padding: 18px;
        background: #f6f7fb;
        margin: 0;
        list-style: none;
    }

    .chatbox .chat {
        display: flex;
        margin-bottom: 14px;
    }

    .chatbox .chat p {
        padding: 12px 15px;
        border-radius: 14px;
        max-width: 85%;
        font-size: 0.92rem;
        line-height: 1.55;
        margin: 0;
    }

    .chatbox .outgoing {
        justify-content: flex-end;
    }

    .chatbox .outgoing p {
        background: #c08b3c;
        color: #fff;
    }

    .chatbox .incoming p {
        background: #fff;
        color: #243244;
        border: 1px solid #e7e8ef;
    }

    .chat-input-container {
        display: flex;
        gap: 10px;
        padding: 16px 18px;
        background: #fff;
        border-top: 1px solid #e9edf3;
    }

    .chat-input-container input {
        flex: 1;
        border: 1px solid #d7dbe5;
        outline: none;
        font-size: 0.95rem;
        padding: 12px 14px;
        border-radius: 999px;
    }

    .chat-input-container button {
        background: #c08b3c;
        color: #fff;
        border: none;
        width: 46px;
        height: 46px;
        border-radius: 50%;
    }

    .suggested-questions {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 8px;
    }

    .suggested-questions .badge {
        background: #fff;
        color: #7a5b24;
        border: 1px solid #ead9b8;
        padding: 8px 12px;
        border-radius: 999px;
        cursor: pointer;
        font-size: 0.8rem;
    }

    .typing-dots {
        display: inline-flex;
        gap: 5px;
        padding: 12px 15px;
        background: #fff;
        border-radius: 14px;
    }

    .typing-dots span {
        width: 6px;
        height: 6px;
        background: #79808f;
        border-radius: 50%;
        animation: bounce 1.2s infinite ease-in-out;
    }

    .typing-dots span:nth-child(2) {
        animation-delay: 0.15s;
    }

    .typing-dots span:nth-child(3) {
        animation-delay: 0.3s;
    }

    @keyframes bounce {
        0%, 80%, 100% { transform: scale(0.6); opacity: 0.5; }
        40% { transform: scale(1); opacity: 1; }
    }

    @media (max-width: 480px) {
        .chatbot-window {
            width: calc(100% - 20px);
            left: 10px;
            right: 10px;
            bottom: 90px;
        }
    }
</style>

<button class="chatbot-toggler">
    <i class="fas fa-comment-alt"></i>
    <i class="fas fa-times"></i>
</button>

<div class="chatbot-window">
    <div class="chatbot-header">
        <h2><i class="fas fa-robot mr-2"></i>Hostily Smart Chat</h2>
        <span class="close-btn"><i class="fas fa-times"></i></span>
    </div>

    <ul class="chatbox" id="chatbox">
        <li class="chat incoming">
            <p>Hi. I can help with prices, room choices, booking steps, and hotel policies.</p>
        </li>
        <li class="chat incoming">
            <div class="suggested-questions">
                <span class="badge" onclick="sendSuggestedMessage('I need a cheap room for 2 nights')">Budget Room</span>
                <span class="badge" onclick="sendSuggestedMessage('What amenities do you offer?')">Amenities</span>
                <span class="badge" onclick="sendSuggestedMessage('How do I book a room?')">Booking Help</span>
            </div>
        </li>
    </ul>

    <div class="chat-input-container">
        <input type="text" id="chat-input" placeholder="Ask about rooms, pricing, or policies" required autocomplete="off">
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
        };

        const showTypingIndicator = () => {
            const chatLi = document.createElement("li");
            chatLi.classList.add("chat", "incoming", "typing-indicator-li");
            chatLi.innerHTML = `<div class="typing-dots"><span></span><span></span><span></span></div>`;
            return chatLi;
        };

        const removeTypingIndicator = () => {
            const typingLi = document.querySelector(".typing-indicator-li");
            if (typingLi) {
                typingLi.remove();
            }
        };

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
                chatbox.appendChild(createChatLi("Sorry, I hit a snag. Try again in a moment.", "incoming"));
                chatbox.scrollTo(0, chatbox.scrollHeight);
            }
        };

        const handleChat = (messageText) => {
            const userMessage = messageText || chatInput.value.trim();
            if (!userMessage) return;

            chatInput.value = "";
            chatbox.appendChild(createChatLi(userMessage, "outgoing"));
            chatbox.scrollTo(0, chatbox.scrollHeight);

            setTimeout(() => {
                chatbox.appendChild(showTypingIndicator());
                chatbox.scrollTo(0, chatbox.scrollHeight);
                generateResponse(userMessage);
            }, 400);
        };

        sendBtn.addEventListener("click", () => handleChat());
        chatInput.addEventListener("keydown", (e) => {
            if (e.key === "Enter" && !e.shiftKey) {
                e.preventDefault();
                handleChat();
            }
        });

        window.sendSuggestedMessage = function(message) {
            handleChat(message);
        };
    });
</script>
