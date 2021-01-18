<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\FavoriteAlbums */

$this->title = 'Create Favorite Albums';
$this->params['breadcrumbs'][] = ['label' => 'Favorite Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="favorite-albums-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
