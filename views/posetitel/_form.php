<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Posetitel $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="posetitel-form n" >

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'Фамилия')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Имя')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Отчество')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Возраст')->textInput() ?>

    <?= $form->field($model, 'Сумма_заказа')->textInput() ?>

    <?= $form->field($model, 'Количество_товаров')->textInput() ?>

<?= $form->field($model, 'Тип_заказа')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'Материал')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'Способ_оплаты')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Фото')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
