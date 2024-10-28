<?php
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "exemplo_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id, nome, data_nascimento, nacionalidade, genero FROM usuarios_novos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $data_nascimento_formatada = date("d-m-Y", strtotime($row["data_nascimento"]));
        
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["nome"] . "</td>
                <td>" . $data_nascimento_formatada . "</td>
                <td>" . $row["nacionalidade"] . "</td>
                <td>" . $row["genero"] . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>Nenhum usuário encontrado.</td></tr>";
}

$conn->close();
?>