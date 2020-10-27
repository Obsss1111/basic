<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MusicPath;

/**
 * MusicPathSearch represents the model behind the search form of `app\models\MusicPath`.
 */
class MusicPathSearch extends MusicPath
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusicPath', 'IdMusic'], 'integer'],
            [['Path'], 'safe'],
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
        $query = MusicPath::find();

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
            'IdMusicPath' => $this->IdMusicPath,
            'IdMusic' => $this->IdMusic,
        ]);

        $query->andFilterWhere(['like', 'Path', $this->Path]);

        return $dataProvider;
    }
}
