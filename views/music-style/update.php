<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MusicStyle */

$this->title = 'Update Music Style: ' . $model->id_style;
$this->params['breadcrumbs'][] = ['label' => 'Music Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_style, 'url' => ['view', 'id' => $model->id_style]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="music-style-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
