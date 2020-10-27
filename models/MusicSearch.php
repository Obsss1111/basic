<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Music;

/**
 * MusicSearch represents the model behind the search form of `app\models\Music`.
 */
class MusicSearch extends Music
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdMusic', 'IdMusicPath', 'IdMusicStyle', 'IdAutor', 'IdAlbum', 'IdUser'], 'integer'],
            [['NameMusic'], 'safe'],
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
        $query = Music::find();

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
            'IdMusic' => $this->IdMusic,
            'IdMusicPath' => $this->IdMusicPath,
            'IdMusicStyle' => $this->IdMusicStyle,
            'IdAutor' => $this->IdAutor,
            'IdAlbum' => $this->IdAlbum,
            'IdUser' => $this->IdUser,
        ]);

        $query->andFilterWhere(['like', 'NameMusic', $this->NameMusic]);

        return $dataProvider;
    }
}
