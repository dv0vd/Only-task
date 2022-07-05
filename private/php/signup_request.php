<?php

declare(strict_types = 1);

require_once('classes/Db.php');
require_once('classes/User.php');

session_start();

if(isset($_SESSION['user_id'])) {
    $response = ['result' => false, 'message' => 'Вы уже авторизованы!'];
    echo json_encode($response);
    return;
}

if(!isset($_POST['name']) || $_POST['name'] == ""){
    $response = ['result' => false, 'message' => 'Отсутствует имя!'];
    echo json_encode($response);
    return;
}

if(!isset($_POST['email']) || $_POST['email'] == ""){
    $response = ['result' => false, 'message' => 'Отсутствует email!'];
    echo json_encode($response);
    return;
}

if(!isset($_POST['password']) || $_POST['password'] == ""){
    $response = ['result' => false, 'message' => 'Отсутствует пароль!'];
    echo json_encode($response);
    return;
}

if(!isset($_POST['password_repeat']) || $_POST['password_repeat'] == ""){
    $response = ['result' => false, 'message' => 'Отсутствует подтверждение пароля!'];
    echo json_encode($response);
    return;
}

if($_POST['password'] != $_POST['password_repeat']){
    $response = ['result' => false, 'message' => 'Пароль и подтверждение пароля не совпадают!'];
    echo json_encode($response);
    return;
}

require_once('config.php');

$db = new Db($username, $password, $database, $hostname);
$connection = $db -> connect();
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$user = new User();
$user -> setName($name);
$user -> setEmail($email);
$user -> setPassword($password);
$result = $user -> find($connection, "user_email", $email);
if(mysqli_num_rows($result) != 0) {
    $response = ['result' => false, 'message' => 'Данный пользователь уже зарегистрирован!'];
    echo json_encode($response);
} else {
    if($user -> save($connection)) {
        $response = ['result' => true, 'message' => 'Успех!'];
        echo json_encode($response);
    } else {
        $response = ['result' => false, 'message' => 'Возникла непредвиденная ошибка!'];
        echo json_encode($response);
    }
}
$db -> close($connection);

?>