<?php

    session_start();

    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: log.php');
        exit();
    }

    if(!isset($_SESSION['table']))
    {
        header('Location: room.php');
        exit();
    }

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Chat</title>
</head>

<body>

   <div class="top"><button class="logout" onclick="window.location.href='./logout.php'">Wyloguj</button></div>
    <div id="messages"> </div> 
    
    <form>
        <input type="text" id="message" autocomplete="off" autofocus placeholder=". . .">
        <input type="submit" class="submit" value="Wyślij">
    </form>

    
    <script>
        var nick = '<?php echo $_SESSION['login'] ?>';
    </script> 
    
    <script src="app.js"></script> 



</body>

</html>

