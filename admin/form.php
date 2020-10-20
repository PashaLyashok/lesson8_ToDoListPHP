<?php 
    //print_r($_POST);
    if(!empty($_POST['user_id'])) { 
        setcookie('user_id', $_POST['user_id'], time() + 3600, '/');
        header('Location: ../pages/user_page.php');
    }
?>