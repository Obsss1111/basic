<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AutorHasMusic;

/**
 * AutorHasMusicSearch represents the model behind the search form of `app\models\AutorHasMusic`.
 */
class AutorHasMusicSearch extends AutorHasMusic
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_ahm', 'id_autor', 'id_music'], 'integer'],
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
        $query = AutorHasMusic::find();

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
            'id_ahm' => $this->id_ahm,
            'id_autor' => $this->id_autor,
            'id_music' => $this->id_music,
        ]);

        return $dataProvider;
    }
}
