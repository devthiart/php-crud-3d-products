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
  <nav>
    <a href="index.php"><p>Home</p></a>
  </nav>
  <div class="container-exclusao">
    <?php
    $nome = $_GET['nome'];
    $id = $_GET['id'];
    echo "
      <h1>Deseja realmente excluir o produto {$nome}?</h1>
      <div class='container-exclusao__botoes'>
        <a class='botao botao-cancela' href='excluir-produto.php?id={$id}'>Confirmar</a>
        <a class='botao botao-confirma' href='produto.php?id={$id}'>Cancelar</a>
      </div>
    "
    ?>
  </div>
</body>
</html>