<?php 
    $result_api;

    

    function Get_API() {
        global $result_api;

        $chanell = curl_init();

        $arr_options = [
            CURLOPT_URL => "http://jsonplaceholder.typicode.com/todos",
            CURLOPT_RETURNTRANSFER => true
        ];
        curl_setopt_array($chanell,$arr_options);

        $result_api = curl_exec($chanell);
        $errors_api = curl_errno($chanell);

        if($errors_api) {
            echo '<h2>Ошибка: '. $errors_api .'. '. curl_error($chanell) .' </h2>';
        }
        
        curl_close($chanell);

        //if(!file_exists('../json/data.json')) {
            file_put_contents('../json/data.json', $result_api);
        //}

       
    }
    
/*  Array
        (
            [0] => Array
                (
                    [userId] => 1
                    [id] => 1
                    [title] => delectus aut autem
                    [completed] => 
                )
*/

    function Get_JSON () {
        if(!file_exists('../json/data.json') || !filesize('../json/data.json')) Get_API();

        $data_str = file_get_contents('../json/data.json');
        $data_json = json_decode($data_str, true);


        //echo '<pre>'; print_r($data_json); echo '</pre>';

        foreach ($data_json as $one) {
               // Обработать значение 'completed', потому что false выводит как пустоту,а true выводит как 1.  
                
                $status = (int)$one['completed'];
                if ($status == 0) $status = 'не выполнена';
                else $status = 'выполнена';

                if ($one['userId'] == $_COOKIE['user_id']) {
                    echo '<form class="list_form" method="POST" action="../admin/list_form.php">
                    <ul>
                    <input type="hidden" name="id_post" value="'. $one['id'] .'" >
                    <li><strong>Номер человека</strong>: '.$one['userId'].'</li>
                    <li><Strong>Номер задачи</strong>: '.$one['id'].'</li>
                    <li><strong>Название задачи</strong>: '.$one['title'].'</li>
                    <li><input '. ((int)$one['completed'] == 1 ? 'checked' : '') .' class="box" type="checkbox" name="id"/><strong>Статус задачи</Strong>: '.$status.'</li>
                    <li>
                    <button name="change_status" class="btn_list">Изменить статус задачи</button>
                    <button name="remove_task" class="btn_list">Удалить задачу</button>
                    <button name="update_task" class="btn_list">Редактировать задачу</button>
                    </li>
                    </ul>
                    </form>';
                }
        }   
        
    }

    function Remove_task() {
        if(file_exists('../json/data.json') || filesize('../json/data.json') > 0) {

            $data_str = file_get_contents('../json/data.json');
            $data_json = json_decode($data_str, true);

            foreach($data_json as &$one) {
                if ($one['id'] == $_POST['id_post']) {
                    unset($one['userId']);
                    unset($one['id']);
                    unset($one['title']);
                    unset($one['completed']);
                }
            }
            
            $result = json_encode($data_json);
            file_put_contents('../json/data.json', $result);
            header('Location: ../pages/user_page.php');
            exit;
        }
    }

    function Change_status() {

        if(file_exists('../json/data.json') || filesize('../json/data.json') > 0) {

            $data_str = file_get_contents('../json/data.json');
            $data_json = json_decode($data_str, true);
            //&
            foreach($data_json as &$one) {
                if ($one['id'] == $_POST['id_post']) {
                //echo 'Привет';
                    
                   if ($_POST['id'] == 'on') {
                        (int)$one['completed'] = 1;
                    } else {
                        (int)$one['completed'] = 0;
                    }
                }
            }
            
            $result = json_encode($data_json);
            file_put_contents('../json/data.json', $result);
            header('Location: ../pages/user_page.php');
            exit;
        }
    }

    function Update_task() {
        echo 'Update';
    }
       

        

        

        

    

?>