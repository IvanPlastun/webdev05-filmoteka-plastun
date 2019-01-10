<h1>Вход</h1>
<form class="mb-20" action="login.php" method="POST">
    <?php
        if(!empty($errors)) {
            foreach($errors as $key => $value) {
                echo "<div class='notify notify--error mb-20'>$value</div>";
            }
        }
    ?>
    <div class="form-group"><label class="label">Логин<input class="input" name="login" type="text" placeholder="Login"/></label></div>
    <div class="form-group"><label class="label">Пароль<input class="input" name="password" type="password" placeholder="Password"/></label></div>
    <input class="button" type="submit" name="enter" value="Вход" />
</form>