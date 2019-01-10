<div class="title-1">Фильмотека</div>
<?php
    foreach($films as $keyFilm => $filmArr) { ?>
        <div class="card mb-20">
            <div class="row">
                <div class="col-auto">
                    <img height="200" src="<?=HOST?>data/films/min/<?=@$filmArr['photo']?>" alt="<?=@$filmArr['title']?>">
                </div>
                <div class="col">
                    <div class="card__header">
                        <h4 class="title-4"><?=@$filmArr['title']?></h4>
                        <div class="buttons">
                            <?php if(isAdmin()) {?>
                                <a class="button button--small button--edit" href="edit.php?id=<?=@$filmArr['id']?>">Редактировать</a>
                                <a href="?action=delete&id=<?=@$filmArr['id']?>" class="button button--small button--remove mr-10">Удалить</a>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="badge"><?=@$filmArr['genre']?></div>
                    <div class="badge"><?=@$filmArr['year']?></div>
                    <div class="mt-20">
                        <?php if(isAdmin() || isUser()) {?>
                            <a class="button button--small" href="single.php?id=<?=@$filmArr['id']?>">Подробнее</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
<?php } ?>