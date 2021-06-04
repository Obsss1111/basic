<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Music */

$this->title = 'Добавить трек';
$this->params['breadcrumbs'][] = ['label' => 'Музыка', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="music-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'file' => $file,
        'author' => $author,
    ]) ?>

</div>
