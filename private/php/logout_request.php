<?php

declare(strict_types = 1);

require_once('classes/Db.php');
require_once('classes/User.php');

session_start();

if(!isset($_SESSION['user_id'])) {
    $response = ['result' => false, 'message' => 'Вы не авторизованы!'];
    echo json_encode($response);
    return;
}

if(session_destroy()){
    $response = ['result' => true, 'message' => 'Успех!'];
    echo json_encode($response);
} else {
    $response = ['result' => false, 'message' => 'Произошла непредвиденная ошибка!'];
    echo json_encode($response);
}

?>