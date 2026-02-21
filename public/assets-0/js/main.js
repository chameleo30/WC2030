(function ($) {
    "use strict";

    $(document).ready(function ($) {

        // testimonial sliders
        $(".testimonial-sliders").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 1,
                    nav: false
                },
                1000: {
                    items: 1,
                    nav: false,
                    loop: true
                }
            }
        });

        // homepage slider
        $(".homepage-slider").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            nav: true,
            dots: false,
            navText: ['<i class="fas fa-angle-left"></i>', '<i class="fas fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    loop: true
                },
                600: {
                    items: 1,
                    nav: true,
                    loop: true
                },
                1000: {
                    items: 1,
                    nav: true,
                    loop: true
                }
            }
        });

        // logo carousel
        $(".logo-carousel-inner").owlCarousel({
            items: 4,
            loop: true,
            autoplay: true,
            margin: 30,
            responsive: {
                0: {
                    items: 1,
                    nav: false
                },
                600: {
                    items: 3,
                    nav: false
                },
                1000: {
                    items: 4,
                    nav: false,
                    loop: true
                }
            }
        });

        // count down
        if ($('.time-countdown').length) {
            $('.time-countdown').each(function () {
                var $this = $(this), finalDate = $(this).data('countdown');
                $this.countdown(finalDate, function (event) {
                    var $this = $(this).html(event.strftime('' + '<div class="counter-column"><div class="inner"><span class="count">%D</span>Days</div></div> ' + '<div class="counter-column"><div class="inner"><span class="count">%H</span>Hours</div></div>  ' + '<div class="counter-column"><div class="inner"><span class="count">%M</span>Mins</div></div>  ' + '<div class="counter-column"><div class="inner"><span class="count">%S</span>Secs</div></div>'));
                });
            });
        }

        // projects filters isotop
        $(".product-filters li").on('click', function () {

            $(".product-filters li").removeClass("active");
            $(this).addClass("active");

            var selector = $(this).attr('data-filter');

            $(".product-lists").isotope({
                filter: selector,
            });

        });

        // isotop inner
        $(".product-lists").isotope();

        // magnific popup
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });

        // light box
        $('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            closeOnContentClick: true,
            mainClass: 'mfp-img-mobile',
            image: {
                verticalFit: true
            }
        });

        // homepage slides animations
        $(".homepage-slider").on("translate.owl.carousel", function () {
            $(".hero-text-tablecell .subtitle").removeClass("animated fadeInUp").css({ 'opacity': '0' });
            $(".hero-text-tablecell h1").removeClass("animated fadeInUp").css({ 'opacity': '0', 'animation-delay': '0.3s' });
            $(".hero-btns").removeClass("animated fadeInUp").css({ 'opacity': '0', 'animation-delay': '0.5s' });
        });

        $(".homepage-slider").on("translated.owl.carousel", function () {
            $(".hero-text-tablecell .subtitle").addClass("animated fadeInUp").css({ 'opacity': '0' });
            $(".hero-text-tablecell h1").addClass("animated fadeInUp").css({ 'opacity': '0', 'animation-delay': '0.3s' });
            $(".hero-btns").addClass("animated fadeInUp").css({ 'opacity': '0', 'animation-delay': '0.5s' });
        });



        // stikcy js
        $("#sticker").sticky({
            topSpacing: 0
        });

        //mean menu
        $('.main-menu').meanmenu({
            meanMenuContainer: '.mobile-menu',
            meanScreenWidth: "992"
        });

        // search form
        $(".search-bar-icon").on("click", function () {
            $(".search-area").addClass("search-active");
        });

        $(".close-btn").on("click", function () {
            $(".search-area").removeClass("search-active");
        });

    });


    jQuery(window).on("load", function () {
        jQuery(".loader").fadeOut(1000);
    });


}(jQuery));

document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function () {
        const productId = this.dataset.id;
        fetch('/ajouter_cart', {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                id_produit: productId
            })
        })
            .then(res => {
                if (!res.ok) {
                    return res.json().then(err => {
                        throw err;
                    });
                }
                return res.json();
            })
            .then(data => {
                const alertBox = `<div class="alert alert-success alert-dismissible fade show" role="alert">${data.message}</div>`;
                document.getElementById('alert-container').innerHTML = alertBox;
                updateCartUI(data.cartCount);
                //document.getElementById('cart-count').innerHTML = `<a class='shopping-cart' href='/cart'><i class='fas fa-shopping-cart'></i>${data.cartCount}</a>`;
                localStorage.setItem('cart_updated', Date.now());
                //document.querySelectorAll('.cart-count').forEach(el => el.innerHTML = `<a class='shopping-cart' href='/cart'><i class='fas fa-shopping-cart'></i>${data.cartCount}</a>`);
            })
            .catch(err => {
                document.getElementById('alert-container').innerHTML = `<div class="alert alert-danger">${err.message ?? "Erreur serveur"}</div>`;
            });
    });
});

