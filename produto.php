<?php
$id = $_GET['id'];

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'loja_3d');

$dsn = "mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME;

try {
    $conexao_pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD); 
    
    $sql = "SELECT * FROM produtos WHERE id = :id";

    $stmt = $conexao_pdo->prepare($sql);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    $stmt->execute();

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
  <nav class="menu">
    <a class="menu__item" href="index.php"><p>Home</p></a>
    <a class="menu__item" href="cadastrar-produto.html"><p>Cadastrar Produto</p></a>
  </nav>
  
  <?php
    echo "
      <h1 class='titulo'>{$produto['nome']}</h1>
      <div class='info-produto'>
        <img class='imagem-produto' src='{$produto['foto_url']}' alt='Foto de {$produto['nome']}'/>
        <div class='info-produto__descricao'>
          <h2 class='subtitulo'>Descrição</h2>
          <p>{$produto['descricao']}</p>
          <p class='preco'>R$ {$produto['preco']}</p>
          <a class='botao botao-confirma' href='form-editar-produto.php?id={$produto['id']}'>Editar</a>
          <a class='botao botao-cancela' href='confirma-excluir-produto.php?nome={$produto['nome']}&id={$produto['id']}'>Excluir</a>
        </div>
      </div>
    ";
  ?>
</body>
</html>
