<?php
use app\models\Posetitel;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
/** @var yii\web\View $this */
/** @var app\models\PosetitelSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
?>
<br>
<br>
<h1>Список посетителей</h1>
<div class="posetitel-index n">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Добавить посетителя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'Фамилия',
            'Имя',
            'Отчество',
            'Возраст',
            'Сумма_заказа',
            'Количество_товаров',
            'Тип_заказа',
            'Материал',
            'Способ_оплаты',
                [
    'attribute' => 'Фото',
    'format' => 'html',
    'value' => function ($model) {
    return \yii\helpers\Html::img($model->Фото, ['alt' => 'Фото', 'class'=>'db']);
    },
    ],


            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Posetitel $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
