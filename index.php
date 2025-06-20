<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'loja_3d');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;

try {
    $conexao_pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);

    $sql = "SELECT * FROM produtos";    
    $stmt = $conexao_pdo->query($sql);
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
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/lista-produtos.css">
  <title>Impressoes 3D do Thiago</title>
</head>
<body>
  <h1 class="titulo">Bem vindo a loja de impressões 3D do Thiago!</h1>
  <h2 class="subtitulo">Lista de produtos</h2>
  <a class="link-novo-produto" href="cadastrar-produto.html"><p>Cadastrar novo produto</p></a>
  <ul class="lista-produtos">
  <?php
    foreach($produtos as $produto) {
      echo "
        <li class='card-produto'>
          <a href='produto.php?id={$produto['id']}'>
            <img class='card-produto__foto' src='{$produto['foto_url']} alt='Foto de {$produto['nome']}'/>
            <p class='card-produto__nome'>{$produto['nome']}</p>
            <p class='card-produto__preco preco'>R$ {$produto['preco']}</p>
          </a>
        </li>
      ";
    }
  ?>
  </ul>
</body>
</html>