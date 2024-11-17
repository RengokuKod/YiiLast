<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posetitel $model */
?>
    <br>
<h1>Добавление посетителя</h1>
<div class="posetitel-create n contact">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
