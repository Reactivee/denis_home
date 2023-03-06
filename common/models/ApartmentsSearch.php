<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Apartments;

/**
 * ApartmentsSearch represents the model behind the search form of `common\models\Apartments`.
 */
class ApartmentsSearch extends Apartments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'complex_id', 'count_rooms', 'created_at', 'updated_at'], 'integer'],
            [['price', 'area'], 'number'],
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
        $query = Apartments::find();

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
            'complex_id' => $this->complex_id,
            'price' => $this->price,
            'count_rooms' => $this->count_rooms,
            'area' => $this->area,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
