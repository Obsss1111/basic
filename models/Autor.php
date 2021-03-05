<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "autor".
 *
 * @property int $id_autor
 * @property string $name_autor
 * @property string|null $img
 *
 * @property AlbumsMusic[] $albumsMusics
 * @property Music[] $musicAlbums
 * @property AutorHasMusic[] $autorHasMusics
 * @property Music[] $musicIdMusics
 * @property Music $music
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
            [['img'], 'string'],
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
            'id_autor' => 'Id Autor',
            'name_autor' => 'Name Autor',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[AlbumsMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlbumsMusics()
    {
        return $this->hasMany(AlbumsMusic::className(), ['id_autor_music' => 'id_autor']);
    }

    /**
     * Gets query for [[MusicAlbums]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusicAlbums()
    {
        return $this->hasMany(Music::className(), ['id_music' => 'id_music_albums'])->viaTable('albums_music', ['id_autor_music' => 'id_autor']);
    }

    /**
     * Gets query for [[AutorHasMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAutorHasMusics()
    {
        return $this->hasMany(AutorHasMusic::className(), ['autor_id_autor' => 'id_autor']);
    }

    /**
     * Gets query for [[MusicIdMusics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRel_music()
    {
        return $this->hasMany(Music::className(), ['id_music' => 'music_id_music'])->viaTable('autor_has_music', ['autor_id_autor' => 'id_autor']);
    }

    /**
     * Gets query for [[Music]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMusic()
    {
        return $this->hasOne(Music::className(), ['autor_id_autor' => 'id_autor']);
    }
    
        public function getCountTracks() : int
    {
        return $this->hasMany(AlbumsMusic::className(), ['id_autor_music' => 'id_autor'])->count();
    } 
}
