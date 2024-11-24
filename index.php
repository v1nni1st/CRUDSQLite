<!DOCTYPE html>
<html>
<head>
    <title>Criar Novo Produto</title>
    <link rel="stylesheet" href="style.css" />
  
</head>
<body>
  
  <nav class="topnav" id="menu">
      <a href="listar.php" class="active">Listagem de Produtos</a>
      <a href="editar.php">Editar Produto</a>
       <a href="excluir.php">Excluir Produto</a>
          <span>
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
          </span>
      </a>
  </nav>
  <br><br>
  <br><br>
  
     <div class="container">
       <div class="box">
         <form action="adicionar_produtos.php" method="post">

          <h2 style="color: orange">Lanchonete Novo Produto</h2>

          <label for="nome">Nome do Produto:</label><br>

          <input type="text" id="nome" name="nome"><br><br>

          <label for="descricao">Descrição:</label><br>

          <input type="text" id="descricao" name="descricao"><br><br>

          <label for="preco">Preço:</label><br>

          <input type="text" id="preco" name="preco"><br><br>

          <input type="submit" value="Adicionar Produto">

          </form>
          <br>
          <div style="text-align: center;">
          <form action="listar.php" method="get">
            <input type="submit" value="Lista de Produtos">
          </form>

         
       </div>
     </div>

  
    
</body>
</html>