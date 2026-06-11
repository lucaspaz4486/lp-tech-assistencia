
document.addEventListener('DOMContentLoaded', () => {
    // === INICIALIZAÇÃO SEGURA DO JSON DO PHP ===
    let BOT_FLOW = {};
    try {
        const jsonData = document.getElementById('bot-flow-data').textContent;
        BOT_FLOW = JSON.parse(jsonData);
    } catch (error) {
        console.error("Erro ao carregar a inteligência do bot do PHP:", error);
    }

    // Elementos da UI
    const chatFab = document.getElementById('chat-fab');
    const chatWindow = document.getElementById('chat-window');
    const chatOverlay = document.getElementById('chat-overlay');
    const closeChat = document.getElementById('close-chat');
    
    const chatBody = document.getElementById('chat-body');
    const nameInputArea = document.getElementById('name-input-area');
    const userNameInput = document.getElementById('user-name-input');
    const sendNameBtn = document.getElementById('send-name-btn');
    const optionsArea = document.getElementById('options-area');

    let userName = '';

    // Lógica de Abrir/Fechar
    function toggleChat() {
        const isClosed = chatWindow.style.display === 'none' || chatWindow.style.display === '';
        chatWindow.style.display = isClosed ? 'flex' : 'none';
        chatOverlay.style.display = isClosed ? 'block' : 'none';
        chatFab.style.display = isClosed ? 'none' : 'flex';
        
        if (isClosed && userName === '') {
            userNameInput.focus();
        }
    }

    if(chatFab) chatFab.addEventListener('click', toggleChat);
    if(closeChat) closeChat.addEventListener('click', toggleChat);
    if(chatOverlay) chatOverlay.addEventListener('click', toggleChat);

    // Funções Utilitárias de UI
    function addUserMessage(text) {
        const div = document.createElement('div');
        div.className = 'message user-message';
        div.textContent = text;
        chatBody.appendChild(div);
        scrollToBottom();
    }

    function addBotMessage(text) {
        const div = document.createElement('div');
        div.className = 'message bot-message';
        div.innerHTML = text.replace(/\n/g, '<br>'); // Formata as quebras de linha corretamente
        chatBody.appendChild(div);
        scrollToBottom();
    }

    function scrollToBottom() {
        chatBody.scrollTop = chatBody.scrollHeight;
    }

    // Etapa 1: Capturar o Nome
    function handleName() {
        const name = userNameInput.value.trim();
        if (name) {
            userName = name;
            addUserMessage(name);
            nameInputArea.style.display = 'none';
            
            setTimeout(() => {
                addBotMessage(`Muito prazer, ${userName}!`);
                setTimeout(() => {
                    renderMenu('inicio'); 
                }, 500);
            }, 600);
        }
    }

    if(sendNameBtn) sendNameBtn.addEventListener('click', handleName);
    if(userNameInput) userNameInput.addEventListener('keypress', (e) => {
        if(e.key === 'Enter') handleName();
    });

    // Etapa 2: Motor de Renderização de Menus
    function renderMenu(menuId) {
        optionsArea.innerHTML = '';
        optionsArea.style.display = 'none';

        const menuData = BOT_FLOW[menuId]; 
        if (!menuData) return;

        addBotMessage(menuData.text);

        menuData.options.forEach(opt => {
            const btn = document.createElement('button');
            btn.className = 'chat-opt-btn';
            btn.textContent = opt.label;
            
            btn.addEventListener('click', () => {
                addUserMessage(opt.label);
                optionsArea.style.display = 'none'; 

                setTimeout(() => {
                    if (opt.target) {
                        renderMenu(opt.target);
                    } 
                    else if (opt.action === 'whatsapp') {
                        addBotMessage('Gerando link seguro para o WhatsApp...');
                        
                        setTimeout(() => {
                            const textMsg = `*Nome:* ${userName}\n*Ação:* ${opt.msg}`;
                            const encodedMsg = encodeURIComponent(textMsg);
                            const whatsappUrl = `https://wa.me/${WHATSAPP_NUMBER}?text=${encodedMsg}`;
                            
                            window.open(whatsappUrl, '_blank');
                            setTimeout(() => renderMenu('inicio'), 1000);
                        }, 1200);
                    }
                }, 600);
            });

            optionsArea.appendChild(btn);
        });

        setTimeout(() => {
            optionsArea.style.display = 'flex';
            scrollToBottom();
        }, 300);
    }
});
