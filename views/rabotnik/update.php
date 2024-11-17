<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Rabotnik $model */

$this->title =$model->id;

?>
<br>
<h1>Изменение работника: <?= Html::encode($this->title) ?></h1>
<div class="rabotnik-update n contact">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
