<?php if(@$resultSuccess) { ?>
    <div class="notify notify--success"><?=@$resultSuccess?></div>
<?php } ?>

<?php if(@$resultInfo != '') { ?>
    <div class="notify notify--success"><?=@$resultInfo?></div>
<?php } ?>

<?php if(@$resultError) { ?>
    <div class="notify notify--error"><?=@$resultError?></div>
<?php } ?>