document.querySelectorAll('.update-quantity-cart').forEach(input => {
    input.addEventListener('change', function () {
        const id = this.dataset.id;
        const prix = parseFloat(this.dataset.prix) || 0;
        let quantite = parseInt(this.value) || 0;

        fetch('/update_cart', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                quantite: { [id]: quantite }
            })
        })
            .then(res => res.json())
            .then(data => {
                // Mettre à jour le total de la ligne
                document.getElementById(`total-${id}`).innerHTML = (prix * quantite).toFixed(2) + ' dh';

                // Afficher le message
                document.getElementById('alert-container').innerHTML = `<div class="alert alert-success">${data.message}</div>`;

                // Recalculer le sous-total de toutes les lignes
                let sousTotal = 0;
                document.querySelectorAll('.update-quantity-cart').forEach(item => {
                    const itemPrix = parseFloat(item.dataset.prix) || 0;
                    const itemQuantite = parseInt(item.value) || 0;
                    sousTotal += itemPrix * itemQuantite;
                });
                document.getElementById('sousTotal').innerHTML = sousTotal.toFixed(2) + ' dh';

                // Calculer le total final avec frais si nécessaire
                let total = sousTotal;
                let livraisonMessage = '';

                if (sousTotal >= 500) {
                    livraisonMessage = '<td colspan="2"><div class="alert alert-success">Livraison Gratuite</div></td>';
                } else {
                    total += 50; // ajouter frais
                    livraisonMessage = '<td><strong>Livraison: </strong></td><td>50 dh</td>';
                }

                document.getElementById('total').innerHTML = total.toFixed(2) + ' dh';
                document.getElementById('livraison').innerHTML = livraisonMessage;
            })
            .catch(() => {
                document.getElementById('alert-container').innerHTML = `<div class="alert alert-danger">Erreur lors de la mise à jour</div>`;
            });
    });
});

document.getElementById('clear-cart')?.addEventListener('click', () => {
    fetch('/viderPanier', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        }
    })
        .then(res => {
            if (!res.ok) {
                return res.json().then(err => {
                    throw err;
                });
            }
            return res.json();
        })
        .then(data => {
            document.querySelectorAll('.cart-count').forEach(el => el.innerHTML = `<a class='shopping-cart' href='/cart'><i class='fas fa-shopping-cart'></i>0</a>`);
            document.getElementById('alert-container').innerHTML = `
            <div class="alert alert-success">${data.message}</div>
        `;
            document.getElementById('tbody-cart').innerHTML = "";
            document.getElementById('sousTotal').innerHTML = '0 dh';
            document.getElementById('livraison').innerHTML = "";
            document.getElementById('total').innerHTML = '0 dh';
        }).catch(err => {
            document.getElementById('alert-container').innerHTML = `<div class="alert alert-danger">${err.message ?? "Erreur serveur"}</div>`;
        });
});

document.querySelectorAll('.check-out').forEach(e => {
    e.addEventListener('click', function () {
        console.log("test")
        fetch('/checkout/verifier', {
            method: 'get'
        })
            .then(res => {
                if (!res.ok) {
                    return res.json().then(err => {
                        throw err;
                    });
                }
                return res.json();
            })
            .then(data => {
                window.location.href = data.redirect;
            })
            .catch(err => {
                document.getElementById('alert-container').innerHTML = `<div class="alert alert-danger">${err.message ?? "Erreur serveur"}</div>`;
            });
    })
});

function refreshCartCount() {
    fetch('/test')
        .then(res => res.json())
        .then(data => {
            updateCartUI(data.cartCount);
        });
}

window.addEventListener('storage', event => {
    if (event.key === 'cart_updated') {
        refreshCartCount();
    }
});

function updateCartUI(count) {
    document.querySelectorAll('.cart-count').forEach(el => el.innerHTML = `<a class='shopping-cart' href='/cart'><i class='fas fa-shopping-cart'></i>${count}</a>`);
}





/**
 * WorldCup 2030 — Chatbot
 * public/js/chatbot.js
 */

