<?php

use yii\helpers\Html;
use yii\bootstrap4\Tabs;

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
                'items' => [
                    [
                        'label' => 'Новое',
                        'content' => $this->render('/music/music', [
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel
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
        <?php if(Yii::$app->user->id === 1) {  ?>    
        <div class="card text-dark bg-light mb-3" style="max-width: 18rem; max-height: 10rem;">
            <div class="card-header">Режим администратора</div>
            <div class="card-body"> 
                <h5 class="card-title">Опции</h5>
                <?= Html::a('Добавить музыку', ['create'], ['class' => 'btn btn-success card-text']); ?>
            </div>

        </div>                    
        <?php } ?>
    </div>
</div>    
