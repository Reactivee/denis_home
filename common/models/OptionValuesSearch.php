<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OptionValues;

/**
 * OptionValuesSearch represents the model behind the search form of `common\models\OptionValues`.
 */
class OptionValuesSearch extends OptionValues
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'option_id', 'weight', 'created_at', 'updated_at'], 'integer'],
            [['value_tr', 'value_ru', 'value_en', 'icon'], 'safe'],
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
        $query = OptionValues::find();

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
            'option_id' => $this->option_id,
            'weight' => $this->weight,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'value_tr', $this->value_tr])
            ->andFilterWhere(['like', 'value_ru', $this->value_ru])
            ->andFilterWhere(['like', 'value_en', $this->value_en])
            ->andFilterWhere(['like', 'icon', $this->icon]);

        return $dataProvider;
    }
}
