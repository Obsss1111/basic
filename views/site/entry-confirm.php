<?php
use yii\helpers\Html;
?>
<p>
<li><label>Имя:</label> <?= Html::encode($model->name) ?></li>
    <li><label>Email:</label> <?= Html::encode($model->email) ?></li>
</p>
