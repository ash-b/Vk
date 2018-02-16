<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Advertisement;

/**
 * AdvertisementSearch represents the model behind the search form about `common\models\Advertisement`.
 */
class AdvertisementSearch extends Advertisement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status', 'position', 'is_mobile', 'order_no'], 'integer'],
            [['link', 'title', 'from_date', 'to_date', 'created_at', 'image_path', 'image_base_url'], 'safe'],
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
        $query = Advertisement::find();

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
            'status' => $this->status,
            'from_date' => $this->from_date,
            'to_date' => $this->to_date,
            'created_at' => $this->created_at,
            'position' => $this->position,
            'is_mobile' => $this->is_mobile,
            'order_no' => $this->order_no,
        ]);

        $query->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'image_path', $this->image_path])
            ->andFilterWhere(['like', 'image_base_url', $this->image_base_url]);

        return $dataProvider;
    }
}
