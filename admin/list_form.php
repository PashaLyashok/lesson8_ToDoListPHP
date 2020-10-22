<?php  
    require_once '../functions/functions.php';
    //var_dump($_POST);
    
    
    if($_POST['change_status'] === '') {
        Change_status();
    }

    if($_POST['remove_task'] === '') {
        Remove_task();
    }
    
    if($_POST['update_task'] === '') {
        Update_task();
    }
?>