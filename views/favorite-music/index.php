<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FavoriteMusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="favorite-music-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{pager}",
        'tableOptions' => ['class' => 'table-hover table-borderless table-sm'],
        'columns' => [
            [
                'attribute' => 'music_id_music',
                'label' => '#',
                'format' => 'raw',
                'options' => ['style' => 'width: 60px; text-align: center;'],
                'value' => function($model, $key, $index) {
                    $options = [
                        'class' => 'btn action-btn',
                        'name' => 'play',
                        'id' => 'Play_[' . ($index+1) .']',
                        'value' => $model->rel_music->rel_path->path
                    ];
                    $icon = Html::tag('span', '', ['class' => "oi oi-media-play"]);
                    return Html::button($icon, $options);
                }
            ],
            [
                'attribute' => 'music.name_music',
                'label' => 'Название',
                'value' => function ($model, $key, $index) {
                    return $model->rel_music->name_music;
                }
            ],
            [
                'attribute' => 'rel_autor.name_autor',
                'label' => 'Исполнитель',
                'format' => 'raw',
                'value' => function($model) {
                    return Html::a(Html::encode($model->rel_autor->name), ['/autor/view', 'id' => $model->rel_autor->id]);
                }
            ]
            
        ],
    ]); ?>


</div>
