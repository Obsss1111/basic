<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'imageFiles[]')
        ->fileInput(['multiple' => true, 'accept' => 'image/*'])
        ->label('Загрузите изображение') ?>

    <button>Загрузить</button>

<?php ActiveForm::end() ?>

