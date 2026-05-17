<div id="chatbot"
     class="fixed z-50"
     style="right: 24px; bottom: 24px; touch-action: none;">

    <button id="chatbotButton"
            type="button"
            class="bg-blue-600 text-white w-14 h-14 rounded-full shadow-lg text-2xl cursor-move">
        🤖
    </button>

    <div id="chatbotBox"
         class="hidden absolute bottom-16 right-0 w-80 bg-white rounded-xl shadow-xl border overflow-hidden">

        <div class="bg-blue-600 text-white p-4 flex justify-between items-center cursor-move"
             id="chatbotHeader">
            <strong>Smart Asistan</strong>

            <button type="button"
                    onclick="toggleChatbot()"
                    class="text-white text-xl">
                ×
            </button>
        </div>

        <div id="chatMessages"
            class="p-4 h-80 overflow-y-auto space-y-3 text-sm scroll-smooth">
            <div class="bg-gray-100 p-3 rounded-lg text-gray-800">
                Merhaba! Size nasıl yardımcı olabilirim?
            </div>
        </div>
        <div class="p-3 border-t flex gap-2">
            <input id="chatbotInput"
                type="text"
                placeholder="Bir şey sorun..."
                class="flex-1 rounded-lg border-gray-300 text-sm">

            <button type="button"
                    onclick="sendChatbotMessage()"
                    class="bg-blue-600 text-white px-3 rounded-lg">
                Gönder
            </button>
        </div>
        <div class="p-3 border-t space-y-2">
            <button type="button" onclick="botReply('orders')" class="w-full bg-gray-100 p-2 rounded-lg text-left">
                📦 Siparişlerimi görüntüle
            </button>

            <button type="button" onclick="botReply('profile')" class="w-full bg-gray-100 p-2 rounded-lg text-left">
                👤 Profilime git
            </button>

            <button type="button" onclick="botReply('wallet')" class="w-full bg-gray-100 p-2 rounded-lg text-left">
                💳 Cüzdanımı görüntüle
            </button>

            <button type="button" onclick="botReply('favorites')" class="w-full bg-gray-100 p-2 rounded-lg text-left">
                ❤️ Favorilerime git
            </button>

            <button type="button" onclick="botReply('weather')" class="w-full bg-gray-100 p-2 rounded-lg text-left">
                🌦️ Hava durumuna göre ürün öner
            </button>
        </div>
    </div>
</div>

