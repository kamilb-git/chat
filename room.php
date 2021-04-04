<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styler.css">
    <title>Rooms</title>
</head>
<body>

<div class="main">

<form action="room.php" method="post" class="form">

<!-- <input type="radio" id="one" name="room" value="one">
  <label for="one">Pokój 1</label><br>

<input type="radio" id="two" name="room" value="two">
  <label for="two">Pokój 2</label><br>

<input type="radio" id="three" name="room" value="three">
  <label for="three">Pokój 3</label><br>


<br><br>

<input type="submit" class="submit" value="Wybierz"> -->



<h1>Wybierz pokój</h1>
  <label>
    <input type="radio" id="one" name="room" value="one"/>
    <i></i>
    <span class="si">Pokój 1</span>
  </label>
  <label>
    <input type="radio" id="one" name="room" value="two"/>
    <i></i>
    <span>Pokój 2</span>
  </label>
  <label>
    <input type="radio" id="one" name="room" value="three"/>
    <i></i>
    <span>Pokój 3</span>
  </label>


  <input type="submit" class="submit" value="Wybierz">


</form>

</div>




<?php

session_start();

if(!isset($_SESSION['zalogowany']))
{
    header('Location: log.php');
    exit();
}
else
{

    @$wynik = $_POST['room'];

    if($wynik == "one")
    {
        $_SESSION['table'] = "room1";
        header('Location: index.php');
    }
    else if($wynik == "two")
    {
        $_SESSION['table'] = "room2";
        header('Location: index.php');
    }
    else if($wynik == "three")
    {
        $_SESSION['table'] = "room3";
        header('Location: index.php');
    }

}

?>
    
</body>
</html>