<?php
 
    session_start();

	require_once "connect.php";
	mysqli_report(MYSQLI_REPORT_STRICT);
	$nick = $_SESSION['Login'];

	$rezultat = $conn->query("SELECT `user_id` FROM `user` WHERE Login = '$nick'");
	while($row = $rezultat->fetch()){
	  $id = $row['user_id'];
	   $_SESSION['id'] = $id;
	 }

	 $rezultat = $conn->query("SELECT `water` FROM `trackers1` WHERE user_id = '$id'");
	 while($row = $rezultat->fetch()){
	   $woda = $row['water'];
		$_SESSION['woda'] = $woda;
	  }

	  $rezultat = $conn->query("SELECT `mood` FROM `trackers1` WHERE user_id = '$id'");
	  while($row = $rezultat->fetch()){
		$mood = $row['mood'];
		 $_SESSION['mood'] = $mood;
	   }

	   $rezultat = $conn->query("SELECT `sleep` FROM `trackers1` WHERE user_id = '$id'");
	   while($row = $rezultat->fetch()){
		 $sen = $row['sleep'];
		  $_SESSION['sen'] = $sen;
		}

		if($mood=='5'){
		$_SESSION['m_mood'] = "You're doing great, keep going";
		}

		if($mood=='4'){
			$_SESSION['m_mood'] = "You're doing great, keep going";
			}
	

		if($mood=='3'){
	$_SESSION['m_mood'] = nl2br("You're not doing well. You can try: \n
	 -Eating vitamin C (citrus fruits, tomatoes, broccoli). Vitamin C is essential for your body to create neurotransmitters that regulate mood and combat depression. \n 
	-“shinrin-yoku” (forest-bathing). A Japanese study discovered that a walk through the woods can alleviate acute emotions such as hostility, depression, and boredom \n
	-Watchnig a cat video. A survey of almost 7,000 people found that people felt more energetic and positive after watching cat videos. The pleasure they got from the videos was greater than the guilt of procrastinating. Dog videos work, too!");
		}
		if($mood=='2'){
	$_SESSION['m_mood'] = nl2br("You're not doing well. There are some tips on how to feel better: \n
	- Snuggle up. Climbing under a soft blanket for a few minutes might make us more relaxed and flexible. Researchers found there’s something about contact with soft things that just makes us feel better.\n
	-Meditate. Meditation is a quick, effective way to chill out and improve our outlook, and it might even make us smarter. Just a few minutes of sitting quietly, focusing on the breath, and maybe chanting a few Oms (silently or out loud) can snap us out of a funk.\n
	-Sleep enough. Without enough quality sleep, our minds and bodies just don’t work as well. In the short term, even after one or two terrible nights’ sleep can affect your memory, judgement and reflexes.\n
	-Seek mental health care.That may be talk therapy, or it may be medication, but getting treatment for a mental malady is just like getting treatment for a physical one.");
		}

		if($mood=='1'){
			$_SESSION['m_mood'] = nl2br("You're not doing well. There are some tips on how to feel better: \n
			- Snuggle up. Climbing under a soft blanket for a few minutes might make us more relaxed and flexible. Researchers found there’s something about contact with soft things that just makes us feel better.\n
			-Meditate. Meditation is a quick, effective way to chill out and improve our outlook, and it might even make us smarter. Just a few minutes of sitting quietly, focusing on the breath, and maybe chanting a few Oms (silently or out loud) can snap us out of a funk.\n
			-Sleep enough. Without enough quality sleep, our minds and bodies just don’t work as well. In the short term, even after one or two terrible nights’ sleep can affect your memory, judgement and reflexes.\n
			-Seek mental health care.That may be talk therapy, or it may be medication, but getting treatment for a mental malady is just like getting treatment for a physical one.");
				}




		if($sen=='1' || $sen=='2' || $sen=='3' || $sen=='4'|| $sen=='0'){
		$_SESSION['m_sen'] = nl2br("Frequently having trouble sleeping can be a frustrating and debilitating experience. You sleep badly at night, which leaves you feeling dead-tired in the morning and whatever energy you have quickly drains throughout the day. But then, no matter how exhausted you feel at night, you still have trouble sleeping. And so the cycle begins again. \n
		Everyone experiences occasional sleeping problems, so how can you tell whether your difficulty is just a minor, passing annoyance or a sign of a more serious sleep disorder or underlying medical condition?\n
		-Feel irritable or sleepy during the day?\n
		-React slowly?\n
		-Have trouble controlling your emotions?\n
		If you are experiencing any of the above symptoms on a regular basis, you may be dealing with a sleep disorder.");
		}

		if($sen=='5' || $sen=='6' || $sen=='7'){
	$_SESSION['m_sen'] = nl2br("Trouble sleeping? If you're having sleep problems, there are simple steps you can take to improve your sleep hygiene, get into a daily routine and ease those restless nights.\n
			-Keep regular sleep hours\n
			-Create a restful environment\n
			-Write down your worries\n
			-Move more, sleep better\n
			-Relax before bed \n
			-Avoid staying up late for 'me time'");
		}

if ($sen == '8' || $sen == '9' || $sen == '10') {
	$_SESSION['m_sen'] = nl2br("You're doing great, keep going");
}

if ($woda == '0' || $woda == '0.5' || $woda == '1') {
	$_SESSION['m_woda'] = nl2br("Side Effects Of Not Drinking Enough Water\n
	-Persistent headaches. One of the first things you might notice when you’re dehydrated is a throbbing headache.\n
	-Dull skin. Dehydration shows up on your face in the form of dry, ashy skin that seems less radiant, plump and elastic.\n
	-Weight gain.\n
	-Dry mouth. If you’re not getting enough water, you can have dry mucous membranes—i.e., a lack of saliva. \n
	-You Might Feel Low Energy");
}

if ($woda == '1.5' || $woda == '2' || $woda == '2.5') {
	$_SESSION['m_woda'] = nl2br("Staying well hydrated is incredibly important, as water is needed for a variety of bodily processes and central to nearly every aspect of health and wellness. Pros of drinking water: \n
	-Increasing your water intake may aid weight loss.\n
	-Some research suggests that drinking more water can help keep your skin supple and smooth.\n
	-Kidney stone prevention.\n
	-Mood improvement.");
}


     
    if (!isset($_SESSION['zalogowany']))
    {
        header('Location: logowanie2.php');
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


    <section class="section-padding">
		<div class="container1">
			<div class="row">

				<div class="zalogowany">
				
				<div class="container">
				<?php
					echo "<h1>Welcome ". $_SESSION['Name']." ". $_SESSION['Surname']. "! </h1>";
					 	?>

				</div>

				

				</div>
			</div>
		</div>
	</section>

	<section>
				<div class="container">
				<?php
					echo "<h1>Your today's mood:  ". $_SESSION['mood']."/5 </h1>\n";
					echo '<span style="font-family: PT Sans, sans-serif;">'.$_SESSION['m_mood'];
					 	?>

				</div>
</br>

			<div class="container">
			<?php
					echo "<h1>You have slept  ". $_SESSION['sen']." hours </h1>";

					echo '<span style="font-family: PT Sans, sans-serif;">'.$_SESSION['m_sen'];
					 	?>

			</div>

			</br>

			<div class="container">
			<?php
					echo "<h1>You have drunk  ". $_SESSION['woda']." liters of water</h1>";
					echo '<span style="font-family: PT Sans, sans-serif;">'.$_SESSION['m_woda'];
					 	?>

			</div>
		</section>
	
	<!--js link--->
	<script type="text/javascript" src="java2.js"></script>

</body>
</html>