<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\ActionButtons;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FavoriteMusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="favorite-music-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'columns' => [
            [
                'attribute' => 'music_id_music',
                'label' => '#',
                'format' => 'raw',
                'options' => ['style' => 'width: 60px; text-align: center;'],
                'value' => function($model, $key, $index) {
                    $options = [
                        'class' => 'button',
                        'onclick' => 'playClick(this)',
                        'id' => 'Play_[' . ($index+1) .']',
                        'value' => $model->musicIdMusic->pathMusicIdPath->path
                    ];
                    return Html::button($index+1, $options);
                }
            ],
            [
                'attribute' => 'music.name_music',
                'label' => 'Название',
                'value' => function ($model, $key, $index) {
                    return $model->musicIdMusic->name_music;
                }
            ],
            [
                'attribute' => 'music.name_autor',
                'label' => 'Исполнитель',
                'value' => function ($model, $key, $index) {
                    return $model->musicIdMusic->autor_name_autor;
                }
            ]
            
        ],
    ]); ?>


</div>
