<?php

session_start();

$db = new mysqli("localhost", "root", "", "chat");

//$_SESSION['table'] = "messages";
$table = $_SESSION['table'];


if($db->connect_error)
{
    die("Błąd połączenia z bazą: " . $db->connect_error);
}

$result = array();
$message = isset($_POST['message']) ? $_POST['message'] : null;
$imie = isset($_SESSION['login']) ? $_SESSION['login'] : null;

if(!empty($message) && !empty($imie))
{
    $sql = "INSERT INTO $table (`wiadomosc`, `imie`) VALUES ('".$message."', '".$imie."')";
    $result['send_status'] = $db->query($sql);
}

//wyswietlanie
$start = isset($_GET['start']) ? intval($_GET['start']) : 0;
$select = $db->query("SELECT * FROM $table WHERE `id` > " . $start);

while($row = $select->fetch_assoc())
{
    $result['select'][] = $row;
}

$db->close();

header('Access-Control-Allow-Orgin: *');
header('Content-Type: application/json');

echo json_encode($result);


?>