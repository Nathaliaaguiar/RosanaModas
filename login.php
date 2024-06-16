<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Rosana Modas</title>
    <link rel="stylesheet" href="login.css">
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
                    <li><a href="cadastro.html">Cadastro</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="#" id="cart-icon"><i class="fas fa-shopping-cart"></i></a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="login">
        <div class="container">
            <form action="login-process.php" method="POST">
                <h2>Login</h2>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Senha:</label>
                <input type="password" id="password" name="password" required>

                <input type="submit" value="Entrar">
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Rosana Modas. Todos os direitos reservados.</p>
            <div class="social-icons">
                <a href="https://www.facebook.com/seuusuario" class="social-icon" target="_blank">
                    <i class="fab fa-facebook-square"></i>
                </a>
                <a href="https://www.twitter.com/seuusuario" class="social-icon" target="_blank">
                    <i class="fab fa-twitter-square"></i>
                </a>
                <a href="https://www.instagram.com/seuusuario" class="social-icon" target="_blank">
                    <i class="fab fa-instagram-square"></i>
                </a>
            </div>
        </div>
    </footer>
</body>
</html>