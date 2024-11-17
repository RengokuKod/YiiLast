<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Rabotnik $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="rabotnik-form n">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'Фамилия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Имя')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Отчество')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Рост')->textInput() ?>

    <?= $form->field($model, 'Должность')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Стаж')->textInput() ?>

    <?= $form->field($model, 'Зона_работ')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Образование')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Возраст')->textInput() ?>

    <?= $form->field($model, 'Фото')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
