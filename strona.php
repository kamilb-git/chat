<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
        exit();
    }


    echo '<h1>Siema '.$_SESSION['login'], '!</h1>';
    echo "Ty chuju zajebany";

?>

<br><br><br>

<button onclick="window.location.href='./logout.php'">Wyloguj</button>

</body>
</html>