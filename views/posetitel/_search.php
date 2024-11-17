<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PosetitelSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posetitel-search n">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Фамилия') ?>

    <?= $form->field($model, 'Имя') ?>

    <?= $form->field($model, 'Отчество') ?>

    <?= $form->field($model, 'Возраст') ?>

    <?php // echo $form->field($model, 'Размер_багажа') ?>

    <?php // echo $form->field($model, 'Судимость') ?>

    <?php // echo $form->field($model, 'Комната') ?>

    <?php // echo $form->field($model, 'Питомец') ?>

    <?php // echo $form->field($model, 'Мини_бар') ?>

    <?php // echo $form->field($model, 'Фото') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
