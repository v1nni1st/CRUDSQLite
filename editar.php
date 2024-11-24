<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

$db = new SQLite3('database.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    $query = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':descricao', $descricao);
    $stmt->bindValue(':preco', $preco);
    $stmt->bindValue(':id', $id);

    $result = $stmt->execute();
}

$product = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM produtos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id);
    $result = $stmt->execute();
    $product = $result->fetchArray(SQLITE3_ASSOC);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="topnav" id="menu">
      <a href="listar.php" class="active">Listagem de Produtos</a>
      <a href="editar.php">Editar Produto</a>
       <a href="criar.php">Adicionar Novo Produto</a>
          <span>
              <span class="line"></span>
              <span class="line"></span>
              <span class="line"></span>
          </span>
      </a>
  </nav>
  <br><br>
  <br><br> 
  <br><br>

  
    <h2>Editar Produto</h2>
    <form action="editar.php" method="post">
      <label for="nome">ID:</label><br>
      <input type="text" id="id" name="id" value="<?php echo isset($product['id']) ? $product['id'] : ''; ?>"><br><br>
        <label for="nome">Nome do Produto:</label><br>
        <input type="text" id="nome" name="nome" value="<?php echo isset($product['nome']) ? $product['nome'] : ''; ?>"><br><br>

        <label for="descricao">Descrição:</label><br>
        <input type="text" id="descricao" name="descricao" value="<?php echo isset($product['descricao']) ? $product['descricao'] : ''; ?>"><br><br>

        <label for="preco">Preço:</label><br>
        <input type="text" id="preco" name="preco" value="<?php echo isset($product['preco']) ? $product['preco'] : ''; ?>"><br><br>

        <input type="submit" value="Atualizar Produto">
        </form>
        <br><br>
  
        <form action="excluir.php" method="get">
        <input type="submit" value="Excluir produtos">
        </form>
  
</body>
</html>

<?php
ob_end_flush();
?>