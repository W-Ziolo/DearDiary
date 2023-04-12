<?php
 
 session_start();
  
 if (!isset($_SESSION['zalogowany']))
 {
     header('Location: logowanie2.php');
     exit();
} else {
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

}
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DearDiary</title>
	<link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" type="text/scss" href="style.css">

	<link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

	<link rel="stylesheet"
  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Lobster&display=swap');
    </style>
    <style> @import url('https://fonts.googleapis.com/css2?family=Catamaran&family=Fira+Sans+Condensed:wght@500&family=Lobster&family=Manrope:wght@500&family=PT+Sans:wght@700&display=swap'); </style>



<script defer src="script.js"></script>

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


  <section class="todo">


</section>
<section>
  
<div class="container" style="padding: 4rem;  ">
<center><h1>To do</h1></center>
<div class="main-section">
       <div class="add-section">
          <form action="add.php" method="POST" autocomplete="off">
             <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error'){ ?>
                <input type="text" 
                     name="title" 
                     style="border-color: #ff6666"
                     placeholder="This field is required" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>

             <?php }else{ ?>
              <input type="text" 
                     name="title" 
                     style="font-family: PT Sans, sans-serif;"
                     placeholder="What do you need to do?" />
              <button type="submit">Add &nbsp; <span>&#43;</span></button>
             <?php } ?>
          </form>
       </div>
       <?php 
       $ID = $_SESSION['id'];
          $todos = $conn->query("SELECT * FROM todos WHERE todo_user_id='$ID' ORDER BY id DESC");
       ?>
       <div class="show-todo-section">
            <?php if($todos->rowCount() <= 0){ ?>
                <div class="todo-item">
                    <div class="empty">
                    </div>
                </div>
            <?php } ?>

            <?php while($todo = $todos->fetch(PDO::FETCH_ASSOC)) { ?>
                <div class="todo-item">
                    <span id="<?php echo $todo['id']; ?>"
                          class="remove-to-do">delete</span>
                    <?php if($todo['checked']){ ?> 
                        <input type="checkbox"
                                id="cb1"
                               class="check-box"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               checked />
                        <h2 class="checked"><?php echo $todo['title'] ?></h2>
                    <?php }else { ?>
                        <input type="checkbox" id="cb1"
                               data-todo-id ="<?php echo $todo['id']; ?>"
                               class="check-box" />
                        <h2 style="font-family: PT Sans, sans-serif;"><?php echo $todo['title'] ?></h2>
                    <?php } ?>
                    <br>
                    <small style="font-family: PT Sans, sans-serif;">created: <?php echo $todo['date_time'] ?></small> 
                </div>
            <?php } ?>
       </div>
    </div>
  </div>
</section>




	<!--js link--->
	<script type="text/javascript" src="java2.js"></script>
    <script src="query-3.2.1.min.js"></script>

<script>
    $(document).ready(function(){
        $('.remove-to-do').click(function(){
            const id = $(this).attr('id');
            
            $.post("remove.php", 
                  {
                      id: id
                  },
                  (data)  => {
                     if(data){
                         $(this).parent().hide(600);
                     }
                  }
            );
        });

        $(".check-box").click(function(e){
            const id = $(this).attr('data-todo-id');
            
            $.post('check.php', 
                  {
                      id: id
                  },
                  (data) => {
                      if(data != 'error'){
                          const h2 = $(this).next();
                          if(data === '1'){
                              h2.removeClass('checked');
                          }else {
                              h2.addClass('checked');
                          }
                      }
                  }
            );
        });
    });
</script>
  

</body>
</html>