<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Posetitel $model */

$this->title = $model->id;

?>
<br>
<h1>Изменение посетителя:<?= Html::encode($this->title) ?></h1>
<div class="posetitel-update n contact">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
