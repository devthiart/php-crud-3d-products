<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'loja_3d');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;

try {
    $conexao_pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    echo "<p>Conexão PDO realizada com sucesso!</p><br>";
    
    $stmt = $conexao_pdo->query("SELECT * FROM produtos");
    $produtos = $stmt->fetchAll();
} catch (PDOException $erro) {
    echo "<h1 class='erro'>Falha na conexão PDO: " . $erro->getMessage() . "</h1><br>";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impressoes 3D do Thiago</title>
</head>
<body>
  <h1>Bem vindo a loja de impressões 3D to Thiago!</h1>
  <h2>Lista de produtos</h2>
  <?php
    echo '<ul>';
    foreach($produtos as $produto) {
      echo "
        <li>
          <a href='produto.php?id={$produto['id']}'>
            <p>{$produto['nome']}</p>
            <img src='{$produto['foto_url']} alt='Foto de {$produto['nome']}'/>
            <p>R$ {$produto['preco']}</p>
          </a>
        </li>
      ";
    }
    echo '</ul>';
  ?>
</body>
</html>