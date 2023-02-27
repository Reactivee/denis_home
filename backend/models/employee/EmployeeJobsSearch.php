<?php

namespace backend\models\employee;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\employee\EmployeeJobs;

/**
 * EmployeeJobsSearch represents the model behind the search form of `backend\models\employee\EmployeeJobs`.
 */
class EmployeeJobsSearch extends EmployeeJobs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['job_name_ru', 'job_name_en', 'job_name_tr'], 'safe'],
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
        $query = EmployeeJobs::find();

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
        ]);

        $query->andFilterWhere(['like', 'job_name_ru', $this->job_name_ru])
            ->andFilterWhere(['like', 'job_name_en', $this->job_name_en])
            ->andFilterWhere(['like', 'job_name_tr', $this->job_name_tr]);

        return $dataProvider;
    }
}
