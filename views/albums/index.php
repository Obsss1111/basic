<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\grid\DataColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\AlbumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="row row-cols-1 row-cols-md-2 g-4">
    <?php foreach ($dataProvider->getModels() as $model) { ?> 
    <div class="col">        
        <div class="card mb-3 bg-album" style="border: none;">
            <button type="button" onclick="albumPlay(this)" class="btn bg-album">            
            <div class="row g-0">
                <div class="col-md-6">
                    <?php if ($model->img) { ?>
                        <?= Html::img('http://basic/assets/img/'.$model->img, ['class' => 'img-fluid']) ?>
                    <?php } else { ?>
                        <svg viewBox="0 0 16 16" class="icon img-fluid img-circle orange-fun border-0 btn">
                            <use xlink:href="http://basic/assets/iconic/sprite/open-iconic.svg#musical-note"></use>
                        </svg>
                    <?php } ?>
                </div>
                <div class="col-md-6">
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
                                    $model->autor->name_autor, 
                                    ['/autor/view', 'id' => $model->autor->id_autor], 
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
    <?php } ?>
</div>