<script>
    const chatbot = document.getElementById('chatbot');
    const chatbotButton = document.getElementById('chatbotButton');
    const chatbotBox = document.getElementById('chatbotBox');

    function resetChatbotPosition() {
        chatbot.style.left = 'auto';
        chatbot.style.top = 'auto';
        chatbot.style.right = '24px';
        chatbot.style.bottom = '24px';
    }

    resetChatbotPosition();

    function toggleChatbot() {

    chatbotBox.classList.toggle('hidden');

    if (!chatbotBox.classList.contains('hidden')) {

        setTimeout(() => {

            const rect = chatbotBox.getBoundingClientRect();

            if (rect.bottom > window.innerHeight) {

                const overflow = rect.bottom - window.innerHeight;

                const currentTop = chatbot.offsetTop;

                chatbot.style.top = (currentTop - overflow - 40) + 'px';
                chatbot.style.bottom = 'auto';
                chatbot.style.right = '300px';
            }

        }, 10);
    }
}

    function addBotMessage(message) {
        const chat = document.getElementById('chatMessages');

        chat.innerHTML += `
            <div class="bg-gray-100 p-3 rounded-lg text-gray-800">
                ${message}
            </div>
        `;

        chat.scrollTop = chat.scrollHeight;

        scrollChatToBottom();
    }

    function botReply(type) {
        const routes = {
            orders: "{{ route('orders.index') }}",
            profile: "{{ route('profile.edit') }}",
            wallet: "{{ route('wallet.index') }}",
            favorites: "{{ route('favorites.index') }}",
            weather: "{{ route('weather.index') }}"
        };

        const messages = {
            orders: 'Siparişlerinize yönlendiriliyorsunuz...',
            profile: 'Profil sayfanıza gidiliyor...',
            wallet: 'Cüzdanınız açılıyor...',
            favorites: 'Favorileriniz açılıyor...',
            weather: 'Hava durumuna göre ürün önerileri açılıyor...'
        };

        addBotMessage(messages[type]);



        setTimeout(() => {
            window.location.href = routes[type];
        }, 700);
    }

    let isMouseDown = false;
    let startX = 0;
    let startY = 0;
    let offsetX = 0;
    let offsetY = 0;
    let moved = false;

    chatbot.addEventListener('mousedown', function(e) {
        isMouseDown = true;
        moved = false;

        startX = e.clientX;
        startY = e.clientY;

        const rect = chatbot.getBoundingClientRect();
        offsetX = e.clientX - rect.left;
        offsetY = e.clientY - rect.top;
    });

    document.addEventListener('mousemove', function(e) {
        if (!isMouseDown) return;

        const diffX = Math.abs(e.clientX - startX);
        const diffY = Math.abs(e.clientY - startY);

        if (diffX > 5 || diffY > 5) {
            moved = true;

            let newLeft = e.clientX - offsetX;
            let newTop = e.clientY - offsetY;

            const maxLeft = window.innerWidth - chatbot.offsetWidth;
            const maxTop = window.innerHeight - chatbot.offsetHeight;

            newLeft = Math.max(8, Math.min(newLeft, maxLeft - 8));
            newTop = Math.max(8, Math.min(newTop, maxTop - 8));

            chatbot.style.left = newLeft + 'px';
            chatbot.style.top = newTop + 'px';
            chatbot.style.right = 'auto';
            chatbot.style.bottom = 'auto';
        }
    });

    function sendChatbotMessage() {
    const input = document.getElementById('chatbotInput');
    const message = input.value.trim();

    if (!message) return;

    const chat = document.getElementById('chatMessages');

    chat.innerHTML += `
        <div class="bg-blue-600 text-white p-3 rounded-lg ml-8">
            ${message}
        </div>
    `;

    scrollChatToBottom();

    input.value = '';

    setTimeout(() => {
        const reply = generateBotAnswer(message.toLowerCase());
        addBotMessage(reply);
    }, 500);


}

    function generateBotAnswer(message) {
        if (message.includes('sipariş')) {
            return 'Siparişlerinizi görüntülemek için “Siparişlerimi görüntüle” seçeneğini kullanabilirsiniz. 📦';
        }

        if (message.includes('profil') || message.includes('hesap')) {
            return 'Profil bilgilerinizi güncellemek veya hesabınızı pasif etmek için profil sayfanıza gidebilirsiniz. 👤';
        }

        if (message.includes('cüzdan') || message.includes('bakiye')) {
            return 'Cüzdan bölümünden bakiye yükleyebilir ve alışverişte kullanabilirsiniz. 💳';
        }

        if (message.includes('favori')) {
            return 'Favori ürünlerinizi Favorilerim sayfasından görüntüleyebilirsiniz. ❤️';
        }

        if (message.includes('hava') || message.includes('öneri')) {
            return 'Hava durumuna göre ürün önerileri için hava durumu sayfasını kullanabilirsiniz. 🌦️';
        }

        if (message.includes('sepet')) {
            return 'Sepetinizi görüntüleyebilir, ürün adetlerini kontrol edip sipariş oluşturabilirsiniz. 🛒';
        }

        if (message.includes('ödeme')) {
            return 'Ödeme sırasında önce cüzdan bakiyeniz kullanılır, kalan tutar kart bilgileriyle tamamlanır. 💰';
        }

        return 'Bu konuda size yardımcı olmaya çalışıyorum. Sipariş, profil, cüzdan, favori, sepet veya hava durumu hakkında soru sorabilirsiniz. 😊';
    }

    document.addEventListener('mouseup', function(e) {
        if (!isMouseDown) return;

        isMouseDown = false;

        if (!moved && e.target.id === 'chatbotButton') {
            toggleChatbot();
        }
    });


    function scrollChatToBottom() {
        const chat = document.getElementById('chatMessages');

        setTimeout(() => {
            chat.scrollTop = chat.scrollHeight;
        }, 50);
    }
</script>
