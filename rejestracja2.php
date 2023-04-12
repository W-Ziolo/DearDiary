<?php


    session_start();
     
    if (isset($_POST['nick']))
    {
        //Udana walidacja? Załóżmy, że tak!
        $wszystko_OK=true;
         
        //Sprawdź poprawność nickname, imienia  nazwiska
        $nick = $_POST['nick'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
         
        //Sprawdzenie długości nicka
        if ((strlen($nick)<3) || (strlen($nick)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']='<span style="color:red">Username must containt 3-20 characters</span>';
        }
         //Sprawdzanie czy nick nie ma zakazanych znaków
        if (ctype_alnum($nick)==false)
        {
            $wszystko_OK=false;
            $_SESSION['e_nick']= '<span style="color:red">Username must be alphanumeric</span>';
        }
  
         
        //Sprawdź poprawność hasła
        $psw1 = $_POST['psw1'];
        $psw2 = $_POST['psw2'];
         
        if ((strlen($psw1)<8) || (strlen($psw1)>20))
        {
            $wszystko_OK=false;
            $_SESSION['e_psw']='<span style="color:red">Password must containt 8-20 characters</span>';
        }
         
        if ($psw1!=$psw2)
        {
            $wszystko_OK=false;
            $_SESSION['e_psw']='<span style="color:red">Password must be the same</span>';;
        }   
 
        $psw_hash = password_hash($psw1, PASSWORD_DEFAULT);
         
             
         
        //Zapamiętaj wprowadzone dane
        $_SESSION['fr_nick'] = $nick;
        $_SESSION['fr_name'] = $name;
        $_SESSION['fr_lastname'] = $lastname;
        $_SESSION['fr_psw1'] = $psw1;
        $_SESSION['fr_psw2'] = $psw2;
         
        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);
         
        try
        {
            $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
            if ($polaczenie->connect_error!=0)
            {
                throw new Exception(mysqli_connect_error());
            }
            else
            {
 
                //Czy nick jest już zarezerwowany?
                $rezultat = $polaczenie->query("SELECT *FROM `user` WHERE Login='$nick'");
                if (!$rezultat) throw new Exception($polaczenie->error);
                 
                $ile_takich_nickow = $rezultat->num_rows;
                if($ile_takich_nickow>0)
                {
                    $wszystko_OK=false;
                    $_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
                }
                 
                if ($wszystko_OK==true)
                {
                    //Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
                     
                    if ($polaczenie->query("INSERT INTO `user`(`user_id`, `Login`, `Password`, `Name`, `Surname`) VALUES (NULL,'$nick','$psw_hash','$name','$lastname')"))
                    {
                        $_SESSION['udanarejestracja']=true;
                        header('Location: logowanie2.php');

                       $rezultat = $polaczenie->query("SELECT `user_id` FROM `user` WHERE Login = '$nick'");
                       while($row = $rezultat->fetch_assoc()){
                         $id = $row['user_id'];
                          $_SESSION['id'] = $id;
                        }

                      $rezultat = $polaczenie->query("INSERT INTO `trackers1`(`user_id`, `Sleep`, `Water`, `Mood`) VALUES ('$id','','','')");
                      $rezultat = $polaczenie->query("INSERT INTO `todos`(`id`, `todo_user_id`, `title`, `date_time`, `checked`) VALUES ('','$id','','','')");


                        
                    }
                    else
                    {
                        throw new Exception($polaczenie->error);
                    }

              $_SESSION['uid'] = $row['user_id'];
                    
                     
                }
                 
                $polaczenie->close();
            }
            $id = "SELECT 'user_id' FROM `user` WHERE Login='$nick'";
            
             
        }
        catch(Exception $e)
        {
            echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
            echo '<br />Informacja developerska: '.$e;
        }
         
    }
     
     
?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DearDiary</title>
	<link rel="stylesheet" type="text/css" href="style2.css">

	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>
    <style> @import url('https://fonts.googleapis.com/css2?family=Catamaran&family=Fira+Sans+Condensed:wght@500&family=Lobster&family=Manrope:wght@500&family=PT+Sans:wght@700&family=Rubik&display=swap'); </style>

</head>
<body>

	<header>
		<a href="#" class="logo"></i><span>Dear Diary</span></a>

        <div class="cards">
            <div class="fade tab" role="tabpanel"></div>
            <div class="fade tab" role="tabpanel"></div>
            <div class="fade tab" role="tabpanel"></div>
        </div>



		<div class="main">
			<a href="logowanie2.php" class="user"><i class="ri-user-fill"></i>Sign In</a>
			<a href="rejestracja2.php">Register</a>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>

	<section class="rejestracja">

          <form class="modal-content" method="post">
            <div class="container">
              <h1>Sign Up</h1>
              <p style="font-family: PT Sans, sans-serif;">Please fill in this form to create an account.</p>
              <hr>
              <label for="usernanme"><b>Username</b></label>
              <input type="text" style="font-family: PT Sans, sans-serif;" placeholder="Enter usernanme" value="<?php
            if (isset($_SESSION['fr_nick']))
            {
                echo $_SESSION['fr_nick'];
                unset($_SESSION['fr_nick']);
            }
        ?>" name="nick">
              <?php
                if(isset($_SESSION['e_nick']))
                {
                  echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
                  unset($_SESSION['e_nick']);
                }
              ?>
        
              <label for="name"><b>Name</b></label>
              <input type="text" style="font-family: PT Sans, sans-serif;" placeholder="Enter your name" value="<?php
            if (isset($_SESSION['fr_name']))
            {
                echo $_SESSION['fr_name'];
                unset($_SESSION['fr_name']);
            }
        ?>" name="name">
        
              <label for="lastname"><b>Last Name</b></label>
              <input type="text" style="font-family: PT Sans, sans-serif;" placeholder="Enter your last name" value="<?php
            if (isset($_SESSION['fr_lastname']))
            {
                echo $_SESSION['fr_lastname'];
                unset($_SESSION['fr_lastname']);
            }
        ?>"name="lastname">
        
              <label for="psw"><b>Password</b></label>
              <input type="password" style="font-family: PT Sans, sans-serif;" placeholder="Enter password" value="<?php
            if (isset($_SESSION['fr_psw1']))
            {
                echo $_SESSION['fr_psw1'];
                unset($_SESSION['fr_psw1']);
            }
        ?>" name="psw1">
              <?php
                if(isset($_SESSION['e_psw']))
                {
                  echo '<div class="error">'.$_SESSION['e_psw'].'</div>';
                  unset($_SESSION['e_psw']);
                }
              ?>
        
              <label for="psw-repeat"><b>Repeat Password</b></label>
              <input type="password" style="font-family: PT Sans, sans-serif;" placeholder="Repeat password" name="psw2" value="<?php
            if (isset($_SESSION['fr_psw2']))
            {
                echo $_SESSION['fr_psw2'];
                unset($_SESSION['fr_psw2']);
            }
        ?>" name="psw2">
        
              <div class="clearfix">
                <button type="submit" class="signup">Sign Up</button>
              </div>
            </div>
          </form>

        </section>
        

	<!--js link--->
	<script type="text/javascript" src="java2.js"></script>

</body>
</html>