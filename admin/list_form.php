<?php  
    require_once '../functions/functions.php';
    //var_dump($_POST);
    
    
    if(isset($_POST['change_status'])) {
        Change_status();
    }

    if(isset($_POST['remove_task'])) {
        Remove_task();
    }
    
    if(isset($_POST['update_task'])) {
        Update_task();
    }

    if(isset($_POST['btn_add']) && !empty($_POST['new_task'])) {
        Add_Task();
    }
?>