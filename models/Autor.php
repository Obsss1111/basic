<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $id_autor
 * @property string $name_autor
 *
 * @property AutorHasMusic[] $autorHasMusics
 * @property Music[] $musicIdMusics
 */
class Autor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_autor'], 'required'],
            [['name_autor'], 'string', 'max' => 45],
            [['name_autor'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_autor' => 'Id исп.',
            'name_autor' => 'Исполнитель',
        ];
    }

    /**
     * Gets query for [[AutorHasMusics]].
     *
     * @return \yii\db\ActiveQuery|AutorHasMusicQuery
     */
    public function getRel_Autor()
    {
        return $this->hasMany(AutorHasMusic::className(), ['autor_id_autor' => 'id_autor']);
    }

    /**
     * Gets query for [[MusicIdMusics]].
     *
     * @return \yii\db\ActiveQuery|MusicQuery
     */
    public function getRel_Musics()
    {
        return $this->hasMany(Music::className(), ['id_music' => 'music_id_music'])->viaTable('autor_has_music', ['autor_id_autor' => 'id_autor']);
    }

    /**
     * {@inheritdoc}
     * @return AutorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorQuery(get_called_class());
    }
}
