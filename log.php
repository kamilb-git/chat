<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylel.css">
    <title>Logowanie</title>
</head>
<body>

    <div class="main"> 
        
   <p class="sign"> Zaloguj się </p>

    <form action="login.php" method="post" class="form1">
    
        <input type="text" name="login" class="un" autocomplete="off" placeholder="Login"> <br> 
        <input type="password" name="haslo" class="pass" placeholder="Hasło"> <br> <br>
        <input type="submit" class="submit" value="Zaloguj się">
    
    </form>
    
    <?php
    
    session_start();

    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany'] == true))
    {
        header('Location: index.php');
        exit();
    }
    
    if(isset($_SESSION['blad'])) echo $_SESSION['blad'];
    
    ?>
    
</div> 



    
</body>
</html>