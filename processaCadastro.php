<?php
$servername = "localhost"; // substitua pelo seu servidor
$username = "root"; // substitua pelo seu usuário
$password = ""; // substitua pela sua senha
$dbname = "db_rosanamodas"; // substitua pelo nome do seu banco de dados

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Checar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);
    $size = $conn->real_escape_string($_POST['size']);

    // Processo de upload de imagem
    $image = $_FILES['image']['name'];
    $target = "../images/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // Usar prepared statement para evitar SQL injection
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image, size) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssdss", $name, $description, $price, $image, $size);

        if ($stmt->execute()) {
            echo "Produto cadastrado com sucesso!";
        } else {
            echo "Erro: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Falha ao fazer upload da imagem.";
    }
}

$conn->close();
?>