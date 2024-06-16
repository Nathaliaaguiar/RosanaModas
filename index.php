<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rosana Modas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="logo.png" alt="Rosana Modas" class="logo">
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="cadastroProdutoPg.php">Produtos</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero">
        <div class="container">
            <h2>Moda de Qualidade e Estilo</h2>
            <p>Explore nossa coleção e encontre o look perfeito para você!</p>
            <a href="#cards" class="btn">Ver Coleção</a>
        </div>
    </section>

    <section class="products">
        <div class="container">
            <h3>Nossos Produtos</h3>
            <div class="cards" id="cards">
                <?php
                // Conexão com o banco de dados
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "db_rosanamodas";

                // Criar conexão
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Verificar conexão
                if ($conn->connect_error) {
                    die("Falha na conexão: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <div class='product-card'>
                            <img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "'>
                            <h4>" . htmlspecialchars($row['name']) . "</h4>
                            <p>" . htmlspecialchars($row['description']) . "</p>
                            <p class='price'>$" . htmlspecialchars($row['price']) . "</p>
                            <label for='size-selector'>Tamanho:</label>
                            <select class='size-selector'>
    <option value='selecionar'>selecionar</option>
                                <option value='36'>36</option>
                                <option value='38'>38</option>
                                <option value='40'>40</option>
                                <option value='42'>42</option>
                                <option value='44'>44</option>
                                <option value='46'>46</option>
                                <option value='48'>48</option>
                                <option value='50'>50</option>
                                <option value='52'>52</option>
                            </select>
                            <button class='btn buy-btn'>Comprar</button>
                        </div>";
                    }
                } else {
                    echo "<p>Sem produtos disponíveis.</p>";
                }

                $conn->close();
                ?>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Rosana Modas. Todos os direitos reservados.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/seuusuario" class="social-icon" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="https://www.instagram.com/seuusuario" class="social-icon" target="_blank">
                    <i class="fab fa-instagram-square"></i>
                </a>
                <a href="https://api.whatsapp.com/send?phone=SEUNUMERODOTELEFONE" class="social-icon" target="_blank">
                    <i class="fab fa-whatsapp-square"></i>
                </a>
            </div>
        </div>
    </footer>

    <!-- Modal do Carrinho -->
    <div id="cart-modal" class="modal">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Carrinho de Compras</h2>
            <div id="cart-items"></div>
            <div id="cart-total"></div>
            <button id="checkout-btn" class="btn">Finalizar Compra</button>
        </div>
    </div>

    <script src="script.js"></script>
    <script>
        document.getElementById('checkout-btn').addEventListener('click', function() {
            // Limpar os itens do carrinho
            document.getElementById('cart-items').innerHTML = '';
            document.getElementById('cart-total').innerHTML = '<h3>Total: $0.00</h3>';
            
            // Exibir mensagem de confirmação
            const confirmationMessage = document.createElement('p');
            confirmationMessage.textContent = 'Compra finalizada com sucesso!';
            confirmationMessage.style.color = 'green';
            document.querySelector('.modal-content').appendChild(confirmationMessage);

            // Remover o botão "Finalizar Compra"
            document.getElementById('checkout-btn').style.display = 'none';
        });
    </script>
</body>
</html>
