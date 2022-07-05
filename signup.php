<?php

$title = 'Регистрация';
require_once('private/header.php');
session_start();

?>

<h1>Регистрация</h1>

<?php

if(isset($_SESSION['user_id'])) {
    echo "<p>Вы уже авторизованы</p>";
}

?>

<form action="private/signup_request.php" method="post" id='signup_form'
    <?php
        if(isset($_SESSION['user_id'])) echo "style='display:none'";
    ?>
>
    <div>
        <label for="signup_name">Имя</label>
        <input type="text" name="signup_name" id="signup_name" required>
        <label for="signup_email">Email</label>
        <input type="email" name="signup_email" id="signup_email" required>
        <label for="signup_password">Пароль</label>
        <input type="password" name="signup_password" id="signup_password" required>
        <label for="signup_password_repeat">Подтверждение пароля</label>
        <input type="password" name="signup_password_repeat" id="signup_password_repeat" required>

    </div>
    <input type="submit" value="Зарегистрироваться">
</form>
<a href="/">На главную</a>


<?php

require_once('private/footer.php');

?>