<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor_has_music".
 *
 * @property int $autor_id_autor
 * @property int $music_id_music
 *
 * @property Autor $autorIdAutor
 * @property Music $musicIdMusic
 */
class AutorHasMusic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'autor_has_music';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['autor_id_autor', 'music_id_music'], 'required'],
            [['autor_id_autor', 'music_id_music'], 'integer'],
            [['autor_id_autor', 'music_id_music'], 'unique', 'targetAttribute' => ['autor_id_autor', 'music_id_music']],
            [['autor_id_autor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['autor_id_autor' => 'id_autor']],
            [['music_id_music'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['music_id_music' => 'id_music']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'autor_id_autor' => 'Autor Id Autor',
            'music_id_music' => 'Music Id Music',
        ];
    }

    /**
     * Gets query for [[AutorIdAutor]].
     *
     * @return \yii\db\ActiveQuery|AutorQuery
     */
    public function getAutorIdAutor()
    {
        return $this->hasOne(Autor::className(), ['id_autor' => 'autor_id_autor']);
    }

    /**
     * Gets query for [[MusicIdMusic]].
     *
     * @return \yii\db\ActiveQuery|MusicQuery
     */
    public function getMusicIdMusic()
    {
        return $this->hasOne(Music::className(), ['id_music' => 'music_id_music']);
    }

    /**
     * {@inheritdoc}
     * @return AutorHasMusicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AutorHasMusicQuery(get_called_class());
    }
}
