<?php

use yii\helpers\Html;
use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MusicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Музыка';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 style="margin-left: 10px;"><?= Html::encode($this->title) ?></h1>    

<div class="music-index">
    <div class="container">
        <div class="row">
            <div class='col'>
                <?php if(Yii::$app->user->id === 1) { 
                    echo Html::a('Добавить музыку', ['create'], ['class' => 'btn btn-success']);
                } ?>
            </div>
            <div class="col">
                <?= Tabs::widget([
                    'items' => [
                        [
                            'label' => 'Новое',
                            'content' => $this->render('/music/music', [
                                'dataProvider' => $dataProvider,
                                'filterModel' => $filterModel
                            ]),
                            'active' => true
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
        </div>
    </div>    
</div>
