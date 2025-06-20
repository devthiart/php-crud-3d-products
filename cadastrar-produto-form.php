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
  <nav>
    <a href="index.php"><p>Home</p></a>
  </nav>

  <div class="conteudo">
    <form class="formulario" action="cadastrar-produto.php" method="POST">
      <div class="formulario__campo">
        <label for="nome">Nome do Produto:</label>
        <input type="text" id="nome" name="nome" required>
      </div>
      <div class="formulario__campo">
        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao" rows="4"></textarea>
      </div>
      <div class="formulario__campo">
        <label for="preco">Preço (R$):</label>
        <input type="number" id="preco" name="preco" step="0.01" min="0" required>
      </div>
      <div class="formulario__campo">
        <label for="foto_url">URL da Imagem:</label>
        <input type="text" id="foto_url" name="foto_url">
      </div>
      <input type="submit" value="Cadastrar Produto">
    </form>
  </div>
</body>
</html>
