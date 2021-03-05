<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AlbumsMusic;
use yii\data\Pagination;

/**
 * AlbumsMusicSearch represents the model behind the search form of `app\models\AlbumsMusic`.
 */
class AlbumsMusicSearch extends AlbumsMusic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_albums_music', 'id_autor_music', 'id_music_albums'], 'integer'],
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
        $query = AlbumsMusic::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
//            'pagination' => [
//                'forcePageParam' => false,
//                'pageSizeParam' => false,
//                'pageSize' => 1
//            ]
            'pagination' => new Pagination([
                'pageSize' => 10
            ])
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_albums_music' => $this->id_albums_music,
            'id_autor_music' => $this->id_autor_music,
            'id_music_albums' => $this->id_music_albums,
        ]);

        return $dataProvider;
    }
}
