<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Cadastrar Novo Produto</h2>
        <form action="processaCadastro.php" method="POST" enctype="multipart/form-data">
            <label for="name">Nome do Produto:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Descrição:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Preço:</label>
            <input type="text" id="price" name="price" required>

            <label for="image">Imagem:</label>
            <input type="file" id="image" name="image" required>

            <label for="size">Tamanho:</label>
            <input type="text" id="size" name="size" required>

            <input type="submit" value="Cadastrar Produto">
        </form>
    </div>
</body>
</html>