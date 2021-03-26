<?php

require_once __DIR__. '/config.php';

class API {

    function Select(){
    $db = new Connect;
    $users = array();
    $data = $db -> prepare('SELECT * FROM users ORDER BY id');
    while($OutputData = $data -> fetch(PDO :: FETCH_ASSOC)){
            $users[$OutputData['id']] = array(
                'id' =>$OutputData['id'],
                'name' =>$OutputData['name'],
                'username' =>$OutputData['username'],
                'email' => $OutputData['email']
            );
        }
        return json_encode($users);
    }
}


$api = new API;
header('Content-Type: application/json');
echo $API -> Select();
?>