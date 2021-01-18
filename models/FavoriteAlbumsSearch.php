<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FavoriteAlbums;

/**
 * FavoriteAlbumsSearch represents the model behind the search form of `app\models\FavoriteAlbums`.
 */
class FavoriteAlbumsSearch extends FavoriteAlbums
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_fav_album', 'user_id', 'albums_id_album'], 'integer'],
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
        $query = FavoriteAlbums::find();

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
            'id_fav_album' => $this->id_fav_album,
            'user_id' => $this->user_id,
            'albums_id_album' => $this->albums_id_album,
        ]);

        return $dataProvider;
    }
}
