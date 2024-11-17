<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Posetitel $model */

$this->title = $model->id;

\yii\web\YiiAsset::register($this);
?>
<div class="posetitel-view n">

    <h1>Посетитель:<?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этого посетителя?',
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
            'Возраст',
            'Размер_багажа',
            [
                'attribute' => 'Судимость',
                'format' => 'html',
                'value' => function ($model) {
                if ($model->Судимость == 1) {
                return 'Есть';
                } else if ($model->Судимость == 0) {
                return 'Нет';
                }
                },
            ],
            'Комната',
            [
                'attribute' => 'Питомец',
                'format' => 'html',
                'value' => function ($model) {
                if ($model->Питомец == 1) {
                return 'Есть';
                } else if ($model->Питомец == 0) {
                return 'Нет';
                }
                },
            ],
            [
                'attribute' => 'Мини_бар',
                'format' => 'html',
                'value' => function ($model) {
                if ($model->Мини_бар == 1) {
                return 'Есть';
                } else if ($model->Мини_бар == 0) {
                return 'Нет';
                }
                },
            ],
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
