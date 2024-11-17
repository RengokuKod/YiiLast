<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\RabotnikSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rabotnik-search n">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'Фамилия') ?>

    <?= $form->field($model, 'Имя') ?>

    <?= $form->field($model, 'Отчество') ?>

    <?= $form->field($model, 'Рост') ?>

    <?php // echo $form->field($model, 'Должность') ?>

    <?php // echo $form->field($model, 'Стаж') ?>

    <?php // echo $form->field($model, 'Зона_работ') ?>

    <?php // echo $form->field($model, 'Образование') ?>

    <?php // echo $form->field($model, 'Возраст') ?>

    <?php // echo $form->field($model, 'Фото') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
