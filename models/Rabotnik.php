<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rabotnik".
 *
 * @property int $id
 * @property string $Фамилия
 * @property string $Имя
 * @property string $Отчество
 * @property int $Рост
 * @property string $Должность
 * @property int $Стаж
 * @property string $Зона_работ
 * @property string $Образование
 * @property int $Возраст
 * @property string $Фото
 */
class Rabotnik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rabotnikkuz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Фамилия', 'Имя', 'Отчество', 'Рост', 'Должность', 'Стаж', 'Зона_работ', 'Образование', 'Возраст', 'Фото'], 'required'],
            [['Рост', 'Стаж', 'Возраст'], 'integer'],
            [['Фамилия', 'Имя', 'Отчество', 'Должность', 'Зона_работ', 'Образование', 'Фото'], 'string', 'max' => 255],
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
            'Рост' => 'Рост',
            'Должность' => 'Должность',
            'Стаж' => 'Стаж',
            'Зона_работ' => 'Зона работ',
            'Образование' => 'Образование',
            'Возраст' => 'Возраст',
            'Фото' => 'Фото',
        ];
    }
}
