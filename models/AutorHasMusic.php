<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor_has_music".
 *
 * @property int $id_ahm
 * @property int $id_autor
 * @property int $id_music
 *
 * @property AlbumsMusic $albumsMusic
 * @property Autor $autor
 * @property Music $music
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
            [['id_autor', 'id_music'], 'required'],
            [['id_autor', 'id_music'], 'integer'],
            [['id_autor', 'id_music'], 'unique', 'targetAttribute' => ['id_autor', 'id_music']],
            [['id_autor'], 'exist', 'skipOnError' => true, 'targetClass' => Autor::className(), 'targetAttribute' => ['id_autor' => 'id']],
            [['id_music'], 'exist', 'skipOnError' => true, 'targetClass' => Music::className(), 'targetAttribute' => ['id_music' => 'id_music']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_ahm' => 'Id Ahm',
            'id_autor' => 'Id Autor',
            'id_music' => 'Id Music',
        ];
    }

    /**
     * Gets query for [[AlbumsMusic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumsMusic()
    {
        return $this->hasOne(AlbumsMusic::className(), ['ahm_id' => 'id_ahm']);
    }

    /**
     * Gets query for [[Autor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Autor::className(), ['id' => 'id_autor']);
    }

    /**
     * Gets query for [[Music]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['id_music' => 'id_music']);
    }
}
