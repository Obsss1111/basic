<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MusicStyle */

$this->title = 'Create Music Style';
$this->params['breadcrumbs'][] = ['label' => 'Music Styles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-style-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
