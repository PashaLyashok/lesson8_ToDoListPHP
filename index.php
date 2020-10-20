<?php require_once 'pages/header.php';
 require_once 'functions/functions.php';?>
<main>
    <div class="container_main">
        <form method="POST" action="admin/form.php">
            <p>Выберите номер аккаунта <input type="number" name ="user_id" min="1" max="10"/></p>
            <button class="btn_main">Выбрать</button>
        </form>
    </div>
</main>
<?php

    //if(function_exists('Get_JSON')) Get_JSON();
    //print_r($_POST);
?>


<?php require_once 'pages/footer.php';?>
    