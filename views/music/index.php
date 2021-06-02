<?php

use yii\helpers\Html;
use yii\bootstrap4\Tabs;
use app\modules\Options;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container">
    <h1 style="margin-left: 10px;"><?= Html::encode($this->title) ?></h1>    
    <div class="row">
        <div class="col">
            <?= Tabs::widget([
                'itemOptions' => [                    
                    'style' => 'margin-top: 15px;'
                ],
                'headerOptions' => ['class' => 'flex-sm-fill text-sm-center'],
                'navType' => 'nav-pills nav-fill',
                'items' => [
                    [
                        'label' => 'Новое',
                        'content' => $this->render('/music/music', [
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'access' => $access
                        ]),
//                        'active' => true
                    ],
                    [
                        'label' => "Исполнители",
                        'content' => $this->render('/autor/index', [
                            'dataProvider' => $dataProviderAutor,
                            'filterModel' => $searchModelAutor,
                        ]),
                    ],
                    [
                        'label' => 'Альбомы',
                        'content' => $this->render('/albums/index', [
                            'dataProvider' => $dataProviderAlbum,
                            'filterModel' => $searchModelAlbum,
                        ]),
                    ],                        
                ],
            ]);
            ?>  
        </div>   
        <div class="col-md-2">
            <?= Options::widget([
                'items' => [
                    ['label' => 'Добавить трек', 'url' => ['/music/create']],
                    ['label' => 'Добавить исполнителя', 'url' => ['/autor/create']],
                    ['label' => 'Добавить альбом', 'url' => ['/albums/create']],
                ],
                'itemOptions' => ['class' => 'list-group-item list-group-item-action'],
                'titleOptions' => ['class' => 'active']
            ]); ?> 
        </div>
    </div>
</div>    
