<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MusicPathSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Music Paths';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-path-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Music Path', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'IdMusicPath',
            'IdMusic',
            'Path',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
