
<div class="line" id="<?= $uniqid ?>">
    <div class="col c6">
        <?= (string) View::forge($left['view'], $view_params + $left['params'], false);?>
    </div>

    <div class="col c6">
        <?= (string) View::forge($right['view'], $view_params + $right['params'], false);?>
    </div>

</div>