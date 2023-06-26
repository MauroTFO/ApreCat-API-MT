<?php

header("Access-Control-Allow-Origin: *");

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$host = 'localhost';
$db = 'aprecat_db';
$port = 3307;
$user = 'root';
$pass = 'root';

$nome = $data['name']['_value'];
$idade = $data['age']['_value'];

$conn = null;

try {
    $conn = new PDO("mysql:host=$host;port=$port;dbname=$db;charset=utf8", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ecx) {
    echo 'Erro ao se conectar com o banco de dados: ' . $exc->getMessage();
    exit;
}

try {
    $pdoQuery = "INSERT INTO table_cats (CAT_NOME, CAT_IDADE) VALUES (:nome, :idade )";
    $pdoResult = $conn->prepare($pdoQuery);
    $pdoExec = $pdoResult->execute(array(":nome" => $nome, ":idade" => $idade));
    echo 'Data Inserted';
} catch (PDOException $e) {
    echo $e->getMessage();
}



//$result = $con->query('SELECT * FROM table_cats');

//$data = $result->fetchAll(PDO::FETCH_ASSOC);

//echo json_encode($data);
