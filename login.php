<?php

$title = 'Авторизация';
require_once('private/php/header.php');
session_start();

?>

<h1>Авторизация</h1>

<?php

if(isset($_SESSION['user_id'])) {
    echo "<p>Вы уже авторизованы</p>";
}

?>


<form action="private/login_request.php" method="post" id='login_form'
    <?php
        if(isset($_SESSION['user_id'])) echo "style='display:none'";
    ?>
>
    <div>
        <label for="login_email">Email</label>
        <input type="email" name="login_email" id="login_email" required>
        <label for="login_password">Пароль</label>
        <input type="password" name="login_password" id="login_password" required>
    </div>
    <input type="submit" value="Войти">
</form>
<a href="/">На главную</a>



<?php

require_once('private/php/footer.php');

?>