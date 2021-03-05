<?php //Вместо id надо ссылаться на поле access в таблице user
use yii\helpers\Html;

?>
<div class="card text-dark bg-light mb-3 h-100" style="width: 13rem;">
    <div class="card-header">Режим <?= $access ? 'администратора' : 'пользователя' ?></div>
    <div class="card-body"> 
        <h5 class="card-title">Опции</h5>
        <div class="card-text list-group btn-group-vertical">
        <?php if ($access) { 
        echo Html::a('Добавить музыку', ['create'], ['class' => 'btn btn-success']);
        } ?>
        <?= Html::a('Создать плейлист', ['/playlist/create'], ['class' => 'btn btn-primary']); ?>
        </div>
    </div>
</div>                    


