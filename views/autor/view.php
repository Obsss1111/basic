<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

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
$color = ['warm', 'bighead', 'orange-fun', 'hazel'];
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
      
            <?php $carousel = [];
            foreach ($dataProvider->getModels() as $model) {
                $carousel[] = [
                    'content' => '<svg xmlns="http://www.w3.org/2000/svg" style="padding: 20px; width: 40%;" fill="currentColor" class="bi bi-vinyl-fill card-img-top" viewBox="0 0 16 16">
                            <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                        </svg>',
                    'caption' => Html::a(Html::tag('h1',$model->albums->name_album), ['albums/view', 'id' => $model->albums->id_album], ['class' => 'text-light text-decoration-none']),
//                    'options' => [],
                ];
            } ?>
            
            <?= \yii\bootstrap4\Carousel::widget([
                'items' => $carousel,
                'options' => [
                    'class' => "carousel slide {$color[random_int(0, 3)]}", 
                    'data-bs-ride' => "carousel",
                    'style' => 'height: 100%;'
                ],
            ]); ?>  
        </div>
    </div> 
    <div class="row">
        <div class="col-md"></div>
        <div class="col-md">
            <?=     GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $filterModel,
                'columns' => [
                    'music.name_music'
                ]
            ]); ?>
        </div>
        <div class="col-md"></div>
    </div>
</div>