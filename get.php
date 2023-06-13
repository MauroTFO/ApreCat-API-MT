<?php 

header("Access-Control-Allow-Origin: *");

$email = $_POST['email'];
$nome = $_POST['nome'];
$senha = $_POST['senha'];

$con = new PDO (
    'mysql:dbname=singin-singup;port=3307',
    'root',
    'root'
);

$result = $con->query('SELECT * FROM user');

$data = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>