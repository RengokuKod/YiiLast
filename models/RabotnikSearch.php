<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Rabotnik;

/**
 * RabotnikSearch represents the model behind the search form of `app\models\Rabotnik`.
 */
class RabotnikSearch extends Rabotnik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Рост', 'Стаж', 'Возраст'], 'integer'],
            [['Фамилия', 'Имя', 'Отчество', 'Должность', 'Зона_работ', 'Образование', 'Фото'], 'safe'],
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
        $query = Rabotnik::find();

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
            'Рост' => $this->Рост,
            'Стаж' => $this->Стаж,
            'Возраст' => $this->Возраст,
        ]);

        $query->andFilterWhere(['like', 'Фамилия', $this->Фамилия])
            ->andFilterWhere(['like', 'Имя', $this->Имя])
            ->andFilterWhere(['like', 'Отчество', $this->Отчество])
            ->andFilterWhere(['like', 'Должность', $this->Должность])
            ->andFilterWhere(['like', 'Зона_работ', $this->Зона_работ])
            ->andFilterWhere(['like', 'Образование', $this->Образование])
            ->andFilterWhere(['like', 'Фото', $this->Фото]);

        return $dataProvider;
    }
}
