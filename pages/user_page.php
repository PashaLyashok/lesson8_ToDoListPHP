<?php require_once 'header.php';
    require_once '../functions/functions.php';?>

<?php 
 if(isset($_COOKIE['user_id'])) Show_AddForm();
 if(function_exists('Show_AddForm') && !empty($_POST['new_task']) && isset($_POST['btn_add'])) Add_Task();
if(function_exists('Get_JSON')) Get_JSON();?>

<?php require_once 'footer.php';?>