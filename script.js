document.addEventListener('DOMContentLoaded', () => {
    const cartIcon = document.getElementById('cart-icon');
    const modal = document.getElementById('cart-modal');
    const closeBtn = document.querySelector('.close-btn');
    const buyBtns = document.querySelectorAll('.buy-btn');
    const cartItemsContainer = document.getElementById('cart-items');
    const cartTotalContainer = document.getElementById('cart-total');
    let cart = [];

    // Evento para abrir o modal do carrinho
    cartIcon.addEventListener('click', () => {
        modal.style.display = 'block';
        renderCartItems();
    });

    // Evento para fechar o modal do carrinho
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Fechar o modal se o usuário clicar fora dele
    window.addEventListener('click', (e) => {
        if (e.target == modal) {
            modal.style.display = 'none';
        }
    });

    // Evento para adicionar produtos ao carrinho
    buyBtns.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const productCard = e.target.closest('.product-card');
            const productName = productCard.querySelector('h4').innerText;
            const productPrice = parseFloat(productCard.querySelector('.price').innerText.replace('$', ''));
            const productImage = productCard.querySelector('img').src;
            const productSize = productCard.querySelector('.size-selector').value;

            if (!productSize) {
                alert("Por favor, selecione um tamanho.");
                return;
            }

            const product = { name: productName, price: productPrice, image: productImage, size: productSize };
            addToCart(product);
        });
    });

    // Adicionar produto ao carrinho
    function addToCart(product) {
        cart.push(product);
        renderCartItems();
    }

    // Renderizar os itens do carrinho
    function renderCartItems() {
        cartItemsContainer.innerHTML = '';
        let total = 0;

        cart.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.className = 'cart-item';
            cartItem.innerHTML = `
                <img src="${item.image}" alt="${item.name}">
                <div>
                    <h4>${item.name}</h4>
                    <p>Tamanho: ${item.size}</p>
                    <p>$${item.price.toFixed(2)}</p>
                    <button class="remove-btn" data-index="${index}">Remover</button>
                </div>
            `;
            cartItemsContainer.appendChild(cartItem);
            total += item.price;
        });

        cartTotalContainer.innerHTML = `<h3>Total: $${total.toFixed(2)}</h3>`;

        // Adicionar eventos de remoção para os botões de remover
        const removeBtns = document.querySelectorAll('.remove-btn');
        removeBtns.forEach((btn) => {
            btn.addEventListener('click', (e) => {
                const index = e.target.getAttribute('data-index');
                removeFromCart(index);
            });
        });
    }

    // Remover produto do carrinho
    function removeFromCart(index) {
        cart.splice(index, 1);
        renderCartItems();
    }
});