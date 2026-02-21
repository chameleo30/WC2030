
<div id="wc-chatbot">
    <!-- Bouton flottant -->
    <button id="wc-toggle" onclick="wcToggle()" aria-label="Ouvrir le chatbot">
        <span id="wc-icon-open">⚽</span>
        <span id="wc-icon-close" style="display:none">✕</span>
        <span id="wc-badge" style="display:none">1</span>
    </button>

    <!-- Fenêtre chat -->
    <div id="wc-window" style="display:none">
        <!-- Header -->
        <div id="wc-header">
            <div id="wc-header-left">
                <div id="wc-avatar">🏆</div>
                <div>
                    <div id="wc-name">Assistant WorldCup 2030</div>
                    <div id="wc-status">● En ligne</div>
                </div>
            </div>
            <button onclick="wcToggle()" id="wc-close-btn">✕</button>
        </div>

        <!-- Messages -->
        <div id="wc-messages">
            <div class="wc-msg wc-bot">
                <div class="wc-bubble">
                    👋 Bienvenue ! Je suis votre assistant officiel WorldCup 2030.<br>
                    Comment puis-je vous aider ? Maillots, écharpes, casquettes... 🇲🇦⚽
                </div>
            </div>
        </div>

        <!-- Suggestions rapides -->
        <div id="wc-suggestions">
            <button onclick="wcSend('Montrez-moi les maillots')">🧥 Maillots</button>
            <button onclick="wcSend('Prix des écharpes ?')">🧣 Écharpes</button>
            <button onclick="wcSend('Livraison combien ?')">🚚 Livraison</button>
        </div>

        <!-- Input -->
        <div id="wc-input-area">
            <input
                type="text"
                id="wc-input"
                placeholder="Écrivez votre message..."
                onkeydown="if(event.key==='Enter') wcSend()"
                autocomplete="off"
            />
            <button id="wc-send-btn" onclick="wcSend()">➤</button>
        </div>
    </div>
</div><?php /**PATH C:\Users\AMAHANE\Documents\ABDO\coupe_du_monde_2030\resources\views/partiels/chat.blade.php ENDPATH**/ ?>