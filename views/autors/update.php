<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Autors */

$this->title = 'Update Autors: ' . $model->IdAutor;
$this->params['breadcrumbs'][] = ['label' => 'Autors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->IdAutor, 'url' => ['view', 'id' => $model->IdAutor]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>