require('./bootstrap');

document.addEventListener('DOMContentLoaded', function () {
    const chatForm = document.getElementById('chat-form');
    const messageInput = document.getElementById('message-input');
    const chatMessages = document.getElementById('chat-messages');

    chatForm.addEventListener('submit', function (event) {
        event.preventDefault();

        const message = messageInput.value.trim();

        if (message !== '') {
            axios.post('/send-message', { message })
                .then(response => {
                    // Xử lý phản hồi từ server nếu cần
                })
                .catch(error => {
                    console.error('Error sending message:', error);
                });

            messageInput.value = '';
        }
    });

    window.Echo.channel('chat')
        .listen('ChatMessageEvent', (event) => {
            const message = document.createElement('li');
            message.textContent = event.message;
            chatMessages.appendChild(message);
        });
});

