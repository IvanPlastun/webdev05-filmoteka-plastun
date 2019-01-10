<h1>Регистрация</h1>
<form class="mb-20" method="POST">
    <?php
        if(!empty($errors)) {
            foreach($errors as $key => $value) {
                echo "<div class='notify notify--error mb-20'>$value</div>";
            }
        }
    ?>
    <div class="form-group"><label class="label">Логин<input class="input" name="login-reg" type="text" placeholder="Login"/></label></div>
    <div class="form-group"><label class="label">Пароль<input class="input" name="password-reg" type="password" placeholder="Password"/></label></div>
    <div class="form-group"><label class="label">Подтвердите пароль<input class="input" name="password-confirm" type="password" placeholder="Confirm password"/></label></div>
    <input class="button" type="submit" name="registration" value="Регистрация" />
</form>