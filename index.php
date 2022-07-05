<?php

$title = 'Главная';
require_once('private/php/header.php');

session_start();

?>

<h1>Статус пользователя: 
    <?php 
        if(isset($_SESSION['user_id'])){
            echo "авторизован";
        } else {
            echo "не авторизован";
        }
    ?>
</h1>
<h2><a href="/login.php">Авторизация</a></h2>
<h2><a href="/signup.php">Регистрация</a></h2>


<?php

require_once('private/php/footer.php');

?>