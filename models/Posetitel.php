<?php
namespace app\models;
use Yii;
/**
 * This is the model class for table "posetitel".
 *
 * @property int $id
 * @property string $Фамилия
 * @property string $Имя
 * @property string $Отчество
 * @property int $Возраст
 * @property int $Сумма_заказа
 * @property int $Количество_товаров
 * @property string $Тип_заказа
 * @property int $Материал
 * @property int $Способ_оплаты
 * @property string $Фото
 */
class Posetitel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'posetitelkuz';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Фамилия', 'Имя', 'Отчество', 'Возраст', 'Сумма_заказа', 'Количество_товаров', 'Тип_заказа', 'Материал', 'Способ_оплаты'], 'required'],
            [['Возраст', 'Сумма_заказа', 'Количество_товаров', 'Материал', 'Способ_оплаты'], 'integer'],
            
            [['Фамилия', 'Имя', 'Отчество', 'Тип_заказа', 'Фото'], 'string', 'max' => 255],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'Фамилия' => 'Фамилия',
            'Имя' => 'Имя',
            'Отчество' => 'Отчество',
            'Возраст' => 'Возраст',
            'Сумма_заказа' => 'Сумма заказа',
            'Количество_товаров' => 'Количество товаров',
            'Тип_заказа' => 'Тип заказа',
            'Материал' => 'Материал',
            'Способ_оплаты' => 'Способ оплаты',
            'Фото' => 'Фото',
        ];
    }
}
