<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $db_path = "database.db";
  $db = new SQLite3($db_path);

  $nome = $_POST['nome'];
  $descricao = $_POST['descricao'];
  $preco = $_POST['preco'];

  $query = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', '$preco')";
  $db->exec($query);

  $db->close();
  header("Location: criar.php"); // redireciona para a página inicial
  exit();
}
?>