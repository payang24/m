<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Product;

/**
 * ProductSerch represents the model behind the search form about `frontend\models\Product`.
 */
class ProductSerch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'unit'], 'integer'],
            [['date_serve', 'product_list', 'price', 'cost', 'lucre', 'remain', 'type', 'notes'], 'safe'],
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
        $query = Product::find();

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
            'date_serve' => $this->date_serve,
            'unit' => $this->unit,
        ]);

        $query->andFilterWhere(['like', 'product_list', $this->product_list])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'cost', $this->cost])
            ->andFilterWhere(['like', 'lucre', $this->lucre])
            ->andFilterWhere(['like', 'remain', $this->remain])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'notes', $this->notes]);

        return $dataProvider;
    }
}
