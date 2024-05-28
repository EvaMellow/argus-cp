<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Act;

/**
 * ActSearch represents the model behind the search form of `app\models\Act`.
 */
class ActSearch extends Act
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'dboard_id'], 'integer'],
            [['cmd', 'type'], 'safe'],
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
        $query = Act::find();

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
            'dboard_id' => $this->dboard_id,
        ]);

        $query->andFilterWhere(['like', 'cmd', $this->cmd])
            ->andFilterWhere(['like', 'type', $this->type]);

        return $dataProvider;
    }
}
