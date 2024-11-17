<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Rabotnik $model */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="rabotnik-view n">

    <h1>Работник:<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить этого работника?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'Фамилия',
            'Имя',
            'Отчество',
            'Рост',
            'Должность',
            'Стаж',
            'Зона_работ',
            'Образование',
            'Возраст',
            [
                'attribute' => 'Фото',
                'format' => 'html',
                'value' => function ($model) {
                return \yii\helpers\Html::img($model->Фото, ['alt' => 'Фото', 'class'=>'db']);
                },
                ],
        ],
    ]) ?>

</div>
