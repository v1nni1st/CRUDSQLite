<!DOCTYPE html>
<html>
<head>
  <title>Listagem de Produtos</title>
  <link rel="stylesheet" href="style.css" 

</head>

<body>
  <nav class="topnav" id="menu">
      <a href="listar.php" class="active">Listagem de Produtos</a>
      <a href="excluir.php">Excluir Produto</a>
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

  <h2 style="text-align: center;">Listagem de Produtos</h2>

  <table style="margin: 0 auto;">
    <tr>
      <th>ID</th>
      <th>Nome do Produto</th>
      <th>Descrição</th>
      <th>Preços</th>
    </tr>

    <?php
    $db = new sqlite3('database.db');

    $query = "SELECT * FROM produtos";
    $result = $db->query($query);

    while ($row = $result->fetchArray()) {

      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['nome'] . "</td>";
      echo "<td>" . $row['descricao'] . "</td>";
      echo "<td>" . $row['preco'] . "</td>";
      echo "</tr>";
    }

    $db->close();
    ?>

  </table>

  <br>
  <div style="text-align: center;">
    <form action="editar.php" method="get">
      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="submit" value="Editar Produto">
    </form>
  </div>

</body>
</html>