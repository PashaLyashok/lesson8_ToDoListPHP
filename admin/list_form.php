<?php  
    require_once '../functions/functions.php';
    global $status;
    //print_r($_POST);
    //echo $status;
    
    if (!empty($_POST['check']) && $status == 0) {
        $status = 1;
        header('Location: ../pages/user_page.php');
    }

    if (!empty($_POST['check']) && $status == 1) {
        $status = 0;
       header('Location: ../pages/user_page.php');
    }

    if (empty($_POST['check'])) {
        header('Location: ../pages/user_page.php');
    }
?>