<h1>Укажите ваши данные</h1>

<form class="mb-20" action="set-cookie.php" method="POST">
    <div class="form-group"><label class="label">Ваше имя<input class="input" name="user-name" type="text" placeholder="Введите имя"/></label></div>
    <div class="form-group"><label class="label">Ваш город<input class="input" name="user-city" type="text" placeholder="Введите город"/></label></div>
    <input class="button" type="submit" name="user-submit" value="Сохранить" />
</form>

<form action="unset-cookie.php" method="POST">
    <input class="button" type="submit" name="cookie-unset" value="Удалить данные"/>
</form>

