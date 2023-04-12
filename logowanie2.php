<?php
 
    session_start();
     
    if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
    {
        header('Location: profile2.php');
        exit();
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

    <section class="logowanie">
    
        <form action="zalogujDairy.php" method="post">  
            <div class="container">
                <center> <h1> Log in </h1> </center>      
                <label>Username : </label>   
                <input type="text" style="font-family: PT Sans, sans-serif;" placeholder="Enter Username" name="login" required>  
                <label>Password : </label>   
                <input type="password" style="font-family: PT Sans, sans-serif;" placeholder="Enter Password" name="haslo" required>  
                <button type="submit">Login</button>   
    
            </div>   
        </form>    

        <?php
        if(isset($_SESSION['blad']))    echo $_SESSION['blad'];
        ?>      
        </section>
	
	<!--js link--->
	<script type="text/javascript" src="java2.js"></script>

</body>
</html>