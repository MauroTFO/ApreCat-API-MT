<?php
header("Access-Control-Allow-Origin: *");

$con = new PDO (
    'mysql:dbname=aprecat;port=3307',
    'root',
    'root'
);

$result = "SELECT * FROM TABLE_CATS";
$stm = $con->query($result);
$data = $stm->fetchAll(PDO::FETCH_ASSOC);

header("Content-Type: Application/json");
echo json_encode($data);

?>