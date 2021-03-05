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

$width = $access ? '32rem' : '50rem';
?>

<div class="container-fluid" style="margin-bottom: 50px;">
    <div class="row">
        <div class="col-md-3">
            <div class="row row-cols-md-1 g-4 justify-content-between">
                <div class="card mb-3 h-100" style="width: 15rem;">
                    <div class="card-header">
                        <?php if ($model->img) { ?>
                        <?= Html::img('http://basic/assets/img/'.$model->img, ['class' => 'img-fluid img-thumbnail card-img-top']);?>
                        <?php } else { ?>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-music-note-list card-img-top" viewBox="0 0 16 16">
                            <path d="M12 13c0 1.105-1.12 2-2.5 2S7 14.105 7 13s1.12-2 2.5-2 2.5.895 2.5 2z"/>
                            <path fill-rule="evenodd" d="M12 3v10h-1V3h1z"/>
                            <path d="M11 2.82a1 1 0 0 1 .804-.98l3-.6A1 1 0 0 1 16 2.22V4l-5 1V2.82z"/>
                            <path fill-rule="evenodd" d="M0 11.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 7H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 .5 3H8a.5.5 0 0 1 0 1H.5a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        <?php } ?>                    
                        <div class="btn-group">                               
                            <?= Html::button('<span class="oi oi-heart"></span', ['class' => 'btn btn-outline-danger']); ?>
                            <?= Html::button('<span class="oi oi-plus"></span', ['class' => 'btn btn-outline-primary']); ?>
                            <?= Html::button('<span class="oi oi-trash"></span>', ['class' => 'btn btn-outline-secondary']); ?>
                        </div>
                    </div>
                    
                </div>
                <?php if($access) {  ?>  
                <?= $this->render('options', ['model' => $model]); ?>
                <?php } ?>
            </div>      
        </div>
        <div class="col-md-6 container">
            <div class="card h-100">
                <div class="card-header">
                    <h5 class="card-title">                        
                        <?= DetailView::widget([
                            'model' => $model,
                            'options' => ['class' => 'container table-borderless'],
                            'attributes' => [
                                ['attribute' => 'name_album'],
                                [
                                    'attribute' => 'autor.name_autor',
                                    'format' => 'raw',
                                    'value' => function ($model, $widget) {
                                        return Html::a($model->autor->name_autor, 
                                                ['/autor/view', 'id' => $model->autor->id_autor],
                                                ['class' => 'text-decoration-none text-warning']
                                        );
                                    }
                                ]
                            ],
                         ]) ?>  
                    </h5>
                </div> 
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
                                            'value' => $model->id_music_albums,
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
        <div class="col-md-3"> 
            <div class="card mb-3">                
                <?= \yii\bootstrap4\Carousel::widget([
                    'items' => $carousel,
                    'options' => [
                        'class' => "carousel slide", 
                        'data-bs-ride' => "carousel", 
                    ],
                ]); ?>            
                <div class="card-body">
                    <h5 class="card-title">Другие альбомы</h2>
                </div>
            </div>
        </div>                                
    </div>
</div>


