<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();

$db = new SQLite3('database.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $query = "DELETE  from produtos WHERE :id = id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

    $result = $stmt->execute();

    if ($result) {
        header('Location: listar.php');
        exit();
    } else {
        echo "Erro ao excluir.";
    }
}

$product = null;
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * from produtos WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
    $result = $stmt->execute();
    $product = $result->fetchArray(SQLITE3_ASSOC);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Excluir Produto</title>
     <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="topnav" id="menu">
      <a href="listar.php" class="active">Listagem de Produtos</a>
      <a href="editar.php">Editar Produto</a>
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

  
    <h2>Excluir Produto</h2>
    <form action="excluir.php" method="post">
        <label for="id">ID do produto a ser excluído:</label><br>
        <input type="text" id="id" name="id"><br><br>
        <input type="submit" value="Excluir">
    </form>
</body>
</html>


<?php
ob_end_flush();
?>