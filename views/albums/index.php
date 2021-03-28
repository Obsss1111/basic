<?php

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="container">
    <div class="row">
        <?php foreach ($dataProvider->getModels() as $model): ?> 
        <?php if($model->getCountTracks() > 0): ?>
            <div class="col-sm-12 col-md-6">        
                <div class="card mb-3 bg-album" style="border: none;">
                    <button type="button" onclick="albumClick(this)" class="btn bg-album" id="<?= $model->id_album ?>">            
                        <div class="row">
                            <div class="col-sm-12 col-md-6">
                                <div class="orange-fun h-100">
                                    <?php if($model->img):  ?>
                                        <img src="<?= "http://basic/assets/img/{$model->img}" ?>" class="card-img" />
                                    <?php else: ?>
                                        <svg xmlns="http://www.w3.org/2000/svg" style="padding: 5px;" fill="currentColor" class="bi bi-vinyl-fill card-img" viewBox="0 0 16 16">
                                            <path d="M8 6a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm0 3a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0z"/>
                                        </svg>
                                    <?php endif; ?>
                                     
                                    
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
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
            </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>

