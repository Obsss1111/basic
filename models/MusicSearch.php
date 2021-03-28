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
    public $autorName;
    public $styleName;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_music', 'path_music_id_path', 'music_style_id_style'], 'integer'],
            [['name_music', 'autorName', 'styleName'], 'safe'],
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
        $query->joinWith(['autor'])
              ->joinWith(['rel_style']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort->attributes['autorName'] = [
            'asc' => [Autor::tableName().'.name' => SORT_ASC],
            'desc' => [Autor::tableName().'.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['styleName'] = [
            'asc' => [MusicStyle::tableName().'.name_style' => SORT_ASC],
            'desc' => [MusicStyle::tableName().'.name_style' => SORT_DESC],
        ];
        
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
        ]);

        $query->andFilterWhere(['like', 'name_music', $this->name_music])
            ->andFilterWhere(['like', MusicStyle::tableName().'.name_style', $this->styleName])
            ->andFilterWhere(['like', Autor::tableName().'.name', $this->autorName]);    

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
    
    public function findMusic($user_id)
    {
        $query = Music::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);        

        return $dataProvider;
    }
}
