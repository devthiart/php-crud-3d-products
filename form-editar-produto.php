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
  <link rel="stylesheet" href="style/formulario.css">
  <title>Impressoes 3D do Thiago</title>
</head>
<body>
  <nav class="menu">
    <a class="menu__item" href="index.php"><p>Home</p></a>
    <a class="menu__item" href="cadastrar-produto.html"><p>Cadastrar Produto</p></a>
  </nav>

  <div class="conteudo">
    <form class="formulario" action="editar-produto.php" method="POST">
      <?php
      echo"
        <input type='text' id='id' name='id' value={$produto['id']} required readonly hidden>
        <div class='formulario__campo'>
          <label for='nome'>Nome do Produto:</label>
          <input type='text' id='nome' name='nome' value=\"{$produto['nome']}\" required>
        </div>
        <div class='formulario__campo'>
          <label for='descricao'>Descrição:</label>
          <textarea id='descricao' name='descricao' rows='4'>{$produto['descricao']}</textarea>
        </div>
        <div class='formulario__campo'>
          <label for='preco'>Preço (R$):</label>
          <input type='number' id='preco' name='preco' step='0.01' min=0' value={$produto['preco']} required>
        </div>
        <div class='formulario__campo'>
          <label for='foto_url'>URL da Imagem:</label>
          <input type='text' id='foto_url' name='foto_url' value={$produto['foto_url']}>
        </div>
      "
      ?>
      <input type="submit" value="Editar Produto">
    </form>
  </div>
</body>
</html>
