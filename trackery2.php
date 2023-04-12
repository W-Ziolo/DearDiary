<?php
 
 session_start();
  
 if (!isset($_SESSION['zalogowany']))
 {
     header('Location: logowanie2.php');
     exit();
} else {
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);


    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);



   if (isset($_POST['sleep'])) {
        $fr_sleep = $_POST['sleep'];
        $fr_water = $_POST['water'];
        $fr_mood = $_POST['mood'];


        $tr_id = $_SESSION['id'];

       $rezultat = $polaczenie->query("UPDATE `trackers1` SET `Sleep`='$fr_sleep',`Water`='$fr_water',`Mood`='$fr_mood' WHERE `user_id`= '$tr_id'");
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

</head>
<body>

	<header>
		<a href="#" class="logo"></i><span>Dear Diary</span></a>
		<ul class="navbar" role="tablist">
            <div class="slider"></div>

            <li class="nav-item">
			    <li><a href="profile2.php" role="tab" >Profile</a></li>
            </li>
            
            <li class="nav-item">
			    <li><a href="listy4.php" role="tab">List</a></li>
            </li>
            <li class="nav-item">
			    <li><a href="trackery2.php" role="tab">Trackers</a></li>
            </li>
		</ul>

        <div class="cards">
            <div class="fade tab" role="tabpanel"></div>
            <div class="fade tab" role="tabpanel"></div>
            <div class="fade tab" role="tabpanel"></div>
        </div>



		<div class="main">
            <?php
			echo'<a href="logout.php" class="user"></i>Log out</a>'
			?>
			<div class="bx bx-menu" id="menu-icon"></div>
		</div>
	</header>



    <form method="POST" action="?submitattr">


    <section class="mood">
        <div class="container">
            <div class="title">
                <h2> Mood </h2>
                <p> Rate your mood on a scale from 1 to 5</p>
            </div>

                <fieldset class="range__field">
                    <input class="range" type="range" min="1" max="5" name="mood" id="mood" value="<?=$fr_mood?>">
                    <svg role="presentation" width="100%" height="10" xmlns="http://www.w3.org/2000/svg">
                        <rect class="range__tick" x="0%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="25%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="50%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="75%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="100%" y="3" width="1" height="10"></rect>

                    </svg>
                    <svg role="presentation" width="100%" height="14" xmlns="http://www.w3.org/2000/svg">
                        <text class="range__point" x="0%" y="14" text-anchor="start">1</text>
                        <text class="range__point" x="25%" y="14" text-anchor="middle">2</text>
                        <text class="range__point" x="50%" y="14" text-anchor="middle">3</text>
                        <text class="range__point" x="75%" y="14" text-anchor="middle">4</text>
                        <text class="range__point" x="100%" y="14" text-anchor="end">5</text>

                    </svg>
                </fieldset>

    </section>

<tr>

    <section class="sen">
        <div class="container">
            <div class="title">
                <h2> Sleep </h2>
                <p> How many hours have you slept?</p>
            </div>

                <fieldset class="range__field">
                    <input class="range" type="range" min="0" max="10" name="sleep" id="sleep" value="<?=$fr_sleep?>">
                    <svg role="presentation" width="100%" height="10" xmlns="http://www.w3.org/2000/svg">
                        <rect class="range__tick" x="0%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="10%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="20%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="30%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="40%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="50%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="60%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="70%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="80%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="90%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="100%" y="3" width="1" height="10"></rect>
                    </svg>
                    <svg role="presentation" width="100%" height="14" xmlns="http://www.w3.org/2000/svg">
                        <text class="range__point" x="0%" y="14" text-anchor="start">0</text>
                        <text class="range__point" x="10%" y="14" text-anchor="middle">1</text>
                        <text class="range__point" x="20%" y="14" text-anchor="middle">2</text>
                        <text class="range__point" x="30%" y="14" text-anchor="middle">3</text>
                        <text class="range__point" x="40%" y="14" text-anchor="middle">4</text>
                        <text class="range__point" x="50%" y="14" text-anchor="middle">5</text>
                        <text class="range__point" x="60%" y="14" text-anchor="middle">6</text>
                        <text class="range__point" x="70%" y="14" text-anchor="middle">7</text>
                        <text class="range__point" x="80%" y="14" text-anchor="middle">8</text>
                        <text class="range__point" x="90%" y="14" text-anchor="middle">9</text>
                        <text class="range__point" x="100%" y="14" text-anchor="end">10</text>
                    </svg>
                </fieldset>

    </section>

    <section class="water">
        <div class="container">
            <div class="title">
                <h2> Water </h2>
                <p> How much water have you drunk?</p>
            </div>

                <fieldset class="range__field">
                    <input class="range" type="range" min="0" max="2.5" step="0.5"name="water" id="water" value="<?=$fr_water?>">
                    <svg role="presentation" width="100%" height="10" xmlns="http://www.w3.org/2000/svg">
                        <rect class="range__tick" x="0%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="20%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="40%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="60%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="80%" y="3" width="1" height="10"></rect>
                        <rect class="range__tick" x="100%" y="3" width="1" height="10"></rect>

                    </svg>
                    <svg role="presentation" width="100%" height="14" xmlns="http://www.w3.org/2000/svg">
                        <text class="range__point" x="0%" y="14" text-anchor="start">0</text>
                        <text class="range__point" x="20%" y="14" text-anchor="middle">0.5l</text>
                        <text class="range__point" x="40%" y="14" text-anchor="middle">1l</text>
                        <text class="range__point" x="60%" y="14" text-anchor="middle">1.5l</text>
                        <text class="range__point" x="80%" y="14" text-anchor="middle">2l</text>
                        <text class="range__point" x="100%" y="14" text-anchor="end">2.5l </text>

                    </svg>
                </fieldset>

    </section>
    

    <div class="container">
    <center><button type="submit" name="save" value="Save" >Save</button> </center>
    
    </div>
    </form>
    </tr>
	
	<!--js link--->
	<script type="text/javascript" src="java2.js"></script>




</body>
</html>