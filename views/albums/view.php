<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\modules\ActionButtons;
use yii\grid\DataColumn;
use yii\helpers\Url;
use yii\grid\SerialColumn;
use yii\grid\ActionColumn;
use yii\bootstrap4\LinkPager;

/* @var $this yii\web\View */
/* @var $model app\models\Albums */

$this->title = $model->name_album;
$this->params['breadcrumbs'][] = ['label' => 'Музыка', 'url' => ['/music/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->params['menu'][] = ['label' => 'Редактировать', 'url' => ['update', 'id' => $model->id_album]];
$this->params['menu'][] = ['label' => 'Удалить', 'url' => ['delete', 'id' => $model->id_album], 
    'linkOptions' => [
        'data' => [
            'confirm' => "Вы действительно хотите удалить исполнителя {$this->title}?", 
            'method' => 'post'
        ]
    ],                   
];
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="row row-cols-md-1 g-4 justify-content-between">
                <div class="card mb-3 h-100" style="width: 15rem;">                    
                    <?php if ($model->img) { ?>
                    <?= Html::img('http://basic/assets/img/'.$model->img, ['class' => 'card-img-top']);?>
                    <?php } else { ?>
                        <svg xmlns="http://www.w3.org/2000/svg" style="padding: 5px;" fill="currentColor" class="bi bi-vinyl-fill card-img-top" viewBox="0 0 16 16">
                            <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                        </svg>
                    <?php } ?> 
                    <div class="card-body">    
                        <h5 class="card-title"><?= $model->name_album ?></h5>
                        <p class="card-text">
                            <?= Html::a($model->autor->name, 
                                    ['/autor/view', 'id' => $model->autor->id], 
                                    ['class' => 'text-muted']) 
                            ?>
                        </p>
                        <div class="btn-group">                               
                            <?= Html::button('<span class="oi oi-heart"></span', ['class' => 'btn btn-outline-danger']); ?>
                            <?= Html::button('<span class="oi oi-plus"></span', ['class' => 'btn btn-outline-primary']); ?>
                            <?= Html::button('<span class="oi oi-trash"></span>', ['class' => 'btn btn-outline-secondary']); ?>
                        </div>
                    </div>                    
                </div>
                
                <div class="card h-100 mb-3" style="width: 15rem;">                
                    <?= \yii\bootstrap4\Carousel::widget([
                        'items' => $carousel,
                        'options' => [
                            'class' => "carousel slide", 
                            'data-bs-ride' => "carousel", 
                        ],
                    ]); ?>            
                    <div class="card-body">
                        <p class="card-text">Другие альбомы</p>
                    </div>
                </div>               
            </div>      
        </div>
        <div class="col">
            <div class="card h-100">                                                    
                <div class="card-body">
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
                                            'name' => "[play]",
                                            'value' => $model->music->id_music && $model->music->rel_path->id_path ? $model->music->rel_path->path : $model->music->id_music,
                                            'onclick' => 'playClick(this)',
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
                                            'name' => "[heart]",
                                            'value' => $model->music->id_music,
                                            'onclick' => 'heartClick(this)',
                                            'class' => "btn action-btn"
                                        ];
                                        return Html::button($icon, $options);
                                    },
//                                    'delete' => function($url, $model, $key) {
//                                        $icon = Html::tag('span', '', ['class' => 'oi oi-trash']);
//                                        $options = [
//                                            'title' => 'delete',
//                                            'aria-label' => 'delete',
//                                            'data-pjax' => '0',
//                                            'id' => 'delete'.$key,
//                                            'name' => "[delete]",
//                                            'value' => $model->id_music_albums,
//                                            'class' => "btn action-btn",
//                                            'data-confirm' => Yii::t('yii', 'Вы действительно хотите удалить запись?'),
//                                            'data-method' => 'post',
//                                        ];
//                                        if (array('music_id_music' => $model->id_music_albums, 'user_id' => Yii::$app->user->id) === $model->rel_fav_music->getPrimaryKey()) {
//                                            return Html::button($icon, $options);
//                                        }
//                                        return false;
//                                    }
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>              
            
        </div>                                        
    </div>
</div>


