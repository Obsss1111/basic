<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tracks;

/**
 * TracksSearch represents the model behind the search form of `app\models\Tracks`.
 */
class TracksSearch extends Tracks
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['Name', 'Autor', 'Duration', 'PathTrack'], 'safe'],
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
        $query = Tracks::find();

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
            'Id' => $this->Id,
            'Duration' => $this->Duration,
        ]);

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Autor', $this->Autor])
            ->andFilterWhere(['like', 'PathTrack', $this->PathTrack]);

        return $dataProvider;
    }
}
