<?php

session_start();
     

    if (isset($_POST['title'])) {

        require_once "connect.php";
        mysqli_report(MYSQLI_REPORT_STRICT);

        $title = $_POST['title'];

        if (empty($title)) {
            header("Location: ../week11.5/listy4.php?mess=error");
        } else {
        $us_id = $_SESSION['id'];

            $stmt = $conn->prepare("INSERT INTO todos(title, todo_user_id) VALUE(?, $us_id)");
            $res = $stmt->execute([$title]);




            if ($res) {
                header("Location: ../week11.9/listy4.php?mess=success");
            } else {
                header("Location: ../week11.9/listy4.php");
            }
            $conn = null;
            exit();
        }
    }
    ?>