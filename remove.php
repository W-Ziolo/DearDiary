<?php

if(isset($_POST['id'])){

    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);


    $id = $_POST['id'];

    if(empty($id)){
        echo 0;
     }else {
         $stmt = $conn->prepare("DELETE FROM todos WHERE id=?");
         $res = $stmt->execute([$id]);
 
         if($res){
             echo 1;
         }else {
             echo 0;
         }
         $conn = null;
         exit();
     }
}else {
    header("Location: ../week11.9/listy4.php?mess=error");
}