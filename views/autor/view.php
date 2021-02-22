<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Autor */

$this->title = $model->name_autor;
$this->params['breadcrumbs'][] = ['label' => 'Музыка', 'url' => ['/music/index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="autor-view">

    
    
    <div class="top-content">
        <div class="block-image-autor">
            <div background="none" class="image-autor"></div>
            <p class="username"><?= Html::encode($this->title) ?></p>
            <?php if(Yii::$app->user->id === 1) { ?>
                <div class="admin-options">
                    <p>
                        <?= Html::a('Изменить', ['update', 'id' => $model->id_autor], ['class' => 'btn btn-primary']) ?>
                        <?= Html::a('Удалить', ['delete', 'id' => $model->id_autor], [
                        'class' => 'btn btn-danger',
                        'data' => [
                            'confirm' => 'Вы действительно хотите удалить исполнителя?',
                            'method' => 'post',
                        ],
                        ]) ?>
                    </p>

                    <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                    'id_autor',
                    'name_autor',
                    ],
                    ]) ?>
                </div>
            <?php } ?>
        </div>
        <div class="autor-albums">
            <?= Html::tag('div', 'album', ['class' => 'album'])?>
        </div>
        
        
    </div>
    <div class="bottom-content">
        <?= GridView::widget([           
            'dataProvider' => $dataProvider,
            'filterModel' => $filterModel,
            'columns' => [
                'id_music',
                'name_music'
            ]
        ]) ?>
    </div>
</div>
