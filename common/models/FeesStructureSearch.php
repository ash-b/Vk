<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\FeesStructure;

/**
 * FeesStructureSearch represents the model behind the search form about `common\models\FeesStructure`.
 */
class FeesStructureSearch extends FeesStructure
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           // [['amount', 'caste_id', 'branch_id', 'college_id', 'status'], 'required'],
            [['amount'], 'number'],
            [['caste_id', 'branch_id', 'college_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
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
        $query = FeesStructure::find();

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
            'amount' => $this->amount,
            'caste_id' => $this->caste_id,
            'branch_id' => $this->branch_id,
            'college_id' => $this->college_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
