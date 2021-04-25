<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\bootstrap4\LinkPager;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Музыка', 'url' => ['/music/index']];
$this->params['breadcrumbs'][] = $this->title;
$this->params['menu'] = [
    ['label' => 'Редактировать', 'url' => ['update', 'id' => $model->id]],
    ['label' => 'Удалить', 'url' => ['delete', 'id' => $model->id],
        'linkOptions' => [
            'data' => [
                'confirm' => "Вы действительно хотите удалить исполнителя {$this->title}?", 
                'method' => 'post'
            ],
        ],                   
    ],
];
\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="row">
        <div class="col-md-3">  
            <div class="card">
            <?php if ($model->img): ?>
            <img src="<?= 'http://basic/assets/img/'.$model->img; ?>" class="card-img-top">
            <?php else: ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>
            <?php endif; ?>
            <div class="card-footer">
                <h5 class="card-title">Исполнитель</h5>
                <p class="card-text"><?= $model->name; ?></p>
            </div>
            
            </div>
        </div>
        <div class="col-md">
            <?= $carousel; ?>
        </div>
    </div> 
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md">
            <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $filterModel,
                        'layout' => "{items}\n{pager}",
                        'pager' => ['class' => LinkPager::className()],
                        'tableOptions' => ['class' => 'table table-hover table-sm table-borderless container'],
                        'columns' => [
                            ['class' => SerialColumn::className()],                
                            ['attribute' => 'music.name_music'],
                            [
                                'class' => ActionColumn::className(),
                                'header' => 'Управление',
                                'template' => '{play}{heart}{delete}',
                                'buttons' => [
                                    'play' => function($url, $model, $key) {
                                        $icon = Html::tag('span', '', ['class' => 'oi oi-media-play']);
                                        $options = [
                                            'title' => 'play',
                                            'aria-label' => 'play',
                                            'data-pjax' => '0',
                                            'id' => 'play_'.$key,
                                            'name' => "play",
                                            'value' => $model->music->path_music_id_path,
                                            'class' => "btn action-btn",
                                        ];
                                        return Html::button($icon, $options);
                                    },
                                    'heart' => function($url, $model, $key) {
                                        $icon = Html::tag('span', '', ['class' => 'oi oi-heart']);
                                        $options = [
                                            'title' => 'heart',
                                            'aria-label' => 'heart',
                                            'data-pjax' => '0',
                                            'id' => 'heart_'.$key,
                                            'name' => "heart",
                                            'value' => $model->music->id_music,
                                            'class' => "btn action-btn"
                                        ];
                                        return Html::button($icon, $options);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
        </div>
    </div>
</div>