// ─── Configuration ────────────────────────────────────────────
const WC_API     = '/chat';
const WC_CSRF    = document.querySelector('meta[name="csrf-token"]')?.content;
const wcMessages = document.getElementById('wc-messages');
const wcInput    = document.getElementById('wc-input');
const wcSendBtn  = document.getElementById('wc-send-btn');
const wcWindow   = document.getElementById('wc-window');
const wcBadge    = document.getElementById('wc-badge');

let wcOpen = false;

// ─── Ouvrir / Fermer le chatbot ───────────────────────────────
function wcToggle() {
    wcOpen = !wcOpen;

    wcWindow.style.display                              = wcOpen ? 'flex'  : 'none';
    document.getElementById('wc-icon-open').style.display  = wcOpen ? 'none'  : 'block';
    document.getElementById('wc-icon-close').style.display = wcOpen ? 'block' : 'none';
    wcBadge.style.display                               = 'none';

    if (wcOpen) wcInput.focus();
}

// ─── Ajouter un message ───────────────────────────────────────
function wcAppend(text, type, produits = []) {
    const div = document.createElement('div');
    div.className = `wc-msg wc-${type}`;

    // Bulle principale
    let html = `<div class="wc-bubble">${escapeHtml(text).replace(/\n/g, '<br>')}</div>`;

    // Cartes produits
    produits.forEach(p => {
        html += `
        <div class="wc-product-card">
            <img
                src="${p.image}"
                alt="${escapeHtml(p.name)}"
                onerror="this.src='assets-0/img/products/placeholder.png'"
            />
            <div class="wc-product-info">
                <div class="wc-product-name">${escapeHtml(p.name)}</div>
                <div class="wc-product-price">${escapeHtml(p.price)}</div>
                <div class="wc-product-unit">Unité : ${escapeHtml(p.unit ?? '')}</div>
                <div class="wc-product-stock">
                    ${p.stock > 0 ? `✅ En stock (${p.stock})` : '❌ Rupture de stock'}
                </div>
            </div>
            <a href="${p.url}" class="wc-product-btn">Voir →</a>
        </div>`;
    });

    div.innerHTML = html;
    wcMessages.appendChild(div);
    wcMessages.scrollTop = wcMessages.scrollHeight;
    return div;
}

// ─── Indicateur de frappe ─────────────────────────────────────
function wcTyping() {
    const div = document.createElement('div');
    div.className = 'wc-msg wc-bot wc-typing';
    div.innerHTML = `
    <div class="wc-bubble">
        <div class="wc-dot"></div>
        <div class="wc-dot"></div>
        <div class="wc-dot"></div>
    </div>`;
    wcMessages.appendChild(div);
    wcMessages.scrollTop = wcMessages.scrollHeight;
    return div;
}

// ─── Envoyer un message ───────────────────────────────────────
async function wcSend(text) {
    const message = text || wcInput.value.trim();
    if (!message) return;

    // ✅ Bloquer immédiatement avant tout
    wcSendBtn.disabled = true;
    wcInput.disabled = true;  // ← ajouter

    wcInput.value = '';
    document.getElementById('wc-suggestions').style.display = 'none';

    wcAppend(message, 'user');
    const loader = wcTyping();

    try {
        const res = await fetch(WC_API, {
            method  : 'POST',
            headers : {
                'Content-Type' : 'application/json',
                'X-CSRF-TOKEN' : WC_CSRF,
                'Accept'       : 'application/json',
            },
            body: JSON.stringify({ message }),
        });

        if (!res.ok) throw new Error(`HTTP ${res.status}`);

        const data = await res.json();
        loader.remove();
        wcAppend(data.reply, 'bot', data.products ?? []);

    } catch (err) {
        loader.remove();
        wcAppend('❌ Erreur de connexion. Veuillez réessayer.', 'bot');
        console.error('[Chatbot]', err);
    }

    // ✅ Réactiver après la réponse
    wcSendBtn.disabled = false;
    wcInput.disabled = false;  // ← ajouter
    wcInput.focus();
}

// ─── Sécurité XSS ────────────────────────────────────────────
function escapeHtml(str) {
    return String(str)
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;');
}

// ─── Événements ───────────────────────────────────────────────
wcInput.addEventListener('keydown', e => {
    if (e.key === 'Enter' && !e.shiftKey) {
        e.preventDefault();
        wcSend();
    }
});

// Badge de bienvenue après 3 secondes
setTimeout(() => {
    if (!wcOpen) wcBadge.style.display = 'flex';
}, 3000);