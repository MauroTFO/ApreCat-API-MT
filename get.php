<?php
header("Access-Control-Allow-Origin: *");

$nome = $_POST['name'];
$senha = $_POST['age'];

$con = new PDO (
    'mysql:dbname=aprecat;port=3307',
    'root',
    'root'
);

$result = $con->query('SELECT * FROM cats');

$data = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);

?>