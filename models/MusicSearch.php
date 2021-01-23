<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Music;
use app\models\PathMusic;

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
            [['id_music', 'path_music_id_path', 'music_style_id_style', 'autor_id_autor'], 'integer'],
            [['name_music', 'name_style', 'autor_name_autor'], 'safe'],
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
//             uncomment the following line if you do not want to return any records when validation fails
//             $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_music' => $this->id_music,
            'path_music_id_path' => $this->path_music_id_path,
            'music_style_id_style' => $this->music_style_id_style,
            'autor_id_autor' => $this->autor_id_autor,
        ]);

        $query->andFilterWhere(['like', 'name_music', $this->name_music])
            ->andFilterWhere(['like', 'name_style', $this->name_style])
            ->andFilterWhere(['like', 'autor_name_autor', $this->autor_name_autor]);

        return $dataProvider;
    }
    /**
     * Находит путь файла
     * @param integer $id
     */
    public function findPathMusicById($id) {
        $model = new PathMusic();
        $model->find()->where(['id_path' => $id])->one();
        if ($model) {
            return $model->path;
        }
    }
}
