<?php

if(isset($_POST['id'])){
    require_once "connect.php";
    mysqli_report(MYSQLI_REPORT_STRICT);

    $id = $_POST['id'];

    if(empty($id)){
        echo 'error';
     }else {
         $todos = $conn->prepare("SELECT id, checked FROM todos WHERE id=?");
         $todos->execute([$id]);
 
         $todo = $todos->fetch();
         $uId = $todo['id'];
         $checked = $todo['checked'];
 
         $uChecked = $checked ? 0 : 1;
 
         $res = $conn->query("UPDATE todos SET checked=$uChecked WHERE id=$uId");
 
         if($res){
             echo $checked;
         }else {
             echo "error";
         }
         $conn = null;
         exit();
     }
}else {
    header("Location: ../week11.9/listy4.php?mess=error");
}