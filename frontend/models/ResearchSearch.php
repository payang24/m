<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Research;

/**
 * ResearchSearch represents the model behind the search form about `frontend\models\Research`.
 */
class ResearchSearch extends Research
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['researchname', 'researchtype', 'provider', 'abstract', 'date_sever', 'content'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Research::find();

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
            'date_sever' => $this->date_sever,
        ]);

        $query->andFilterWhere(['like', 'researchname', $this->researchname])
            ->andFilterWhere(['like', 'researchtype', $this->researchtype])
            ->andFilterWhere(['like', 'provider', $this->provider])
            ->andFilterWhere(['like', 'abstract', $this->abstract])
            ->andFilterWhere(['like', 'content', $this->content]);

        return $dataProvider;
    }
}
