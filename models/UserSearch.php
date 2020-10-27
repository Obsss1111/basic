<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form of `app\models\User`.
 */
class UserSearch extends User
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdUser'], 'integer'],
            [['Login', 'Password', 'FavoriteMusic', 'FavoriteAlbum', 'FavoriteStyleMusic', 'FavoriteAutor', 'FavoriteStyle'], 'safe'],
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
        $query = User::find();

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
            'IdUser' => $this->IdUser,
        ]);

        $query->andFilterWhere(['like', 'Login', $this->Login])
            ->andFilterWhere(['like', 'Password', $this->Password])
            ->andFilterWhere(['like', 'FavoriteMusic', $this->FavoriteMusic])
            ->andFilterWhere(['like', 'FavoriteAlbum', $this->FavoriteAlbum])
            ->andFilterWhere(['like', 'FavoriteStyleMusic', $this->FavoriteStyleMusic])
            ->andFilterWhere(['like', 'FavoriteAutor', $this->FavoriteAutor])
            ->andFilterWhere(['like', 'FavoriteStyle', $this->FavoriteStyle]);

        return $dataProvider;
    }
}
