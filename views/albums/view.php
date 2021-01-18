<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */

$this->title = $model->id_album;
$this->params['breadcrumbs'][] = ['label' => 'Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="albums-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_album' => $model->id_album, 'autor_id_autor' => $model->autor_id_autor], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_album' => $model->id_album, 'autor_id_autor' => $model->autor_id_autor], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_album',
            'name_album',
            'autor_id_autor',
            'music_id_music',
        ],
    ]) ?>

</div>
