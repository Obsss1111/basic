<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */

$this->title = 'Update Albums: ' . $model->IdAlbum;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdAlbum, 'url' => ['view', 'id' => $model->IdAlbum]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="albums-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
