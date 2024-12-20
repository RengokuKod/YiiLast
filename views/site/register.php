<?php
/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\RegisterForm $model */
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
$this->title = 'Регистрация';
?>
<div class="site-register n">
<h1><?= Html::encode($this->title) ?></h1>

<p>Please fill out the following fields to register:</p>

<div class="row">
<div class="col-lg-5">

<?php $form = ActiveForm::begin([
'id' => 'register-form',
'fieldConfig' => [
'template' => "{label}\n{input}\n{error}",
'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
'inputOptions' => ['class' => 'col-lg-3 form-control'],
'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
],
]); ?>

<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

<?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

<?= $form->field($model, 'password')->passwordInput() ?>

<div class="form-group">
<div>
<?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary', 'name' => 'register-button']) ?>
</div>
</div>

<?php ActiveForm::end(); ?>

</div>
</div>
</div>