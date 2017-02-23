<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Carservice;

/**
 * CarserviceSearch represents the model behind the search form about `frontend\models\Carservice`.
 */
class CarserviceSearch extends Carservice
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['car_id', 'date_service_s', 'date_service_e', 'provider', 'user_request', 'areatype','markers', 'orther'], 'safe'],
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
        $query = Carservice::find();

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
            'date_service_s' => $this->date_service_s,
            'date_service_e' => $this->date_service_e,
        ]);

        $query->andFilterWhere(['like', 'car_id', $this->car_id])
            ->andFilterWhere(['like', 'provider', $this->provider])
            ->andFilterWhere(['like', 'user_request', $this->user_request])
            ->andFilterWhere(['like', 'areatype', $this->areatype])
            ->andFilterWhere(['like', 'markers', $this->markers])
            ->andFilterWhere(['like', 'orther', $this->orther]);

        return $dataProvider;
    }
}
