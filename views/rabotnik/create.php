<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rabotnik $model */



?>
<br>
<h1>Добавление работника</h1>
<div class="rabotnik-create n contact">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
