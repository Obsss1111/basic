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
        <?= $this->render('/layouts/menu', ['access' => $access]); ?>
    </div>
</div>    
