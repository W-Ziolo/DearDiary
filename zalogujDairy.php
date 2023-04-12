<?php

session_start();
     
if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))
{
    header('Location: logowanie2.php');
    exit();
}

require_once "connect.php";

$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
if($polaczenie->connect_error!=0)
{
     echo"Error:".$polaczenie->connect_error;
}
else{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    
     
        if ($rezultat = @$polaczenie->query(
        sprintf("SELECT * FROM user WHERE Login='%s'",
        mysqli_real_escape_string($polaczenie,$login))))
        {
            $ilu_userow = $rezultat->num_rows;
                if($ilu_userow==1)
                {
                    $wiersz = $rezultat->fetch_assoc();
                    if(password_verify($haslo,$wiersz['Password']))
                        {


                        $_SESSION['zalogowany'] = true;
                        
                        $_SESSION['user_id'] = $wiersz['user_id'];
                        $_SESSION['Login'] = $wiersz['Login'];
                        $_SESSION['Password'] = $wiersz['Password'];
                        $_SESSION['Name'] = $wiersz['Name'];
                        $_SESSION['Surname'] = $wiersz['Surname'];

                        
                        unset($_SESSION['blad']);
                        $rezultat->free_result();
                        header('Location: profile2.php');
                        }
                    else{
                        $_SESSION['blad'] = '<span style="color:red">Wrong login or password!</span>';
                        header('Location: logowanie2.php');
                    }
                    
            } else {
                 
               $_SESSION['blad'] = '<span style="color:red">Wrong login or password!</span>';
              header('Location: logowanie2.php');
                 
            }
             
        }
         
        $polaczenie->close();
    }

?>