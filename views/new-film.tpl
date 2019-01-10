<div class="panel-holder mt-0 mb-40">
    <div class="title-3 mt-0">Добавить фильм</div>
    <form enctype="multipart/form-data" action="new.php" method="POST">
        <?php
            if(!empty($errors)) {
                foreach($errors as $key => $value) {
                    echo "<div class='notify notify--error mb-20'>$value</div>";
                }
            }
        ?>
        <div class="form-group"><label class="label">Название фильма<input class="input" name="title" type="text" placeholder="Такси 2" /></label></div>
        <div class="row">
            <div class="col">
                <div class="form-group"><label class="label">Жанр<input class="input" name="genre" type="text" placeholder="комедия" /></label></div>
            </div>
            <div class="col">
                <div class="form-group"><label class="label">Год<input class="input" name="year" type="text" placeholder="2000" /></label></div>
            </div>
        </div>
        <div class="form-group">
            <input class="inputfile" type="file" name="photo" id="file"><label class="label-input-file" for="file">Выбрать файл</label><span>Файл не выбран</span>
        </div>
        <div class="form-group">
            <label class="label"> Описание фильма
                <textarea class="textarea" name="description" placeholder="Введите описание фильма"></textarea>
            </label>
        </div>
        <input class="button" type="submit" name="addFilm" value="Добавить" />
    </form>
</div>