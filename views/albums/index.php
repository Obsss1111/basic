<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$color = ['warm', 'bighead', 'orange-fun', 'hazel'];
?>
<div class="container">
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?> 
        <?php if($model->countTracks): ?>
            <div class="col-sm-12 col-md-6">                   
                <button type="button" onclick="albumClick(this)" class="card mb-3 bg-album " id="<?= $model->id_album ?>" value="<?= $model->id_album ?>" style="padding: 0px;">            
                    <div class="row g-0">                        
                        <div class="col-md-4 ">
                            <?php if($model->img):  ?>
                            <div class="<?= $color[random_int(0,3)] ?>" style="height:100%;">
                                <img src="<?= "http://basic/assets/img/{$model->img}" ?>" class="card-img">
                            </div>
                            <?php else: ?>
                                <svg xmlns="http://www.w3.org/2000/svg" style="padding: 5px;" fill="currentColor" class="card-img bi bi-vinyl-fill <?= $color[random_int(0,3)] ?>" viewBox="0 0 16 16">
                                    <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                                </svg>
                            <?php endif; ?> 
                        </div>                        
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <?= Html::a(
                                        Html::encode($model->name_album), 
                                        ['/albums/view', 'id' => $model->id_album], 
                                        ['class' => 'text-warning text-decoration-none']) 
                                    ?>
                                </h5>
                                <p class="card-text">
                                    <?= Html::a(
                                            $model->autor->name, 
                                            ['/autor/view', 'id' => $model->autor->id], 
                                            ['class' => 'text-warning text-decoration-none']) 
                                    ?>
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">Количество треков: <?= $model->countTracks ?></small>
                                </p>
                            </div>
                        </div>               
                    </div>
                </button>    
            </div>                    
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

