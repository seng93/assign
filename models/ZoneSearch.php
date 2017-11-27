<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Zone;

/**
 * ZoneSearch represents the model behind the search form about `app\models\Zone`.
 */
class ZoneSearch extends Zone
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zoneId'], 'integer'],
            [['zoneName'], 'safe'],
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
        $query = Zone::find();

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
            'zoneId' => $this->zoneId,
        ]);

        $query->andFilterWhere(['like', 'zoneName', $this->zoneName]);

        return $dataProvider;
    }
}
