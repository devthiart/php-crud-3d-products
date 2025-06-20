<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'loja_3d');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;

$id = $_GET['id'];

try {
    $conexao_pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    $sql = "DELETE FROM produtos WHERE id = :id;";

    $stmt = $conexao_pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    $stmt->execute();
    
} catch (PDOException $erro) {
    echo "<h1 class='erro'>Falha na conexão PDO: " . $erro->getMessage() . "</h1><br>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/mensagens.css">
  <title>Impressoes 3D do Thiago</title>
</head>
<body>
  <nav class="menu">
    <a class="menu__item" href="index.php"><p>Home</p></a>
    <a class="menu__item" href="cadastrar-produto.html"><p>Cadastrar Produto</p></a>
  </nav>

  <div class="container-exclusao">
    <h1>Produto excluído com sucesso.</h1>
    <a href="index.php">Voltar para Home.</a>
  </div>
</body>
</html>
