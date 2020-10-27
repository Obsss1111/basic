<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MusicPath */

$this->title = 'Create Music Path';
$this->params['breadcrumbs'][] = ['label' => 'Music Paths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-path-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
