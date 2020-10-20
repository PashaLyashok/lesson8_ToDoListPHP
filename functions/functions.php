<?php 
    $result_api;
    $status = 0;

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

        if(!file_exists('../json/data.json')) {
            file_put_contents('../json/data.json', $result_api);
        }

       
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
        Get_API();

        global $status;

        $data_str = file_get_contents('../json/data.json');
        $data_json = json_decode($data_str, true);


        //echo '<pre>'; print_r($data_json); echo '</pre>';

        foreach ($data_json as $one) {
               // Обработать значение 'completed', потому что false выводит как пустоту,а true выводит как 1.  
                global $status;
                $status = (int)$one['completed'];
                if ($status == 0) $status = 'не выполнена';
                else $status = 'выполнена';

                if ($one['userId'] == $_COOKIE['user_id']) {
                    echo '<form class="list_form" method="POST" action="../admin/list_form.php">
                    <ul>
                    <li><strong>Номер человека</strong>: '.$one['userId'].'</li>
                    <li><Strong>Номер задачи</strong>: '.$one['id'].'</li>
                    <li><strong>Название задачи</strong>: '.$one['title'].'</li>
                    <li><input class="box" type="checkbox" name="check"/><strong>Статус задачи</Strong>: '.$status.'<button class="btn_list">Изменить статус задачи</button></li>
                    </ul>
                    </form>';
                }
        }   
        
            //print_r($_POST);
    }

       

        

        

        

    

?>