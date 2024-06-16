<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_rosanamodas";

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

    // Processo de upload de imagem
    $image = $_FILES['image']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);

    // Verificar se o diretório existe, se não, criar
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
        // Usar prepared statement para evitar SQL injection
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $description, $price, $image);

        if ($stmt->execute()) {
            echo "<script>
                    alert('Produto cadastrado com sucesso!');
                    window.location.href = 'index.php';
                  </script>";
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
