<?php

    session_start();
    
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "chat";

    
    if(!isset($_POST['login']) || !isset($_POST['haslo']))
    {
        header('Location: log.php');
        exit();
    }


    $connect = @new mysqli($host,$user,$password,$db);

    if($connect->connect_errno != 0)
    {
        echo "Błąd: ".$connect->connect_erno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $login = htmlentities($login , ENT_QUOTES, "UTF-8");
        $haslo = htmlentities($haslo , ENT_QUOTES, "UTF-8");

        

        if($result = @$connect->query(
            sprintf("SELECT * FROM users WHERE login = '%s' AND haslo = '%s'",
            mysqli_real_escape_string($connect, $login),
            mysqli_real_escape_string($connect, $haslo)
            )
        ))
        {
            $numofrows = $result->num_rows;

            if($numofrows == 1)
            {
                $_SESSION['zalogowany'] = true;
                
                $row = $result->fetch_assoc();
                
                $_SESSION['id'] = $row['id'];
                $_SESSION['login'] = $row['login'];
                

                unset($_SESSION['blad']);

                $result->free_result();
                header('Location: room.php');

            }
            else
            {
                $_SESSION['blad'] = '<br><div class="err" style="color:red">Nieprawidłowy login lub hasło!</div>';
                header('Location: log.php');
            }
        }

        $connect->close();
    }
    

    


?>