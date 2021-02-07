<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FavoriteMusic;
use Yii;
/**
 * FavoriteMusicSearch represents the model behind the search form of `app\models\FavoriteMusic`.
 */
class FavoriteMusicSearch extends FavoriteMusic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['music_id_music', 'user_id'], 'integer'],
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
        $query = FavoriteMusic::find()
            ->joinWith(['user'])
            ->where(['user.id' => Yii::$app->user->id]);
         // grid filtering conditions
        $query->andFilterWhere([
            'music_id_music' => $this->music_id_music,
            'user_id' => $this->user_id, 
        ]);
        $query->andFilterWhere(['like','music.name_music', $this->rel_music->name_music,]);

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

       

        return $dataProvider;
    }
}
