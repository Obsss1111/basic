<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MusicStyle;

/**
 * MusicStyleSearch represents the model behind the search form of `app\models\MusicStyle`.
 */
class MusicStyleSearch extends MusicStyle
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_style'], 'integer'],
            [['name_style'], 'safe'],
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
        $query = MusicStyle::find();

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
            'id_style' => $this->id_style,
        ]);

        $query->andFilterWhere(['like', 'name_style', $this->name_style]);

        return $dataProvider;
    }
}
