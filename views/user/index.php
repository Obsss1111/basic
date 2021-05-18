<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\DetailView;
use app\services\AccessService;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::$app->user->identity->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>   
    <img src="" style="width:250px; height:250px;" alt="user_img" class="border"/>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            [
                'attribute' => 'access',
                'value' => AccessService::getUserAccess(),
            ],
        ],
    ]); ?>

</div>
