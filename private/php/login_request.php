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

require_once('config.php');

$db = new Db($username, $password, $database, $hostname);
$connection = $db -> connect();
$email = $_POST['email'];
$password = $_POST['password'];
$password = hash("sha256", $password);
$user = new User();
$result = $user -> find($connection, "user_email", $email);
if(mysqli_num_rows($result) == 0) {
    $response = ['result' => false, 'message' => 'Данный пользователь не зарегистрирован!'];
    echo json_encode($response);
} else {
    while ($obj = $result->fetch_object()) {
        if($password == $obj -> user_password) {
            $_SESSION['user_id'] = $obj -> user_id;
            $response = ['result' => true, 'message' => 'Успех!'];
            echo json_encode($response);
        } else {
            $response = ['result' => false, 'message' => 'Неверный пароль!'];
            echo json_encode($response);
        }
    }
}
 

$db -> close($connection);

?>