<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Posetitel;

/**
 * PosetitelSearch represents the model behind the search form of `app\models\Posetitel`.
 */
class PosetitelSearch extends Posetitel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Возраст', 'Сумма_заказа', 'Количество_товаров', 'Тип_заказа', 'Материал','Способ_оплаты'], 'integer'],
            [['Фамилия', 'Имя', 'Отчество', 'Тип_заказа', 'Фото'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Posetitel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'Возраст' => $this->Возраст,
            'Сумма_заказа' => $this->Сумма_заказа,
            'Количество_товаров' => $this->Количество_товаров,
            'Тип_заказа' => $this->Тип_заказа,
            'Материал' => $this->Материал,
            'Способ_оплаты' => $this->Способ_оплаты,
        ]);

        $query->andFilterWhere(['like', 'Фамилия', $this->Фамилия])
            ->andFilterWhere(['like', 'Имя', $this->Имя])
            ->andFilterWhere(['like', 'Отчество', $this->Отчество])
            ->andFilterWhere(['like', 'Тип_заказа', $this->Тип_заказа])
            ->andFilterWhere(['like', 'Фото', $this->Фото]);

        return $dataProvider;
    }
}
