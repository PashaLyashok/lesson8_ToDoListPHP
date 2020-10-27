<?php 
 require_once '../functions/functions.php';
 require_once 'header.php';?>
   

<?php 
echo '<form class="add_form" action="../admin/list_form.php" method="POST">
            <p><Strong>Введите вашу задачу</strong>: <input name="new_task"/></p>
            <input type="hidden" name="new_postId" value="'. uniqid() .'" />
            <button name="btn_add">Добавить</button>
            </form>';
if(function_exists('Get_JSON')) Get_JSON();?>

<?php require_once 'footer.php';?>