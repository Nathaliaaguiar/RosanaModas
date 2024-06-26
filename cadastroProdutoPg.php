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
            <a href="index.php">
                <img src="logo.png" alt="Rosana Modas" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="index.php">Início</a></li>
                    <li><a href="cadastroProdutoPg.php">Produtos</a></li>
                    <li><a href="sobre.html">Sobre</a></li>
                    <li><a href="cadastro.html">Cadastro</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container" id="container">

        <form action="processaCadastro.php" method="POST" enctype="multipart/form-data">
            <h2>Cadastrar Novo Produto</h2>
            <label for="name">Nome do Produto:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Preço:</label>
            <input type="text" id="price" name="price" pattern="^\d+(\.\d{1,2})?$" required title="Insira um valor válido em números">

            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" value="Cadastrar Produto">
        </form>
    </div>

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
</body>

</html>