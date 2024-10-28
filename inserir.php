<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "exemplo_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $data_nascimento = $_POST['data_nascimento'];
    $nacionalidade = $_POST['nacionalidade'];
    $genero = $_POST['genero'];

    $sql = "INSERT INTO usuarios_novos (nome, data_nascimento, nacionalidade, genero) VALUES ('$nome', '$data_nascimento', '$nacionalidade', '$genero')";

    if ($conn->query($sql) === TRUE) {
        echo "Novo usuário cadastrado com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();

header("Location: index.html");
exit();
?>