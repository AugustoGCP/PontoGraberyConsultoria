<?php
    session_start();

    if(isset($_POST['sair'])){
        session_unset();
        //session_destroy();
        header("Location: ../../include/login.php");
        //exit();
    }
?>
    
 
