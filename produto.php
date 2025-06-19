<?php
$id = $_GET['id'] ?? null;

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'loja_3d');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;

try {
    $conexao_pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);   
    $stmt = $conexao_pdo->query("SELECT * FROM produtos WHERE id = $id");
    $produto = $stmt->fetch();
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
  <link rel="stylesheet" href="style/descricao-produto.css">
  <title>Impressoes 3D do Thiago</title>
</head>
<body>
  <a href="index.php"><p>Home</p></a>
  <?php
    echo "
      <h1 class='titulo'>{$produto['nome']}</h1>
      <div class='info-produto'>
        <img class='imagem-produto' src='{$produto['foto_url']}' alt='Foto de {$produto['nome']}'/>
        <div class='info-produto__descricao'>
          <h2 class='subtitulo'>Descrição</h2>
          <p>{$produto['descricao']}</p>
          <p class='preco'>R$ {$produto['preco']}</p>
          <a class='botao botao-editar' href=''>Editar</a>
          <a class='botao botao-excluir' href=''>Excluir</a>
        </div>
      </div>
    ";
  ?>
</body>
</html>
