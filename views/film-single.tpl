<div class="title-1">Информация о фильме</div>

<div class="card mb-20">
    <div class="row">
        <div class="col-3">
            <img src="<?=HOST?>data/films/full/<?=@$filmInfo['photo']?>" alt="<?=@$filmInfo['title']?>">
        </div>
        <div class="col-9">
            <div class="card__header">
                <h4 class="title-4"><?=@$filmInfo['title']?></h4>
                <div class="buttons">
                    <?php if(isAdmin()) { ?>
                        <a class="button button--small button--edit" href="edit.php?id=<?=@$filmInfo['id']?>">Редактировать</a>
                        <a href="index.php?action=delete&id=<?=@$filmInfo['id']?>" class="button button--small button--remove mr-10">Удалить</a>
                    <?php } ?>
                </div>
            </div>
                <div class="badge"><?=@$filmInfo['genre']?></div>
                <div class="badge"><?=@$filmInfo['year']?></div>
            <div class="user-content">
                <p><?=@$filmInfo['description']?></p>
            </div>
        </div>
    </div>
</div>