<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Autors;

/**
 * AutorsSearch represents the model behind the search form of `app\models\Autors`.
 */
class AutorsSearch extends Autors
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdAutor', 'IdUser'], 'integer'],
            [['NameAutor'], 'safe'],
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
        $query = Autors::find();

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
            'IdAutor' => $this->IdAutor,
            'IdUser' => $this->IdUser,
        ]);

        $query->andFilterWhere(['like', 'NameAutor', $this->NameAutor]);

        return $dataProvider;
    }
}
